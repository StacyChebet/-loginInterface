<?php
        $server="localhost";
        $username="root";
        $password="";
        $database="stacegram";
        $link=mysqli_connect($server, $username, $password, $database);
        if(!$link){
            die("Could not connect".mysqli_connect_error());
        }
        // echo "Connected Successfully";

        // $sql = "SELECT * FROM `foodtable`"; 
        // $result = mysqli_query($link, $sql) or die( mysqli_error($link));
        // while($row = mysqli_fetch_array($result))
        // {
        //     $id = $_SESSION["id"] =  $row['foodID'];
        // }
        
        
?>