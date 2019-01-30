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
//type=Delete_employe&id=1&nom=amine&prenom=derragh&dep=Appui aux Entreprises&datedebut=2020-07-18&datefin=2018-12-05
if(isset($_GET["type"])){
    $type=$_GET["type"];
}else $type="";
// attempt update query execution
if($type=="Delete_employe"){
    $id=$_GET["id"];
    $sql_Table_employe = "DELETE FROM employe WHERE MATRICULEEMPLOYE=".$id;
    if(mysqli_query($con, $sql_Table_employe)){
        echo '<META  http-equiv="refresh" content="0;URL=index.php?success=3#Agenda_Gerer"> ';
    }else  echo mysqli_error($con);
}else if($type=="Delete_dep"){
    $dep=$_GET["dep"];
    $sql = "DELETE FROM departement  WHERE LIBELLEDEPARTEMENT='".$dep."'";
    if(mysqli_query($con, $sql)){
        echo '<META  http-equiv="refresh" content="0;URL=index.php?success=3#Agenda_Gerer"> ';
    }else  echo mysqli_error($con);
}else if($type=="Delete_nature"){
    $nature=$_GET["nature"];
    $sql = "DELETE FROM nature_evenement WHERE LIBELLENATURE='".$nature."'";
    if(mysqli_query($con, $sql)){
        echo '<META  http-equiv="refresh" content="0;URL=index.php?success=3#Agenda_Gerer"> ';
    }else  echo mysqli_error($con);
}else if($type=="Delete_ville"){
    $ville=$_GET["ville"];
    $sql = "DELETE FROM ville WHERE LIBELLEVILLE='".$ville."'";
    if(mysqli_query($con, $sql)){
        echo '<META  http-equiv="refresh" content="0;URL=index.php?success=3#Agenda_Gerer"> ';
    }else  echo mysqli_error($con);
}else if($type=="Delete_lieu"){   
    $lieu=$_GET["lieu"];
    $sql = "DELETE FROM lieu WHERE LIBELLELIEU='".$lieu."'";
    if(mysqli_query($con, $sql)){
        echo '<META  http-equiv="refresh" content="0;URL=index.php?success=3#Agenda_Gerer"> ';
    }else  echo mysqli_error($con);
}else if($type=="Delete_Event") {
    $id=$_GET["id"];
    $sql = "DELETE FROM `evenement` WHERE IDEVENEMENT=".$id;
    if(mysqli_query($con, $sql)){
        echo '<META  http-equiv="refresh" content="0;URL=index.php?success=3#Agenda"> ';
    }else  echo mysqli_error($con); 
}
// close connection
mysqli_close($con);
?>