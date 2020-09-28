<?php 
    session_start();
    if (isset($_POST["login"])){
        $enteredEmail = $_POST["email"];
        $enteredPassword = $_POST["password"];
        $username = $_SESSION["name"];
        $password = $_SESSION["password"];
        $email = $_SESSION["email"];
        $avi = $_SESSION["aviPic"];

        if($enteredEmail == $email && $enteredPassword == $password){
            $message = "Login Successful. Welcome to Stacegram.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            $_SESSION["correctPassword"] = $password;
            $_SESSION["correctEmail"] = $email;
            $_SESSION["correctAvi"] = $avi;
            $_SESSION["correctName"] = $username;
            header("Location: landingPage.php");
        }else{
            $message = "Sorry, wrong password. Try again.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header("refresh:3;url=index.php");
        }

    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>LOGIN</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&family=Monoton&display=swap" rel="stylesheet">        

        <script src="js/index.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <div id="topNavBar">
                <img class="logo" src="images/camLogo.png">
                <ul>
                    <li id="title"><a href="index.php">STACEGRAM</a></li>
                    <li class="listItem"><a href="">Contact Us</a></li>
                    <li class="listItem"><a href="">About</a></li>
                    </ul>
            </div>
        </div> 
        <div class="form">
            <div class="loginForm">
                <form style="max-width: 600px;" method="POST" style="margin:auto" action="">
                    <h1 class="formHeading">Login</h1>               
                    <!-- Email -->
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" name="email" id="email" required/><br/><br>
                    <!--Password-->
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" id="passsword" required/>
                    
                    <br/>
                    <br/>

                    <button type="submit" name="login">LOGIN</button>
                    <p>Don't have an account?<a href="signUp.php" class="signup"> Sign up</a></p>
                </form>
            </div>
        </div>
    </body>
</html>