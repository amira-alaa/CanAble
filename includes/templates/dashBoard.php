<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../img/Your_paragraph_text1-removebg-preview.png">
    <link rel="stylesheet" href="../../layouts/css/dashBoard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.cdnfonts.com/css/inclusive-sans-2" rel="stylesheet">
    <link rel="stylesheet" href="../../layouts/css/toastr.min.css">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin='anonymous'></script> -->
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script src="../../layouts/js/jquery-3.7.1.min.js"></script>
    <script src="../../layouts/js/toastr.min.js"></script>
    <script src="../../layouts/js/charts.js"></script>
    <title>Admin</title>
</head>    
<body>
    <!-- php files -->
    <?php 
    require_once './DB.php';
    include_once './dash.php';
    $counter=new classes_admin();
    ?>
    
    <!-- end -->
    
    <h1>Dash Board</h1>
    <div class="container">
        <button id="users"><div class="stat">
            users
            <hr>
        <span><?php $counter->counts('id','doctors') ?></span>
        </div>    
        </button>

        <button id="xrays"><div class="stat">
            x-rays
            <hr>
            <span><?php $counter->counts('id','info') ?></span>
        </div>    </button>
        <button id="faqs" ><div class="stat">
            faqs
            <hr>
            <span><?php $counter->counts('id','faq') ?></span>    
        </div> </button>
    </div>    

    <div class="tables">
        <table>
            <tr>
                <th>Name</th>
                <th>age</th>
                <th>town</th>
            </tr>
        <?php
        global $con;
        $stmt=$con->prepare("Select * from info");
        $stmt->execute();
        $data = $stmt->fetchAll();
        foreach($data as $user){
        ?>
            <tr>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['age']; ?></td>
                <td><?php echo $user['town']; ?></td>
            </tr>
        
            <?php } ?>
        </table>
            
        <table>
            <tr>
                <th>Name</th>
                <th>age</th>
                <th>town</th>
            </tr>
        <?php
        global $con;
        $stmt=$con->prepare("Select * from info");
        $stmt->execute();
        $data = $stmt->fetchAll();
        foreach($data as $user){
        ?>
            <tr>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['age']; ?></td>
                <td><?php echo $user['town']; ?></td>
            </tr>
        
            <?php } ?>
        </table>
    </div>

    <!-- users part -->
    <div class="users">
        <table style="width: 90%;">
            <tr>
                <th>Name</th>
                <th>age</th>
                <th>town</th>
            </tr>
        <?php
        global $con;
        $stmt=$con->prepare("Select * from info");
        $stmt->execute();
        $data = $stmt->fetchAll();
        foreach($data as $user){
        ?>
            <tr>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['age']; ?></td>
                <td><?php echo $user['town']; ?></td>
            </tr>
        
            <?php } ?>
        </table>
    </div>

    <!-- faq part -->
    <div class="faqs">
        <?php  
        global $con;
        $stmt=$con->prepare('SELECT COUNT(id) FROM faq where result=?');
        $stmt->execute(array("positive"));
        $pos= $stmt->fetchColumn();
        // echo $pos;

        $stmt1=$con->prepare('SELECT COUNT(id) FROM faq where result=?');
        $stmt1->execute(array("negative"));
        $neg= $stmt1->fetchColumn();

        $stmt2=$con->prepare('SELECT COUNT(id) FROM faq where result=?');
        $stmt2->execute(array("neutral"));
        $nat= $stmt2->fetchColumn();
        // echo $pos , $neg , $nat;
        $results=array('positive'=>$pos,'negative'=>$neg,'natural'=>$nat);
        $json_results=json_encode($results);
        // header('Content-Type: application/json');
        // echo $json_results;
        // $results=array((string)$pos,(string)$neg,(string)$nat);
        // $json_results=json_encode($results);
        // header('Content-Type: application/json');
        // echo $json_results;
        // include 'dash.php';
        echo"<script> var data = '$json_results'; </script>";

        ?>
    <div id="chartContainer"></div>
        <table>
            <tr>
                <th>Name</th>
                <th>Feed Back</th>
            </tr>
        <?php
        global $con;
        $stmt=$con->prepare("Select * from faq");
        $stmt->execute();
        $data = $stmt->fetchAll();
        foreach($data as $user){
        ?>
            <tr>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['review']; ?></td>
            </tr>
        
            <?php } ?>
        </table>
    </div>


    <!-- x-ray part -->
    <div class="xrays">
        <table style="width: 70%;">
            <tr>
                <th>Fructure</th>
            </tr>
        <?php
        global $con;
        $stmt=$con->prepare("Select img from info");
        $stmt->execute();
        $data = $stmt->fetchAll();
        foreach($data as $fruct){
        ?>
            <tr>
                <td><img src="<?php echo $fruct['img']; ?>" alt=""></td>
            </tr>
        
            <?php } ?>
        </table>

        
    </div>

    <!-- <script src="../../layouts/js/charts.js"></script> -->

</body>
</html>