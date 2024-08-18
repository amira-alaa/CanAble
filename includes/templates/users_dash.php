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
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin='anonymous'></script>
    <script src="../../layouts/js/jquery-3.7.1.min.js"></script>
    <script src="../../layouts/js/toastr.min.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
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
    
    <h1>user's DashBoard</h1>
    <div class="card">
        <h3>Body Fat Percentage</h3>
        <div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>
    </div>
       
    <div class="">
        <table style="width: 90%;" class="">
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
        
        </table>
        <?php } ?>
    </div>

    <script src="../../layouts/js/charts.js"></script>
</body>
</html>