<?php
    include 'conx.php';
    session_start();
    if(isset($_POST['signUp'])){
        $fullName= mysqli_real_escape_string($conn,$_POST['Fullname']);
        $phone= mysqli_real_escape_string($conn,$_POST['Phone']);
        $email= mysqli_real_escape_string($conn,$_POST['Email']);
        $statu= mysqli_real_escape_string($conn,$_POST['Status']);
        $password= mysqli_real_escape_string($conn,$_POST['Password']);
        $Cpassword= mysqli_real_escape_string($conn,$_POST['Confirmation_Password']);
        $error = true;
        if(!preg_match("/^[a-zA-Z ]+$/",$fullName)){
            $nameError="Name must contain only alphabets and space";
            $error=false;
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $emailError="Please Enter Valid Email ID";
            $error=false;
        }
        if(strlen($password) < 6){
            $passwordError="Password must be minimum of 6 characters";
            $error=false;
        }
        if(strlen($phone) < 10){
            $phoneError="Mobile number must be minimum of 10 characters";
            $error=false;
        }
        if($password != $Cpassword){
            $CpasswordError="Password and Confirm Password doesn't match";
            $error=false;
        }
        if(!preg_match("/^[a-zA-Z ]+$/",$statu)){
            $statusError="status must contain only alphabets and space";
            $error=false;
        }
        
        if ($error!=false) {
            $sql = "SELECT * FROM `user_` WHERE  Email='$email'";
            $result = $conn->query($sql);
            if(!$result->num_rows > 0){
                // mysqli_query($conn, "INSERT INTO `user_`(`Full_Name`, `Phone`, `Email`, `Password_`, `Status_`) VALUES ('". $fullName ."','". $phone ."','". $email ."','". md5($password) ."','". $statu ."')");
                // // $id=mysqli_insert_id($conn);
                // $sql = "SELECT * FROM `user_` WHERE Email='$email' AND Password_='$password'";
                // $result = $conn->query($sql);
                // if ($result->num_rows > 0) {
                //     $row  = $result -> fetch_array(MYSQLI_ASSOC);
                //     $_SESSION['ID_User'] = $row['ID_User'];
                //     header("Location: index.php");
                //     // echo "<script>alert('good.')</script>";
                    
                // } 
                // // mysqli_query($con,"SELECT * FROM `user_` WHERE Email='$email' AND Password_='$password'");
                // // $_SESSION['user']=$id;
                if(mysqli_query($conn, "INSERT INTO `user_`(`Full_Name`, `Phone`, `Email`, `Password_`, `Status_`) VALUES ('". $fullName ."','". $phone ."','". $email ."','". md5($password) ."','". $statu ."')")) {
                    header("location: login.php");
                    exit();
                }else {
                    echo "Error: " . $sql . "" . mysqli_error($conn);
                }
            }
           
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  href="style.css" rel="stylesheet">
    <link  href="signUp.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ab021e0629.js" crossorigin="anonymous"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <title>Cimary</title>
</head>
<body>
    <?php include 'navbar.php' ?>
    <div class="container text-center py-5 signUp">
            <div class="bg_form">
                <br>
                <div class="newAROUND">
                    <h1>NEW AROUND HERE?</h1>
                </div>
                <form action="signUp.php" method="POST" class="inputs">
                    <span><?php if (isset($nameError)) echo $nameError; ?></span>
                    <input type="text" name="Fullname" value="" placeholder=" Full Name" required="required">
                    <span><?php if (isset($phoneError)) echo $phoneError; ?></span>
                    <input type="text" name="Phone" value="" placeholder=" Phone" required="required">
                    <span><?php if (isset($emailError)) echo $emailError; ?></span>
                    <input type="text" name="Email" value="" placeholder=" Email" required="required">
                    <span><?php if (isset($statusError)) echo $statusError; ?></span>
                    <!-- <select name="Status" id="Status">
                        <option value="Etudiant ">Etudiant</option>
                        <option value="saab">Saab</option>
                        <option value="mercedes">Mercedes</option>
                        <option value="audi">Audi</option>
                    </select> -->
                    <input type="text" name="Status" value="" placeholder=" Status" required="required">
                    <span><?php if (isset($passwordError)) echo $passwordError; ?></span>
                    <input type="password" name="Password" value="" placeholder=" Password" required="required">
                    <span><?php if (isset($CpasswordError)) echo $CpasswordError; ?></span>
                    <input type="password" name="Confirmation_Password" value="" placeholder="  Confirmation Password" required="required">
                    <input type="submit" name="signUp" value="SIGN UP" class="btn_pr btn_sign mt-5 my-5" />
                    <span style="color:green;"></span>
                </form>
            </div>
    </div>
    <?php include("footer.php");?>
</body>
</html>