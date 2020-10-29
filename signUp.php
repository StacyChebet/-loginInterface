<?php
    include("connect.php");
    session_start();
    if (isset($_POST["submit"])){
        $name=$_POST["name"];
        $eAddress=$_POST["email"];
        $city=$_POST["city"];
        $pass=$_POST["password"];
        $confirmedPass=$_POST["confirmPassword"];
        //Uploading image
        $filename    = $_FILES["avi"]["tmp_name"];
        $destination = "upload/" . $_FILES["avi"]["name"]; 
        move_uploaded_file($filename, $destination); //save uploaded picture in your directory
    
        $_SESSION["name"] = $name ;
        $_SESSION["email"] = $eAddress;
        $_SESSION["city"] = $city;
        $_SESSION["password"] = $confirmedPass;
        $_SESSION["aviPic"] = $destination;
        if($pass == $confirmedPass){
            $message = "Account created Successfully! Login below.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header("Location: index.php");
        }else{
            $message = "Sorry, the passwords do not match. Try again.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header("refresh:3;url=signUp.php");
        }
         
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>SIGN UP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/signUp.css">
        <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&family=Monoton&display=swap" rel="stylesheet">        

        <script src="js/index.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <div id="topNavBar">
                <img class="logo" src="images/camLogo.png">
                <ul>
                    <li id="title"><a href="signUp.php">STACEGRAM</a></li>
                    <li class="listItem"><a href="">Contact Us</a></li>
                    <li class="listItem"><a href="index.php">Login</a></li>
                </ul>
            </div>
            <div class="registrationForm">
                    <div class="register">
                        <form style="max-width: 600px;" method="POST" style="margin:auto" action="" enctype="multipart/form-data">
                            <h1 class="formHeading">SIGN UP</h1>
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control" required><br/><br/>
                            <label for="email">Email:</label>
                            <input type="email" name="email" placeholder="example@email.com" class="form-control" required><br/><br/>
                            <label for="city" >City:</label>
                            <input type="text" name="city" class="form-control" required><br/><br/>
                            <label for="password" >Password:</label>
                            <input type="password" name="password" minlength="4" maxlength="12" class="form-control" required><br/><br/>
                            <label for="confirmPassword" >Confirm Password:</label>
                            <input type="password" id="confirmPassword" name="confirmPassword" minlength="4" maxlength="12" class="form-control" required><br/><br/>
                            <label for="avi">Profile Photo:</label>
                            <input type="file" name="avi" class="form-control" required><br/><br/>
                            <input type="submit" name="submit" value="SIGN UP" class="submit">
                            <p>Already have an account? <a href="index.php" class="signup">Login</a></p>
                        </form>
                    </div>   
                </div>
        </div> 
    </body>
</html>