<?php
					$con=mysqli_connect("localhost", "root", "", "ccis_users"); 
         // Check connection
         if (mysqli_connect_errno())
           {
           echo "Failed to connect to MySQL: " . mysqli_connect_error();
           }
           
           $queryUTF="set names 'utf8'";
           mysqli_query($con,$queryUTF) or die(mysqli_error()."[".$queryUTF."]");
              $queryD="SELECT LIBELLEDEPARTEMENT FROM departement";
              $resultD=mysqli_query($con,$queryD) or die(mysqli_error()."[".$queryD."]");

                while($row = mysqli_fetch_assoc($resultD)){
                  echo "<option value='".$row['LIBELLEDEPARTEMENT']."'>".$row['LIBELLEDEPARTEMENT']."</option>";
                }
?>