<?php
         $con = mysqli_connect("localhost","root","","ccis_agenda") ;
         // Check connection
         if (mysqli_connect_errno())
           {
           echo "Failed to connect to MySQL: " . mysqli_connect_error();
           }
           
           $queryUTF="set names 'utf8'";
           mysqli_query($con,$queryUTF) or die(mysqli_error()."[".$queryUTF."]");
           $type=$_GET["type"];

          if($type=="getdates"){
            $departement=$_GET["departement"];
            $id=$_GET["id"];
            $queryET="SELECT * FROM em_travaille_dep WHERE MATRICULEEMPLOYE=".$id." AND LIBELLEDEPARTEMENT='".$departement."'";
            $resultET=mysqli_query($con,$queryET) or die(mysqli_error()."[".$queryET."]");
            $row = mysqli_fetch_assoc($resultET);
            echo $row['DATEBEDUTTRV'].'|'.$row['DATEFINTRV'];
          }
          else if($type=="getdepartements"){
              $id=$_GET["id"];
              $queryD="SELECT LIBELLEDEPARTEMENT FROM departement WHERE LIBELLEDEPARTEMENT NOT IN (SELECT LIBELLEDEPARTEMENT FROM em_travaille_dep WHERE MATRICULEEMPLOYE=".$id.")";
              $resultD=mysqli_query($con,$queryD) or die(mysqli_error()."[".$queryD."]");
              if(mysqli_num_rows($resultD)>0){
                echo "<optgroup label='Ajouter a:'>";
                while($row = mysqli_fetch_assoc($resultD)){
                  echo "<option value='".$row['LIBELLEDEPARTEMENT']."'>".$row['LIBELLEDEPARTEMENT']."</option>";
                }
               echo "</optgroup>";
            }
          }

?>