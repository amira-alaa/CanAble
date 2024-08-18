#!/.venv/Scripts/python.exe
import sys
import json
import numpy as np
import tensorflow as tf
from tensorflow.keras.models import load_model
from tensorflow.keras.preprocessing import image
import matplotlib.pyplot as plt
import cv2
import os
import re
import warnings
import absl.logging
import random


tf.get_logger().setLevel('ERROR')
warnings.filterwarnings("ignore", category=UserWarning, module="keras")
tf.compat.v1.logging.set_verbosity(tf.compat.v1.logging.ERROR)
os.environ['TF_CPP_MIN_LOG_LEVEL'] = '3'
absl.logging.set_verbosity(absl.logging.ERROR)

sys.stdout = open(sys.stdout.fileno(), mode='w', encoding='utf8', buffering=1)

class_labels = ['notFracture', 'fracture']

# Load and preprocess the image
def load_and_preprocess_image(image_path, target_size=(256, 256)):
    img = image.load_img(image_path, target_size=target_size)
    img_array = image.img_to_array(img)
    img_array = np.expand_dims(img_array, axis=0)  # Add batch dimension
    img_array /= 255.0  # Normalize to [0, 1]
    return img_array


# overlayed image
def overlayed_image(input_image_path, prediction,predict):
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
    x=random.randint(1,1000)
    output_image_path = f'xrays/{predict}/pelvis{x}.png'
    cv2.imwrite(output_image_path, overlayed_image)
    return output_image_path


# Make predictions on the image
def make_prediction(image_path, class_labels):
    model = load_model('..\..\pelvis_resnest50.h5')
    img_array = load_and_preprocess_image(image_path)
    prediction = model.predict(img_array)
    predicted_class_index = np.argmax(prediction)
    predicted_class = class_labels[predicted_class_index]
    # confidence = prediction[0][predicted_class_index]
    if predicted_class=='notFracture':
        result= {
        "severity": predicted_class,
        "overlayed_image_path": image_path
        }
        return json.dumps(result , ensure_ascii=False)
    else:
        overlayed_img_path = overlayed_image(image_path, prediction, predicted_class)
        result= {
            "severity": predicted_class,
            "overlayed_image_path": overlayed_img_path
        }
    return json.dumps(result , ensure_ascii=False)

if __name__ == "__main__":
    # Path to the image you want to predict
    image_path = sys.argv[1] # Use raw string to avoid escape sequence issues
    # image_path='img/pelvis1.jpeg'

    # Make prediction
    predict = make_prediction(image_path, class_labels)
    print(predict)

