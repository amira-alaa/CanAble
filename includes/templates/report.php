<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../img/Your_paragraph_text1-removebg-preview.png">
    <link rel="stylesheet" href="../../layouts/css/same.css">
    <link rel="stylesheet" href="../../layouts/css/report.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.cdnfonts.com/css/inclusive-sans-2" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Report</title>
</head>

<body>
    <?php 
    session_start();
    require_once('./DB.php');
    echo '<style>
        #buttons{display: none;}
        #button{display: flex;}
        </style>';
    if(isset($_SESSION['id'])){
        global $con ;
        $stmt=$con->prepare('SELECT * from info ORDER BY id DESC LIMIT 1');
        $stmt->execute();
        $data=$stmt->fetch();

        

        // if($data['predict']==1){
        //     $text="fracture";
        // }else{
        //     $text="NON Fracture";
        // }
        // $con->lastInsertId();
        // $con->l
        
    }
    ?>
    <div class="medical-report">
        <div class="repheader">
            <h1>Patient Medical Report</h1>
            <button><a href="index.php"><i class="fa fa-home"></i></a></button>
            <button id="downloadPdf" onclick="downloadFunction()"><i class="far fa-file-pdf"></i></button>
        </div>
        <section class="patient-info">
            <h2>Patient Information</h2>
            <p>Name: <?php echo $data['name']; ?></p>
            <p>Age: <?php echo $data['age']; ?></p>
            <p>Town: <?php echo $data['town']; ?></p>
            <!-- <p>Gender: [Patient Gender]</p> -->
            <p id="result">Medical History: there is <span id="special"><?php echo $data['predict'];?></span> in 
            <span id="special"><?php echo $data['class_name'];?></span>
            </p>
        </section>
        <section class="x-rays">
            <h2>X-rays</h2>
            <div id="xRayPreview">
                <img src="<?php echo $data['img']; ?>" alt="X-ray Image" class="x-ray-image">
                <img src="../../<?php echo $data['imgGrid']; ?>" alt="X-ray Image" class="x-ray-image">
            </div>
        </section>
        <section class=" diagnosis">
            <h2>Diagnosis</h2>
            
            <!-- <p>[Diagnosis details]</p> -->
            <p>We are writing to inform you of the results of the online radiograph assessment conducted for you.
            The assessment indicates that a <span id="special"><?php echo $data['predict'];?></span> has been detected in the 
            <span id="special"><?php echo $data['class_name'];?></span>.
                For any questions or assistance, please feel free to contact us.</p>
                <p>Wishing you a speedy recovery.</p>
        </section>
        <!-- <section class="prescription">
            <h2>Prescription</h2>
            <p>[Prescription details]</p>
        </section> -->
    </div>

    <script src="../../layouts/js/report.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        // var myVar;

        // function myFunction() {
        //     myVar = setTimeout(showPage, 3000);
        // }

        // function showPage() {
        //     document.getElementById("loader").style.display = "none";
        // }
    </script>
</body>
</html>