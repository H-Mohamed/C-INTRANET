<?php
echo "Marrackech de rire";
       /*  $con=mysqli_connect("localhost", "root", "", "ccis_bibliotheque"); 
         // Check connection
         if (mysqli_connect_errno())
           {
           echo "Failed to connect to MySQL: " . mysqli_connect_error();
           }
            $queryUTF="set names 'utf8'";
            mysqli_query($con,$queryUTF) or die(mysqli_error()."[".$queryUTF."]"); 
            $theme=$_GET["Theme"];
            $query="SELECT SOUS_THEME FROM bibliotheque_sous_theme where THEME ='".$theme."'";
            $col = mysqli_query($con,$query)  ;
            if ( $col !== false ) {  
                 while ( $row =  mysqli_fetch_assoc($col) ) {  
                  echo "<option value='".$row["SOUS_THEME"]."'>".$row["SOUS_THEME"]."</option>";
               } 
            }
            else echo "<option value=''>Syntax Error :D ".mysqli_error($con)." </option>";
              //echo "<script>alert('NULL');</script>";
      */
   ?>