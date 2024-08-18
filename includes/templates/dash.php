<?php
require_once './DB.php';
class classes_admin{
    public function counts($count,$table){
        global $con;
        $stmt=$con->prepare("SELECT COUNT($count) from $table");
        $stmt->execute();

        echo $stmt->fetchColumn();
    }
    // public function faq(){
        


        

    // }


}
// $class=new classes_admin();
// $class->faq();




?>