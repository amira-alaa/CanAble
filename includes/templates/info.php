<?php
include_once('./classes.php');

$class=new classes();
if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='POST'){


    // info form
    if(isset($_POST['submit']) && isset($_SESSION['name'])){
        
        if(empty($_POST['name']) or empty($_POST['age']) or empty($_POST['town'])){
            echo'
            <script>
            toastr.warning("please complete your information")
            </script>';
            
        }
        else{
            $class->info();
        }
    }
    // elseif(isset($_POST['faq'])){
    //     $class->faq();
    // }

}


?>