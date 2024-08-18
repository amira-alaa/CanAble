<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../img/Your_paragraph_text1-removebg-preview.png">
    <link rel="stylesheet" href="../../layouts/css/same.css">
    <link rel="stylesheet" href="../../layouts/css/getstart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.cdnfonts.com/css/inclusive-sans-2" rel="stylesheet">
    <link rel="stylesheet" href="../../layouts/css/toastr.min.css">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin='anonymous'></script> -->
    <script src="../../layouts/js/jquery-3.7.1.min.js"></script>
    <script src="../../layouts/js/toastr.min.js"></script>
    <title>Form</title>
</head>
<body>

<!-- php files -->
<?php 
session_start();
echo '<style>
    #buttons{display: none;}
    #button{display: flex;}
    </style>';
require_once ('./DB.php');
include_once './classes.php';
include ('./info.php');
include ('./faq.php');

?>

<!-- end -->

<!-- header -->
<div class="container">
        <header>
            <!-- <i class='fas fa-bong'></i> -->
            <div class="cc">
                <img src="../../img/Your_paragraph_text-removebg-preview.png" alt="">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="<?php if(isset($_SESSION['name'])){ echo '../templates/index.php';} ?>"
                                             class="nav-link active" aria-current="page">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Totarial</a></li>
                    <!-- <li class="nav-item"><a href="#" class="nav-link">aboutUs</a></li> -->
                    <li class="nav-item"><a class="nav-link" id="faq">FAQs</a></li>
                    <li class="nav-item"><a href="../templates/about.php" class="nav-link">About</a></li>
                </ul>
                <div class="buttons" id="buttons">
                    <button style="width:auto;" class="signup">
                        Sign up
                    </button>
                    <button style="width:auto;" class="signin">
                        Log in
                    </button>
                </div>
                <div class="button" id="button">
                    <button style="width:auto;" class="logout">
                        <a href="./logout.php">
                            logout
                        </a>
                    </button>
                </div>
            </div>
            <!-- faq -->
            <div class="container faq">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                    <div><label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your name.."></div><br>
                    <div><label for="subject">Subject</label>
                    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea></div>
                    <div class="ffbtns"><input type="submit" value="submit" name="faq">
                    <button id="faqclose">close</button></div>
                </form>
            </div>
            <!-- end -->
        </header>
    </div>
<!-- end -->



<!-- xray form -->
    <div class="container info-form">
        <div class="info">
            <div class="xray">
                <img src="../../img/—Pngtree—doctor examine male patient on_8940425.png" alt="" srcset="">
            </div>

            
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Name</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="fname" name="name" value="<?php if(isset($_POST['name'])) { echo $_POST['name'];} ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="age">Age</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="age" name="age" value="<?php if(isset($_POST['age'])){ echo $_POST['age'];}?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="town">Town</label>
                    </div>
                    <div class="col-75">
                        <select id="town" name="town" value="<?php if(isset($_POST['town'])){echo $_POST['town'];} ?>">
                            <option value="cairo">cairo</option>
                            <option value="Giza">Giza</option>
                            <option value="Alexandaria">Alexandaria</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="town">type of Bone</label>
                    </div>
                    <div class="col-75">
                        <select id="bone" name="bone" value="<?php if(isset($_POST['bone'])){echo $_POST['bone'];} ?>">
                            <option value="wrist">wrist</option>
                            <option value="shoulder">shoulder</option>
                            <option value="finger">finger</option>
                            <option value="elbow">elbow</option>
                            <option value="forearm">forearm</option>
                            <option value="humerus">humerus</option>
                            <option value="hand">hand</option>
                            <option value="spine">spine</option>
                            <option value="pelvis">pelvis</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="img">x-ray image</label>
                    </div>
                    <div class="col-75">
                        <input type="file" id="img" name="img" value="../../img/IMG-20240523-WA0065.jpg" required>
                    </div>
                </div>
                <!-- <div class="row">
                <div class="col-25">
                    <label for="subject">Subject</label>
                </div>
                <div class="col-75">
                    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
                </div>
                </div> -->
                <div class="row">
                    <div class="bb">
                        <button class="submit" name="submit">Get <i class='fas fa-bone' ></i></button>
                        <!-- <input type="submit" value="Submit" class="submit"> -->
                    </div>
                </div>
            </form>
            
        </div>
    </div>
<!-- end -->


<!-- footer -->
    <footer class=" flex-wrap py-3 border-top">
        <div class="col-md-4 d-flex align-items-center">
        <span class="mb-3 mb-md-0 text-muted">© 2024 Bone Clinic, Inc</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <!-- <li class="ms-3 me-3"><a class="text-muted" href="#"><i class="fa fa-facebook-square" style="font-size:24px"></i></a></li> -->
        <li class="ms-3 me-3"><a class="text-muted" href="#"><i class="fa fa-facebook-square" style="font-size:30px"></i></a></li>
        <li class="ms-3 me-3"><a class="text-muted" href="#"><i class="fa fa-instagram" style="font-size:30px"></i></a></li>
        <li class="ms-3 me-3"><a class="text-muted" href="#"><i class="fa fa-twitter" style="font-size:30px"></i></a></li>
        </ul>
    </footer>
<!-- end -->
    
    <script src="../../layouts/js/animate.js"></script>
</body>
</html>