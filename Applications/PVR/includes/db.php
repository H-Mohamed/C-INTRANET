<?php
     session_start();
     $con= mysqli_connect("localhost","root","","ccis_pvr") ;
       if ($con->connect_errno > 0)
        {
        echo "Failed to connect to MySQL: " . $con->connect_errno;
        }else {
            $queryUTF="set names 'utf8'";
            mysqli_query($con,$queryUTF) or die(mysqli_error()."[".$queryUTF."]");  
        }       
    ?>