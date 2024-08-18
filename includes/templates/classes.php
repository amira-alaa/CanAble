<?php 
class classes{
    
    public function signin(){
    
        $name=$_POST['name'];
        $email=filter_var($_POST['name'],FILTER_SANITIZE_EMAIL);
        $pass=filter_var($_POST['psw'],FILTER_SANITIZE_STRING);
        $hashed_pass=password_hash($pass,PASSWORD_DEFAULT);
    
        global $con;
        $stmt=$con->prepare('SELECT * FROM doctors where account=? OR name=?');
        $stmt->execute(array($email , $name)); 
        $data=$stmt->fetch();
        $count=$stmt->rowCount();
    
        // admin
        $stmt1=$con->prepare('SELECT * FROM admin where account=? or name=?');
        $stmt1->execute(array($email ,$name));
        $admin=$stmt1->fetch();
        $count_admin=$stmt1->rowCount();
        // end 
        // echo $count;
        if($count>0){
            $result=password_verify($pass,$data['password']);
            
            if(isset($result)){
                session_start();
                $_SESSION['id']=$data['id'];
                $_SESSION['name']=$data['name'];
                $_SESSION['account']=$data['account'];
    
                header("Refresh:0;url=index.php");  // Still commented out
                // $response = array(
                //     'success' => true
                // );
                // echo json_encode($response);
                // exit;
            }
            else{
                // $response = array(
                //     'success' => false,
                //     'message' => 'Incorrect password. Please try again.'
                // );
                // echo json_encode($response);
                // exit;
                echo'
                <script>
                toastr.error("please enter your password again");
                </script>';

            }
        }
        elseif($count_admin>0){
            $result=password_verify($pass,$data['password']);
            
            if(isset($result)){
                session_start();
                $_SESSION['id']=$data['id'];
                $_SESSION['name']=$data['name'];
                $_SESSION['account']=$data['account'];
    
                // echo "User authenticated, session variables set<br>"; // Debug statement
    
                header("Refresh:0;url=dashBoard.php");  // Still commented out
            }
            else{
                
                // echo "Password verification failed<br>"; // Debug statement
                echo'
                <script>
                toastr.error("please enter your password again");
                </script>';

                echo '
                <script>
                var xmlhttp = new XMLHttpRequest();
                toastr.error("please enter your password again");
                
                xmlhttp.open("GET", "getstart.php", true);
                xmlhttp.send();
                </script>
                ';
            }
        }
        else{
            // $response = array(
            //     'success' => false,
            //     'message' => 'User not found.'
            // );
            // echo json_encode($response);
            // exit;
            echo'
            
            <script>
            $(".page").css("display" , "none");
            $("#signin").css("display","flex");
            $("#signin").fadeIn();
            $("#signup").hide();
            $(".contlogin").fadeIn();
            toastr.error("please enter your password or email again");
            </script>';
            // die("error");
        }
        
        // echo "Signin method completed<br>";
    }

    public function signup(){
        $name= $_POST['name'];
        $email=$_POST['account'];
        $pass=$_POST['psw'];
        $hashed_pass=password_hash($pass,PASSWORD_DEFAULT);
        global $con;
        $stmt1=$con->prepare('SELECT * FROM doctors where account=? AND name=?');
        $stmt1->execute(array($email,$name));
        $data=$stmt1->fetch();
        $count=$stmt1->rowCount();
        if($count<1){
            $stmt=$con->prepare("INSERT INTO doctors(name,account,password) value(?,?,?)");
            $stmt->execute(array($name,$email,$hashed_pass));

            // echo'
            //     <script>
            //     $("#signin").fadeIn();
            //     $("#signup").hide();
            //     $("#login").show();
            //     </script>
            // ';
        }
        elseif($count>=1){
            echo'<script>
            toastr.warning("already have account please login");
            </script>';
        }

    }

