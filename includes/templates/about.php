<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../img/Your_paragraph_text1-removebg-preview.png">
    <link rel="stylesheet" href="../../layouts/css/about.css">
    <link rel="stylesheet" href="../../layouts/css/same.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.cdnfonts.com/css/inclusive-sans-2" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>about us</title>
</head>
<body>

<?php 
session_start();
require_once ('./DB.php');
include ('./access.php');
if(isset($_SESSION['name'])){
    echo '<style>
        #buttons{display: none;}
        #button{display: flex;}
        </style>';
}
?>

<div class="container">
        <header>
            <!-- <i class='fas fa-bong'></i> -->
            <div class="cc">
                <img src="../../img/Your_paragraph_text-removebg-preview.png" alt="">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="<?php if(isset($_SESSION['name'])){ echo '../templates/index.php';} ?>"
                                            class="nav-link" aria-current="page">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Totarial</a></li>
                    <!-- <li class="nav-item"><a href="#" class="nav-link">aboutUs</a></li> -->
                    <li class="nav-item"><a class="nav-link" id="faq">FAQs</a></li>
                    <li class="nav-item"><a href="../templates/about.php" class="nav-link active">About</a></li>
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
            <div class="container faq shadow">
                <form action="">
                    <div><label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your name.."></div><br>
                    <div><label for="subject">Subject</label>
                    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea></div>
                    <div class="ffbtns">
                        <input type="submit" value="submit" name="faq">
                        <button id="faqclose">close</button>
                    </div>
                </form>
            </div>
            <!-- end -->
        </header>
    </div>
<!-- end -->



    <div class="abouttalk">
        <!-- <div class="container-sm pt-5 team">
            <div class="imgteam"><img src="" alt=""></div>
        </div> -->

        <div class="b1" style="background-color: #63c5da;">
            <h1>About Us</h1>
            <div class="about1">
                <p>Welcome to <b>Bone Clinic </b> , your trusted partner in advanced medical imaging and analysis. We are dedicated to revolutionizing
                    healthcare by providing cutting-edge technology that brings diagnostics to your fingertips.
                    Our mission is to empower individuals with convenient access to bone health assessments from the comfort of their homes.
                </p>
            </div>
        </div>
        <div class="b2" style="background-color: #48aaad;">                                       
            <h1>Our Vision</h1>
            <div class="about2">
                <p>At <b>Bone Clinic </b>, we envision a world where healthcare is not only reactive but also proactive. By leveraging technology, we aim to make preventive care more accessible,
                    allowing individuals to monitor their bone health and detect potential skin issues early on.
                </p>
            </div>
        </div>
        <div class="b3" style="background-color: #016064;">
            <h1>State of the Art X-ray Technology</h1>
            <div class="about3">
                <p>At <b>Bone Clinic </b>, We employ the latest advancements in X-ray technology to deliver high-quality images for bone analysis. Our platform ensures accurate and detailed scans,
                    allowing for a comprehensive understanding of your bone structure.
                </p>
            </div>
        </div>
        <div class="b4" style="background-color: #022d36;">
            <h1>Skin Disease Analysis</h1>
            <div class="about4">
                <p>In addition to bone health, our platform extends its capabilities to skin disease analysis. Users can upload images of skin-related concerns, and our advanced algorithms will provide insights into various skin conditions,
                    promoting early detection and prompt medical attention.
                </p>
            </div>
        </div>
        <div class="b5" style="background-color: #281e5d;">
            <h1>User Friendly Interface</h1>
            <div class="about5">
                <p>At <b>Bone Clinic </b> Navigating health assessments should be simple and stress-free.
                    Our user-friendly interface ensures that you can easily upload X-ray images and skin photos,
                    making the entire process efficient and accessible to everyone.
                </p>
            </div>
        </div>
        <div class="b6" style="background-color: #151e3d;">
            <h1>Customized Reports</h1>
            <div class="about6">
                <p>Upon analysis, our platform generates personalized reports for each user.
                    These reports not only include the results of bone and skin assessments but also provide valuable information and recommendations for maintaining or improving overall health.
                </p>
            </div>
        </div>
        <div class="b7" style="background-color: #0a1172;">
            <h1>Empowering Your Health Journey</h1>
            <div class="about7">
                <p> We understand the importance of timely and accurate health information.
                    <b>Bone Clinic </b> is committed to empowering individuals on their health journey by providing comprehensive insights and fostering a proactive approach to well-being.
                </p>
            </div>    
        </div>
        <div class="b8" style="background-color: #241571;">
            <h1>Security and Privacy</h1>
            <div class="about8">
                <p> Your health information is of utmost importance to us. Rest assured that we prioritize the security and privacy of your data.
                    Our platform adheres to the highest standards of data protection to ensure a secure and confidential experience for every user.         
                </p>
            </div>
        </div>
        <div class="b9" style="background-color: #52b2bf;">
            <h1>Contact US !</h1>
            <div class="about9">
                <p> Join us on this journey towards a healthier and more informed you. Experience the future of healthcare with <b>Bone Clinic </b>.
                    <a href="#" class="text-primary">Contact Us</a>
                    to learn more or get started on your health assessment today!              
                </p>
            </div>
        </div>
        
        
    </div>

<!-- register & login -->
<div id="signin" class="modal">
        <div class="container">
            <div class="contlogin" id="cont">
                <p>Let's log in to be canable make your only Reports and enjoy with our features in our bones
                 <i class='fas fa-x-ray'></i> World</p>
            </div>
            <form class="modal-content" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" id="login" enctype="multipart/form-data">
                <span class="close" title="Close Modal">&times;</span>
                <h1>log in</h1>
                <div class="div">
                    <label for="uaname"><b>Username</b></label> 
                    <span>Need an account ?<span><a class="signup"> sign up</a></span></span>
                </div>
                <input type="text" placeholder="Enter Username" name="name" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                    
                <button type="submit" class="signi" id="in" name="signin">Login</button>
                <div class="or-div">
                    <span class="or-line">or</span>
                </div>
                <span class="psw"><a href="#">Forgot a password ?</a></span>
                <button type="button" class="cancel">Cancel</button>
            </form>

            <!-- sign up -->
            <div class="contsignup" id="cont">
                <p>Oh noo , You haven't account ,
                 Just make your account in our site to follow us and get feedbacks from doctors online
                 <i class='fas fa-book-medical'></i></p>
            </div>
            <form class="modal-content animate" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" id="signup" enctype="multipart/form-data">
                <span class="close" title="Close Modal">&times;</span>
                <h1>Sign up</h1>
                <div class="div">
                    <label for="uname"><b>Username</b></label> 
                    <span>Already have an account ?<span><a class="signin"> log in</a></span></span>
                </div>
                <input type="text" placeholder="Enter Username" name="name" required>
                <label for="account"><b>Account</b></label> 
                <input type="text" placeholder="Enter account" name="account" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                    
                <button type="submit" class="signi" id="reg" name="reg">Register</button>
                <div class="or-div">
                    <span class="or-line">or</span>
                </div>
                
                    <!-- <span class="psw"><a href="#">Forgot a password ?</a></span> -->
                    <button type="button" class="cancel">Cancel</button>
                <!-- </div> -->
            </form>
        </div>
    </div>
<!-- end -->


<!-- footer -->
    <footer class="flex-wrap py-3 border-top">
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