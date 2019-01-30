<!DOCTYPE html>
<?php 
if(!isset($_COOKIE["U"])){ 
?> 
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>Se Connecter | CCIS SM Intranet</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<script src="../Applications/js/jquery.js"></script>
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="css/animate.css">
	<style> 
	</style>
</head>

<body>
	<div class="container">

		<div class="login">
			<div class="login-heading animated rubberBand">
				<a href="index.php"><img src="img/logo.png"></a>
				<?php
				if (isset($_POST['Loginbtn']) )
				  {  
					$connection=mysqli_connect("localhost", "root", "", "ccis_users"); 
					//require_once ('function.inc.php');
					$u = strip_tags($_POST['login']);
					$p = strip_tags($_POST['password']);
					$t = strip_tags($_POST['select']); 
					if($t=="Administrateur"){
					$query = sprintf("SELECT user FROM admin WHERE username = '%s' and password ='%s'  LIMIT 1;",
					mysqli_real_escape_string($connection,$u), mysqli_real_escape_string( $connection,$p));
					$result = mysqli_query( $connection,$query);
						if (mysqli_num_rows($result) === 0)
						{ 
						echo "<div style='color:red;font-size:15px'> Attention - Mot de pass ou Nom d'utilisateur Erroné</div>";
						} else {
						// Login was successfull
							session_start(); 
							$_SESSION['username'] = $_POST['login'];
							$_SESSION['password'] = $_POST['password'];  
							// Save the username for later   
							setcookie("U",$u, time() + 86400,'/ccis/'); 
							setcookie("T",$t, time() + 86400,'/ccis/'); 

							header("Location:  /ccisgit/REPOCCIS/admin/index.php#dashboard"); 
						} 
					}
					else
					{
					$query = sprintf("SELECT LIBELLEDEPARTEMENT FROM departement WHERE LIBELLEDEPARTEMENT = '%s' and pass ='%s'  LIMIT 1;",
					mysqli_real_escape_string( $connection,$u), mysqli_real_escape_string( $connection,$p));
					$result = mysqli_query( $connection,$query); 
						if (mysqli_num_rows($result) === 0)
						{ 
							echo "<div style='color:red;font-size:15px'> Attention - Mot de pass ou Nom d'utilisateur Erroné</div>";
						} else {
						// Login was successfull
							session_start(); 
							$_SESSION['username'] = $_POST['login'];
							$_SESSION['password'] = $_POST['password'];  
							// Save the username for later     
							setcookie("U",$u, time() + 86400,'/ccis/'); 
						// Now we show the userbox  
								header('Location: /ccisgit/REPOCCIS/index.php'); 
						} 
					}
				}
				?>
			</div>
			<form method="POST" autocomplete="off" action="#">
				<select name="select" placeholder="Nom d'utilisateur" required="required" autofocus class="input" style='width:100%;display:block;border:0; ;'>
					<option value="Administrateur"> Administrateur </option>
					<option selected value="Utilisateur"> Utilisateur </option>
				</select>
				<div id='A'></div>
					<script>
					check();
					$("select:eq(0)").change(function () {
						check();
					}); 
					 function check() {  
						//script JS
						if ($("select:eq(0)").val() == 'Administrateur') {
							$("#A").html('<input type=\'text\' name=\'login\' placeholder=\'Username\' required class=\'input-txt\' style=\' ;\' /><input type=\'password\' name=\'password\'placeholder=\'Mot de pass\' required class = \'input-txt\' style=\' ;\' / > <div class = \'login-footer\' > <a href = \'#\' 	class=\'lnk\' > <span class = \'icon icon--min\' > </span>Mot de pas Oublié ?</a> <input type = \'submit\' class = \'btn btn--right animated\' 		name = \'Loginbtn\' onmouseover = \'function(){this.setAttribute(\'class\',\'btn btn--right animated bounce\')}\' value = \'Se Connecter\' > </div>');
						}
						else {
							        var xhttp=new XMLHttpRequest();
                                    xhttp.open("GET","ajax.php",false);
                                    xhttp.send(); 
									$("#A").html('<select name=\'login\' required class=\'input-txt\' style=\' ;\'> '+xhttp.responseText+'</select><input type=\'password\' name=\'password\'placeholder=\'Mot de pass\' required class = \'input-txt\' style=\' ;\' / > <div class = \'login-footer\' > <a href = \'#\' 	class=\'lnk\' > <span class = \'icon icon--min\' > </span>Mot de pas Oublié ?</a> <input type = \'submit\' class = \'btn btn--right animated\' 		name = \'Loginbtn\' onmouseover = \'function(){this.setAttribute(\'class\',\'btn btn--right animated bounce\')}\' value = \'Se Connecter\' > </div>');
						}
					}
				</script>
			</form>
		</div>
	</div>
	
	<script src="js/login.js"></script>

</body>

</html>
<?php }
			else header("Location: index.php"); ///http://localhost:8080/ccis/admin/ 

		?>