<?php
 
function show_userbox()
{
    // retrieve the session information
    $u = $_SESSION['login'];
    $uid = $_SESSION['password'];
    // display the user box
    echo "<div id='userbox'>
	 Welcome $u
		<ul>
		   <li><a href='./logout.php'>Logout</a></li>
		</ul>
             </div>";
 
}
?>