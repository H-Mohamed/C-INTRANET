
<?php
$connection=mysqli_connect("localhost27", "root", "", "valium"); 
require_once ('function.inc.php');
 if (isset($_POST['login']) && isset($_POST['password']))
 {
		$_SESSION['login'] = $_POST['login'];
	    $_SESSION['password'] = $_POST['password'];
		if ($_SESSION['password'] && $_SESSION['login'] )
			{
			// user is not logged in.
			if (isset($_POST['Loginbtn']))
			{
				// retrieve the username and password sent from login form
				// First we remove all HTML-tags and PHP-tags, then we create a md5-hash
				// This step will make sure the script is not vurnable to sql injections.
				$u = strip_tags($_POST['login']);
				$p = md5(strip_tags($_POST['password']));
				
				//Now let us look for the user in the database.
				$query = sprintf("SELECT username FROM user WHERE username = '%s' AND password = '%s' LIMIT 1;",
					mysqli_real_escape_string( $connection,$u), mysqli_real_escape_string( $connection,$p));
				$result = mysqli_query( $connection,$query);
				// If the database returns a 0 as result we know the login information is incorrect.
				// If the database returns a 1 as result we know  the login was correct and we proceed.
				// If the database returns a result > 1 there are multple users
				// with the same username and password, so the login will fail.
				if (mysqli_num_rows($result) != 1)
				{
					// invalid login information
					echo "<center><p class='animated flash' style='margin:0 0 0 0;box-shadow: inset 0px 40px 5px red;padding:5px 13px 5px 13px;color:white'>Email ou Mot de pass Incorrect ! Merci de réessayer</p></center>";
					//show the loginform again.
					include "fonctionlogin.php";
					$_SESSION['username']='';
				} else {
					session_start();
					// Login was successfull
					$row = mysqli_fetch_array($result); 
					  // Save the username for use later
					  $query = sprintf("SELECT first_name FROM users WHERE username = '%s' AND password = '%s' LIMIT 1;",
					mysqli_real_escape_string( $connection,$u), mysqli_real_escape_string( $connection,$p));
				$result = mysqli_query( $connection,$query);
					$row = mysqli_fetch_array($result);
					$_SESSION['username'] = $row['first_name'];
					  // Now we show the userbox
					  if($_SESSION['username']==='atlas.emirat'){
					  
					  header("Location: http://localhost27/admin/production/index3.html");
							}
					  else{
						 echo $_SESSION['username'];
						 include "loggedin.php";
					   
					  }
				}
		 
			}
							else if ($_SESSION['username']!=''){
								echo $_SESSION['username'];
session_start();
								include "loggedin.php";
								
							}
			else {
				 // User is not logged in and has not pressed the login button
				 // so we show him the loginform
				echo"<!DOCTYPE HTML>
<html lang='en-EN' class='animated'>
    <head>
        <title> Mon shop</title>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='page.css'>
        <link rel='stylesheet' href='animate.css'>
        <link href='https://fonts.googleapis.com/css?family=Lovers+Quarrel|Merienda' rel='stylesheet'>
      </head>
    <body>
             
             ";
        include 'headernavtop.php';
								echo"
<center>
<div class='e'  style='padding: 22px 0px 20px 0px; height: 400px;display: inline-block'>

<div class='leselments animated jackInTheBox' style='padding-bottom: 10%;padding-left: 10%;margin-top:-20px!important;width:300px;margin-top: -20px!important'>  
  
 <img id='lock' width='100px'  style='margin-top: -200px;display: block'src='images/user-icon' alt=''> 
 
		<form action='inscription.php'  method='GET'  > 
		<div> 
		<label for='login' class='label'> Email</label><br>
		<input  style='height: 40px;border-radius: 15em;'	 placeholder='Exemple: mohamed@site.com' required='yes' type='email' name='login'>
       <br>
        <br> 
		<center>
         <input  class='btn' type='submit' value='s'inscrire' name='inscription' style='font-size:15px;margin-bottom: 1%;display: inline;color: gray'></center>
         </div>
        
    </form> 
</div> 
<div class='leselments  animated jackInTheBox' style='border-left:1px solid #DDD;padding-top:0;padding-left: 14%;padding-right: 4%;width:500px;margin:0px auto 0 20%;'> 
 <!--img  width='200px'  style='display: block'src='images/footer_info_cadenat.png' alt=''-->

 <img id='lock' width='100px'  style='display: block'src='images/key.png' alt=''>
		<form action='login.php'style='align-self:center;' method='POST'  >
        
		<div>
		<label for='login' class='label'> Nom D'Utilisateur</label><br>
		<input  style='height: 40px;width: 100%;border-radius: 15em;'	 placeholder='Exemple: User Name' required='yes' type='text' name='login'>
       <br> 
        <label for='password' class='label'>  Mot de Pass</label><br>
        <input style='height: 40px;width: 100%;border-radius: 15em;'  placeholder='••••••••••••••' required='yes' type='password' name='password'>
         <br>
		<center>
        <input class='btn' type='submit' value='s'authentifier' name='Loginbtn' style='font-size:15px;margin-bottom: 1%; display: inline;'>
         </div>
        
    </form> 
</div>
</div>
     </center>
		 <nav class='nav-down'>
<div style='float: right!important;margin-top:-30px;padding-right: 30px' >
  <a style='padding: 0' href='#'>
  <div  dir='#' class=' nav-icon'>
   <img class='animate jello' style='height: auto;width:70px;' src='images/top.png'>
  </div> </a>
</div>
<div style='float: left!important;margin-top:-14px;padding-left: 10px' >
  <a style='padding: 0' href='#'>
  <div  dir='#' class=' nav-icon'>
   <img class='animate jello' style='height: auto;width:40px;' src='images/twitter-icon.png'>
  </div> </a>
</div>
<div  style='float: left!important;margin-top:-14px;margin-left: -3px' >
  <a style='padding: 0' href='#'>
  <div  dir='#' class=' nav-icon'>
   <img class='animate jello' style='height: auto;width:40px;' src='images/instagram-icon.png'>
  </div> </a>
</div>
<div  style='float: left!important;margin-top:-14px;margin-left: -3px' >
  <a style='padding: 0' href='#'>
  <div  dir='#' class=' nav-icon'>
   <img class='animate jello' style='height: auto;width:40px;' src='images/facebook.png'>
  </div> </a>
</div>
        <div class='table'>
         <ul> 
            <li class='menu-ind'>
                <a href='about.php'>A propos</a>
            </li>
            <li class='menu-ind'>
                <a href='about.php'>politique de confidentialité</a>
            </li>
             
         </ul>
        </div>
       </nav>
  
       <footer style='display: inline-block ;background-color: rgba(52, 73, 94,0)'>
         
            <div style='width:80%;display: inline-block ;float: left!important;margin-top:4px' >
  <a style='padding-right: 5px' href='#'>
    <img style='height: auto;width:100%;' src='images/visa.png'>
   </a>
</div>
            <a href='index.php'><img   height='80px' style='float:right;background-color: rgba(52, 73, 94,0);margin-top: -20px' src='images/madewithlove.png'>
        </a>
             
  
       </footer>
    </body>
</html>
";  
			}
	 
		}
	}
	else
	{
	 echo "
<center><p class='animated flash' style='margin:0 0 0 0;box-shadow: inset 0px 40px 5px red;padding:5px 13px 5px 13px;color:white'>Veuillez saisir vos indetifiants</p></center>
		<!DOCTYPE HTML>
<html lang='en-EN' class='animated'>
    <head>
        <title> Mon shop</title>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='page.css'>
        <link rel='stylesheet' href='animate.css'>
        <link href='https://fonts.googleapis.com/css?family=Lovers+Quarrel|Merienda' rel='stylesheet'>
      </head>
    <body>
             ";
        include 'headernavtop.php';
								echo"
<center>
<div class='e'  style='padding: 22px 0px 20px 0px; height: 400px;display: inline-block'>

<div class='leselments animated jackInTheBox' style='padding-bottom: 10%;padding-left: 10%;margin-top:-20px!important;width:300px;margin-top: -20px!important'>  
  
 <img id='lock' width='100px'  style='margin-top: -200px;display: block'src='images/user-icon' alt=''> 
 
		<form action='inscription.php'  method='GET'  > 
		<div> 
		<label for='login' class='label'> Email</label><br>
		<input  style='height: 40px;border-radius: 15em;'	 placeholder='Exemple: mohamed@site.com' required='yes' type='email' name='login'>
       <br>
        <br> 
		<center>
         <input  class='btn' type='submit' value='s'inscrire' name='inscription' style='font-size:15px;margin-bottom: 1%;display: inline;color: gray'></center>
         </div>
        
    </form> 
</div> 
<div class='leselments  animated jackInTheBox' style='border-left:1px solid #DDD;padding-top:0;padding-left: 14%;padding-right: 4%;width:500px;margin:0px auto 0 20%;'> 
 <!--img  width='200px'  style='display: block'src='images/footer_info_cadenat.png' alt=''-->

 <img id='lock' width='100px'  style='display: block'src='images/key.png' alt=''>
		<form action='login.php'style='align-self:center;' method='POST'  >
        
		<div>
		<label for='login' class='label'> Nom D'Utilisateur</label><br>
		<input  style='height: 40px;width: 100%;border-radius: 15em;'	 placeholder='Exemple: User Name' required='yes' type='text' name='login'>
       <br> 
        <label for='password' class='label'>  Mot de Pass</label><br>
        <input style='height: 40px;width: 100%;border-radius: 15em;'  placeholder='••••••••••••••' required='yes' type='password' name='password'>
         <br>
		<center>
        <input class='btn' type='submit' value='s'authentifier' name='Loginbtn' style='font-size:15px;margin-bottom: 1%; display: inline;'>
         </div>
        
    </form> 
</div>
</div>
     </center>
		 <nav class='nav-down'>
<div style='float: right!important;margin-top:-30px;padding-right: 30px' >
  <a style='padding: 0' href='#'>
  <div  dir='#' class=' nav-icon'>
   <img class='animate jello' style='height: auto;width:70px;' src='images/top.png'>
  </div> </a>
</div>
<div style='float: left!important;margin-top:-14px;padding-left: 10px' >
  <a style='padding: 0' href='#'>
  <div  dir='#' class=' nav-icon'>
   <img class='animate jello' style='height: auto;width:40px;' src='images/twitter-icon.png'>
  </div> </a>
</div>
<div  style='float: left!important;margin-top:-14px;margin-left: -3px' >
  <a style='padding: 0' href='#'>
  <div  dir='#' class=' nav-icon'>
   <img class='animate jello' style='height: auto;width:40px;' src='images/instagram-icon.png'>
  </div> </a>
</div>
<div  style='float: left!important;margin-top:-14px;margin-left: -3px' >
  <a style='padding: 0' href='#'>
  <div  dir='#' class=' nav-icon'>
   <img class='animate jello' style='height: auto;width:40px;' src='images/facebook.png'>
  </div> </a>
</div>
        <div class='table'>
         <ul> 
            <li class='menu-ind'>
                <a href='about.php'>A propos</a>
            </li>
            <li class='menu-ind'>
                <a href='about.php'>politique de confidentialité</a>
            </li>
             
         </ul>
        </div>
       </nav>
  
       <footer style='display: inline-block ;background-color: rgba(52, 73, 94,0)'>
         
            <div style='width:80%;display: inline-block ;float: left!important;margin-top:4px' >
  <a style='padding-right: 5px' href='#'>
    <img style='height: auto;width:100%;' src='images/visa.png'>
   </a>
</div>
            <a href='index.php'><img   height='80px' style='float:right;background-color: rgba(52, 73, 94,0);margin-top: -20px' src='images/madewithlove.png'>
        </a>
             
  
       </footer>
    </body>
</html>
"; 
}
?>
