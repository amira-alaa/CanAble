import sys
import json
import numpy as np
import tensorflow as tf
from tensorflow.keras.models import load_model
from tensorflow.keras.preprocessing import image
import matplotlib.pyplot as plt
import cv2
import os
import warnings
import absl.logging

# Suppress TensorFlow INFO messages and set WARNING messages to ERROR level
tf.get_logger().setLevel('ERROR')
warnings.filterwarnings("ignore", category=UserWarning, module="keras")
tf.compat.v1.logging.set_verbosity(tf.compat.v1.logging.ERROR)
os.environ['TF_CPP_MIN_LOG_LEVEL'] = '3'
absl.logging.set_verbosity(absl.logging.ERROR)

sys.stdout = open(sys.stdout.fileno(), mode='w', encoding='utf8', buffering=1)

class_labels = {"ELBOW": 0, "FINGER": 1, "FOREARM": 2, "HAND": 3, "HUMERUS": 4, "SHOULDER": 5, "WRIST": 6}
fracture_labels = {0: 'notFracture', 1: 'fracture'}
severity_labels = {0: 'No Fracture', 1: 'Small Fracture', 2: 'Medium Fracture', 3: 'Large Fracture'}


def preprocess_image(image_path, target_size=(256, 256)):
    try:
        img = image.load_img(image_path, target_size=target_size)
        img_array = image.img_to_array(img)
        img_array = np.expand_dims(img_array, axis=0)  # Add batch dimension
        img_array /= 255.0  # Normalize to [0, 1]
        return img_array
    except Exception as e:
        return {"error": str(e)}


def overlayed_image(input_image_path, prediction, result ,predict):
    img = cv2.imread(input_image_path)
    img = cv2.resize(img, (256, 256))

    heatmap = np.squeeze(prediction)
    heatmap = cv2.resize(heatmap, (img.shape[1], img.shape[0]))
    heatmap_normalized = (heatmap - np.min(heatmap)) / (np.max(heatmap) - np.min(heatmap))

    # Apply colormap (hot) to convert normalized heatmap to a light color representation
    heatmap_colored = cv2.applyColorMap(np.uint8(255 * heatmap_normalized), cv2.COLORMAP_HOT)

    # Overlay heatmap on original grayscale image
    alpha = 0.6  # Transparency factor
    overlayed_image = cv2.addWeighted(heatmap_colored, alpha, img, 1 - alpha, 0)
    output_image_path = f'xrays/{predict}/{result}.png'
    cv2.imwrite(output_image_path, overlayed_image)
    return output_image_path


def predict(input_image_path, model, class_labels, fracture_labels, severity_labels):
    try:
        input_data = preprocess_image(input_image_path)

        if isinstance(input_data, dict) and 'error' in input_data:
            return json.dumps(input_data, ensure_ascii=False)

        prediction = model.predict(input_data)
        predicted_class_index = np.argmax(prediction)
        predicted_class = list(class_labels.keys())[predicted_class_index]
        fracture_status = fracture_labels.get(predicted_class_index, "Unknown")
        severity_status = severity_labels.get(predicted_class_index, "Unknown")

        overlayed_img_path = overlayed_image(input_image_path, prediction, predicted_class,fracture_status)

        result = {
            "class_name": predicted_class,
            "fracture": fracture_status,
            "severity": severity_status,
            "overlayed_image_path": overlayed_img_path
        }
        # print(predicted_class)
        return json.dumps(result, ensure_ascii=False)


    except Exception as e:
        error_result = {"error": str(e)}
        return json.dumps(error_result, ensure_ascii=False).encode('utf-8')


if __name__ == "__main__":
    # input_image_path = 'img\image5.png'  
    model = load_model('..\..\MURA_resnet50v2_model.h5') 
    input_image_path=sys.argv[1] 

    prediction_result = predict(input_image_path, model, class_labels, fracture_labels, severity_labels)
    print(prediction_result)