    public function info(){
        $namei=$_POST['name'];
        $agei=$_POST['age'];
        $towni=$_POST['town'];
        $bone=$_POST['bone'];
        $img_name=$_FILES['img']['name'];
        $img_temp=$_FILES['img']['tmp_name'];
        $extintions_img=array("png","svg","jpg","jpeg","webp");
        @$extintion_img=strtolower(end(explode(".",$img_name))); 
        
        if(in_array($extintion_img,$extintions_img)){
            $final_img= "patient". "_" . rand(0,1000) . "." . $extintion_img;
            $img_dest='../../xrays/'.$final_img;
            move_uploaded_file($img_temp,$img_dest);
        }
        // prediction
        
        putenv("PYTHONUNBUFFERED=1");
        putenv("TF_ENABLE_ONEDNN_OPTS=0"); 
        if($bone=='pelvis'){
            $output = shell_exec("..\..\.venv\Scripts\python.exe ..\..\pelvis.py $img_dest 2>&1");
        
            $progressBarRegex = '/\d+\/\d+ ━+ \d+s \d+ms\/step /';
            $ansiEscapeRegex = '/\x1B\[[0-9;]*m/';

            // Remove ANSI escape codes using regex
            $output = preg_replace($progressBarRegex, '', $output);
            $output = preg_replace($ansiEscapeRegex, '', $output);

            $jsonStart = strpos($output, '{');
            $jsonEnd = strrpos($output, '}');
            $jsonString = substr($output, $jsonStart, $jsonEnd - $jsonStart + 1);

            // decode JSON into PHP array
            $result = json_decode($jsonString, true);
            $class_name = $bone;
            $predict=$result['severity'];
            $imggrid=$result['overlayed_image_path'];

        }
        elseif($bone=='spine'){
            $output = shell_exec("..\..\.venv\Scripts\python.exe ..\..\spine.py $img_dest 2>&1");
        
            $progressBarRegex = '/\d+\/\d+ ━+ \d+s \d+ms\/step /';
            $ansiEscapeRegex = '/\x1B\[[0-9;]*m/';

            // Remove ANSI escape codes using regex
            $output = preg_replace($progressBarRegex, '', $output);
            $output = preg_replace($ansiEscapeRegex, '', $output);

            $jsonStart = strpos($output, '{');
            $jsonEnd = strrpos($output, '}');
            $jsonString = substr($output, $jsonStart, $jsonEnd - $jsonStart + 1);

            // decode JSON into PHP array
            $result = json_decode($jsonString, true);
            $class_name = $bone;
            $predict=$result['severity'];

            $imggrid=$result['overlayed_image_path'];            
        }
        else{
            $output = shell_exec("..\..\.venv\Scripts\python.exe ..\..\app.py $img_dest 2>&1");
            
            $progressBarRegex = '/\d+\/\d+ ━+ \d+s \d+ms\/step /';
            $ansiEscapeRegex = '/\x1B\[[0-9;]*m/';

            // Remove ANSI escape codes using regex
            $output = preg_replace($progressBarRegex, '', $output);
            $output = preg_replace($ansiEscapeRegex, '', $output);

            $jsonStart = strpos($output, '{');
            $jsonEnd = strrpos($output, '}');
            $jsonString = substr($output, $jsonStart, $jsonEnd - $jsonStart + 1);

            // decode JSON into PHP array
            $result = json_decode($jsonString, true);
            $class_name = $result['class_name'];
            $predict=$result['severity'];
            $imggrid=$result['overlayed_image_path'];
        }
        global $con;
        $stmt=$con->prepare('INSERT INTO info(u_id,name,age,town,bone_type,img,class_name,predict,imgGrid) value(?,?,?,?,?,?,?,?,?)');
        @$stmt->execute(array($_SESSION['id'],$namei,$agei,$towni,$bone,$img_dest,$class_name,$predict,$imggrid));
        echo '<script>window.location.href = "report.php";</script>';
    }
    
    
}

?>