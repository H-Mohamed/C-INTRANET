<?php if(!isset($_COOKIE["U"]))
{
	//User not set
		echo ' 
<META http-equiv="refresh" content="3; URL=../Applicationsindex.php"> <center>Déconnection en cours,Si la page d\'accueil ne se charge pas dans 3 secs cliquez <a href="../Applications/index.php">ICI</a></center>';
      exit();
}else{
?>
<?php  if($_GET["disconnect"]==true){
	$connection=mysqli_connect('localhost', 'root', '', 'ccis_agenda'); 
	$u = $_GET["user"];
   mysqli_close($connection);  
   setcookie("U",$u, time() - 86400,'/ccis/'); 
   setcookie("T","", time() - 86400,'/ccis/');

   echo session_abort();
	//disconnect true
  		echo '
<META http-equiv="refresh" content="3; URL=../Applications/index.php"> <center>Déconnection de \'admin en cours,Si la page d\'accueil ne se charge pas dans 3 secs cliquez <a href="../Applications/">ICI</a></center>'; }
	else{
		//else disconnect value	
		echo '
<META http-equiv="refresh" content="3; URL=../Applications/index.php"> <center>Déconnection en cours,Si la page d\'accueil ne se charge pas dans 3 secs cliquez <a href="../Applications">ICI</a></center>';
	}}
?>