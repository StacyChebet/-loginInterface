<?php
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
            <div id="topNavBar">
                <img class="logo" src="images/camLogo.png">
                <ul>
                    <li id="title"><a href="landingPage.php">STACEGRAM</a></li>
                    <li class="listItem"<?php ?>><a href="index.php">Logout</a></li>
                    <li class="listItem"><a href="changePassword.php">Change Password</a></li>
                    <li class="listItem"><?php echo ($username)?></li>
                    <li class="listItem"><img class="avi" src="<?php echo $avi; ?>" alt="picture"/></li>
                    </ul>
            </div>
        </div> 
    </body>
</html>