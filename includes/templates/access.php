<?php
include_once './classes.php';
$class =new classes();

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='POST'){
    
    if(isset($_POST['signin'])){
        // header('Content-Type: text/plain');
        // $str="amiraaa";
        // echo $str;
        $class->signin(); 
    }
        
    // sign up
    elseif(isset($_POST['reg'])){
        $class->signup();
    }
    // elseif(isset($_POST['faq'])){
    //     $class->faq();
    // }
}
// $response = array(
//     'success' => true,
//     'message' => 'Welcome with you',
//     'redirect'=> 'index.php'
// );
// $result=json_encode($response);
// echo $result;
// exit;
?>