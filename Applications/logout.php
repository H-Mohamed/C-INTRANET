<?php if(!isset($_COOKIE["U"]))
{
	 
		echo ' 
<META http-equiv="refresh" content="0; URL=index.php">ERROR | transfer vers l\'acceuil en cours';
      exit();
}else{
?>
 <?php  if($_GET["disconnect"]==true){
	session_start();
	$connection=mysqli_connect("localhost", "root", "", "ccis_users"); 
   $u = $_GET["user"];
   mysqli_close($connection);  
   setcookie("U",$u, time() - 86400,'/ccis/');
   setcookie("T","", time() - 86400,'/ccis/');

   session_destroy(); 
	//disconnect true
  		echo '
<META http-equiv="refresh" content="0; URL=index.php"> <center> Déconnection en cours,Si la page d\'accueil ne se charge pas dans 3 secs cliquez <a href="index.php">ICI</a></center>'; }
	else{
		//else disconnect value	
		echo '
<META http-equiv="refresh" content="0; URL=index.php"> <center> disconnection ERROR | transfer vers l\'acceuil en cours,Si la page d\'accueil ne se charge pas dans 3 secs cliquez <a href="index.php">ICI</a></center>';
	}}
?>