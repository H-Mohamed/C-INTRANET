<?php
header('Content-Type: text/html; charset=utf-8');
$con = mysqli_connect("localhost","root","","ccis_agenda") ;
//mysql_set_charset('utf8', $link);
mysqli_set_charset($con,"utf8");
// Check connection

if($con === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
 //LIBELLEDEPARTEMENT,LIBELLEVILLE,NATURE,LIBELLELIEU,DATEDEBUTEV,HEUREVENEMENT,TITREEVENEMENT,DATEFINEV,Comments
//type=Update_employe&id=1&nom=amine&prenom=derragh&dep=Appui aux Entreprises&datedebut=2020-07-18&datefin=2018-12-05
if(isset($_GET["type"])){
    $type=$_GET["type"];
}else $type="";
$message= 'Bien Modifier';
// attempt update query execution

if($type=="Update_employe"){
    $id=$_GET["id"];
    $nom=$_GET["nom"];
    $prenom=$_GET["prenom"];
    $dep=$_GET["dep"];
    $datedebut=$_GET["datedebut"];
    $datefin=$_GET["datefin"];

    $sql_Table_employe = "UPDATE employe SET NOMEMPLOYE='".$nom."',PRENOMEMPLOYE='".$prenom."' WHERE MATRICULEEMPLOYE=".$id;
    $sqlCount="select * from em_travaille_dep where MATRICULEEMPLOYE=".$id;
    $result = mysql_query($sqlCount, $con);

    $num_rows = mysql_num_rows($result);
    if($num_rows>0) $sql_Table_em_tr= "UPDATE em_travaille_dep SET DATEBEDUTTRV = '".$datedebut."', DATEFINTRV = '".$datefin."' WHERE LIBELLEDEPARTEMENT = '".$dep."' AND MATRICULEEMPLOYE =".$id;
    else  $sql_Table_em_tr = "INSERT INTO `em_travaille_dep` (`LIBELLEDEPARTEMENT`,`MATRICULEEMPLOYE`,`DATEBEDUTTRV`,`DATEFINTRV`) VALUES('".$dep."',".$id.",'".$datedebut."','".$datefin."')";

    if(mysqli_query($con, $sql_Table_employe)){
            if(mysqli_query($con, $sql_Table_em_tr)){
                echo $message;
            }else  echo mysqli_error($con);
    }else  echo mysqli_error($con);

}else if($type=="Update_dep"){
    $dep=$_GET["dep"];
    $pass=$_GET["pass"];
    $lastdep=$_GET["lastdep"];
    $sql = "UPDATE departement SET LIBELLEDEPARTEMENT='".$dep."',PASS='".$pass."' WHERE LIBELLEDEPARTEMENT='".$lastdep."'";
    if(mysqli_query($con, $sql)){
        echo $message;
    }else  echo mysqli_error($con);
}else if($type=="Update_nature"){
    $nature=$_GET["nature"];
    $lastnature=$_GET["lastnature"];
    $sql = "UPDATE nature_evenement SET LIBELLENATURE='".$nature."' WHERE LIBELLENATURE='".$lastnature."'";
    if(mysqli_query($con, $sql)){
        echo $message;
    }else  echo mysqli_error($con);
}else if($type=="Update_ville"){
    $ville=$_GET["ville"];
    $lastville=$_GET["lastville"];
    $sql = "UPDATE ville SET LIBELLEVILLE='".$ville."' WHERE LIBELLEVILLE='".$lastville."'";
    if(mysqli_query($con, $sql)){
        echo $message;
        echo header("Refresh:0");
    }else  echo mysqli_error($con);
}else if($type=="Update_lieu"){   
    $lieu=$_GET["lieu"];
    $lastlieu=$_GET["lastlieu"];
    $sql = "UPDATE lieu SET LIBELLELIEU='".$lieu."' WHERE LIBELLELIEU='".$lastlieu."'";
    if(mysqli_query($con, $sql)){
        echo $message;
    }else  echo mysqli_error($con);
}else{
$IDEVENEMENT=mysqli_real_escape_string($con, $_REQUEST['IDEVENEMENT']);
$LIBELLEDEPARTEMENT=mysqli_real_escape_string($con, $_REQUEST['LIBELLEDEPARTEMENT']);
$LIBELLEVILLE=mysqli_real_escape_string($con, $_REQUEST['LIBELLEVILLE']);
$NATURE=mysqli_real_escape_string($con, $_REQUEST['LIBELLENATURE']);
$LIBELLELIEU=mysqli_real_escape_string($con, $_REQUEST['LIBELLELIEU']);
$DATEDEBUTEV=mysqli_real_escape_string($con, $_REQUEST['DATEDEBUTEV']);
$HEUREVENEMENT=mysqli_real_escape_string($con, $_REQUEST['HEUREVENEMENT']);
$TITREEVENEMENT=mysqli_real_escape_string($con, $_REQUEST['TITREEVENEMENT']);
$DATEFINEV=mysqli_real_escape_string($con, $_REQUEST['DATEFINEV']);
$Comments=mysqli_real_escape_string($con, $_REQUEST['Comments']);
// attempt insert query execution

    // reccupÃªrer l'image si elle existe
   
    $state = 1;
   
    // $destination=
   
    if (!($_FILES['image']['error'] > 0))
     {
   
     // $target = '~/images/';//.basename($_FILES['image']['name']);
     // echo basename($_FILES['image']['name']);
     // $image=$_FILES['image']['name'];
   
     $target_dir = "../Applications/Agenda/images/";
     $uploadurl = "images/". basename($_FILES["image"]["name"]);

     $target_file = $target_dir . basename($_FILES["image"]["name"]);
     $uploadOk = 1;
   
     // echo $target_file ;
   
     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
   
     // Check if image file is a actual image or fake image
   
     $check = getimagesize($_FILES["image"]["tmp_name"]);
     if ($check !== false)
      {
   
      // echo "File is an image - " . $check["mime"] . ".";
   
      $uploadOk = 1;
      }
       else
      {
      echo "File is not an image.";
      $uploadOk = 0;
      }
   
     // Check if file already exists
   
     if (file_exists($target_file))
      {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
      }
   
     // Check file size
   
     if ($_FILES["image"]["size"] > 500000)
      {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
      }
   
     // Allow certain file formats
   
     if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
      {
      //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
      }
   
     if ($uploadOk != 0)
      {
   
$sql = "UPDATE evenement SET LIBELLEDEPARTEMENT='".$LIBELLEDEPARTEMENT."', LIBELLEVILLE='".$LIBELLEVILLE."', LIBELLENATURE='".$NATURE."', LIBELLELIEU='".$LIBELLELIEU."', DATEDEBUTEV='".$DATEDEBUTEV."', HEUREVENEMENT='".$HEUREVENEMENT."', TITREEVENEMENT='".$TITREEVENEMENT."', DATEFINEV='".$DATEFINEV."', COMMENTAIRE='".$Comments."', IMAGE='".$uploadurl."' WHERE IDEVENEMENT=".$IDEVENEMENT;
   
}
else
{

// image upload reset

echo '<META  http-equiv="refresh" content="0;URL=index.php?success=3#Agenda_Modifier"> ';
exit();
}
}
else
{

// echo "image not set";

$sql = "UPDATE evenement SET LIBELLEDEPARTEMENT='".$LIBELLEDEPARTEMENT."', LIBELLEVILLE='".$LIBELLEVILLE."', LIBELLENATURE='".$NATURE."', LIBELLELIEU='".$LIBELLELIEU."', DATEDEBUTEV='".$DATEDEBUTEV."', HEUREVENEMENT='".$HEUREVENEMENT."', TITREEVENEMENT='".$TITREEVENEMENT."', DATEFINEV='".$DATEFINEV."', COMMENTAIRE='".$Comments."', IMAGE=NULL WHERE IDEVENEMENT=".$IDEVENEMENT;

// mysqli_query($con, $sql);

}
if($DATEDEBUTEV > $DATEFINEV){ echo '<META  http-equiv="refresh" content="0;URL=index.php?success=0#Agenda_Modifier"> ';exit();}

$deleteAff="DELETE FROM affecter WHERE `IDEVENEMENT`=".$IDEVENEMENT;
if(mysqli_query($con, $sql)){
    if(mysqli_query($con,$deleteAff)){
        if(isset($_POST['chargeS'])){
            $chargeDesuivi=$_POST['chargeS'];
        $affecterChar="INSERT INTO affecter (`ROLE`,MATRICULEEMPLOYE,LIBELLEDEPARTEMENT,IDEVENEMENT) VALUES('CHARGESUIVI','$chargeDesuivi','$LIBELLEDEPARTEMENT','$IDEVENEMENT')";
        }
        mysqli_query($con,$affecterChar) or die(mysqli_error());
            // insert participant a la table affecter
            if(isset($_POST['participants'])){
                $participants=$_POST["participants"];
                foreach($participants as $p)
                {
                    $affecterPart="INSERT INTO affecter (`ROLE`,MATRICULEEMPLOYE,LIBELLEDEPARTEMENT,IDEVENEMENT) VALUES('Participants','$p','$LIBELLEDEPARTEMENT','$IDEVENEMENT')";
                    mysqli_query($con,$affecterPart) or die(mysqli_error());
                   //echo $affecterPart
                }
            }
            echo '<META  http-equiv="refresh" content="0;URL=index.php?success=1#Agenda_Modifier"> ';

        }

}else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

}
}

// close connection
mysqli_close($con);

?>

