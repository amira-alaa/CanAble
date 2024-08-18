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
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <!-- <script src="../../layouts/js/toastr.min.js"></script> -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>    
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
    <title>Get Start</title>
</head>
<body>

<!-- php files -->
<?php 
require_once ('./DB.php');
include('./classes.php');
include ('./access.php');
?>

<!-- end -->
<!-- header -->
    <div class="container page">
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
                <form action="">
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
        <!-- end -->
        
        
        
        <!-- get started -->
        <div class="content">
            <div class="left-content">
                <h1>Welcome to our Bone Clinic</h1>
                <p>the purpose is to help you to diagnose your condition throught 
                    entering your xray img and waiting for model to diaplay simple report about your condition ,
                    also to make it easier to book an appointment with a doctor near you . </p>
                    <button class="getbtn">Get Started</button>
                </div>
                <div class="right-content">
                    <img src="../../img/—Pngtree—chest x ray flat multi_3777207.png" alt="">
                </div>
            </div>
            <!-- end -->
            
            
            
        </div>
        <!-- register & login -->
        <div id="signin" class="modal">
            <div class="container">
                    <div class="contlogin" id="cont">
                        <p>Let's log in to be canable make your only Reports and enjoy with our features in our bones
                        <i class='fas fa-x-ray'></i> World</p>
                    </div>
                    <form class="modal-content" method="POST" id="login" enctype="multipart/form-data" target="_blank">
                        <!-- <span class="close" title="Close Modal">&times;</span> -->
                        <h1>log in</h1>
                        <div class="div">
                            <label for="uaname"><b>Username</b></label> 
                            <span>Need an account ?<span><a class="signup"> sign up</a></span></span>
                        </div>
                        <input type="text" placeholder="Enter Username" name="name" required>
                        
                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" required>
                        
                        <button onclick="" type="submit" class="signi" id="in" name="signin">Login</button>
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
            
                            <button type="button" class="cancel">Cancel</button>
                        </form> 
            </div>
        </div>
<!-- end -->
<script>
    
</script>

<script src="../../layouts/js/animate.js"></script>
</body>
</html>