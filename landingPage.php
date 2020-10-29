<?php
    include("connect.php");
    session_start();
    $enteredEmail = $_SESSION["correctEmail"];
    $enteredPassword = $_SESSION["correctPassword"];
    $username = $_SESSION["correctName"];
    $avi = $_SESSION["correctAvi"];
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>HOME</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/landingPage.css">
        <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&family=Monoton&display=swap" rel="stylesheet">        

        <script src="js/index.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <div id = "navbar">
                <a><img class="logo" src="images/camLogo.png"></a>
                <a id="title" href="landingPage.php">STACEGRAM</a>
                <div class="dropdown">
                    <img class="avi" src="<?php echo $avi; ?>" alt="picture"/>
                    <a><input type="image" src="images/post.png" alt="Submit" width="48" height="48" class="add"></a>
                    <div class="caretWrapper">
                        <a class="caret"><?php echo ($username)?> &#9660;</a>
                        <div class="dropdownContent">
                            <a href="userProfile.php">Profile</a>
                            <a href="changePassword.php">Change Password</a>
                            <a href="" onclick='confirmLogout()'>Logout</a>
                            <script>
                                function confirmLogout(){
                                    var ask=confirm("Are you sure you want to logout?");
                                    if(ask){
                                    window.location="index.php";
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </div> 
            </div>
        </div> 
    </body>
</html>