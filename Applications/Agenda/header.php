<?php 
if(isset($_COOKIE["U"])){ 
?> 
<header> 
       <div id="TopBar">
           <a href="../index.php"><img src="../img/logo.png"></a>
        <div id="Connecter">
    <div id='user' >
    <?php
    echo $_COOKIE["U"];
    ?>    
</div>
    <a href="../logout.php?user=<?php echo $_COOKIE["U"]; ?>&disconnect=true" style='font-size:14pt;color: #d81a38;font-family:Calibri;font-weight:500;'>Se déconnecter</a>
</div>

</div> 
		 <div id="Actualite"><div><i class="fa fa-newspaper-o"></i></div><a href="../Agenda/">Agenda</a> 
        <marquee direction="right" scrollamount='2.5px'  truespeed='1356' onmouseover="this.stop();" onmouseout="this.start();">
 
<?php
       $con = mysqli_connect("localhost","root","","ccis_agenda") ;
       $queryUTF="set names 'utf8'"; 
       mysqli_query($con,$queryUTF) or die(mysqli_error()."[".$queryUTF."]");
	//recuperer 10 evenements à venir  
       $queryEvents = "SELECT * FROM evenement WHERE evenement.DATEFINEV > (CURDATE() - 1)";
	$resultEvents = mysqli_query($con,$queryEvents) or die(mysqli_error($con));
	  while ($row = mysqli_fetch_assoc($resultEvents))
		{        
               $tab='&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a style="text-decoration:none;font-weight:bolder" href="event.php?numeroE='.$row['IDEVENEMENT'].'"><span style="color:snow">'.
			   $row['TITREEVENEMENT']
			   .' le '.
			   $row['DATEDEBUTEV']
			  .' à '.
			   $row['LIBELLEVILLE']
			   .' </span></a>';
                 echo $tab;
		}
       echo '&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;';
	     
     ?> 
            </marquee>
        </div>
    </header>
<?php  }else{ ?>
 <header>
	 		<div id="TopBar"><a href="../index.php"><img src="../img/logo.png"></a><a href="../login.php"><div id="Connecter">SE CONNECTER</div></a></div>
        <div id="Actualite"><div><i class="fa fa-newspaper-o"></i></div><a href='../Agenda/'>Agenda</a> 
        <marquee direction="right" scrollamount='3px'  truespeed='136' onmouseover="this.stop();" onmouseout="this.start();">
 
<?php
       $con = mysqli_connect("localhost","root","","ccis_agenda") ;
       $queryUTF="set names 'utf8'"; 
       mysqli_query($con,$queryUTF) or die(mysqli_error()."[".$queryUTF."]");
	//recuperer 10 evenements à venir  
       $queryEvents = "SELECT * FROM evenement WHERE evenement.DATEFINEV > (CURDATE() - 1)";
	$resultEvents = mysqli_query($con,$queryEvents) or die(mysqli_error());
        
	  while ($row = mysqli_fetch_assoc($resultEvents))
		{        
                        $tab='&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a style="text-decoration:none;font-weight:bolder" href="event.php?numeroE='.$row['IDEVENEMENT'].'"><span style="color:snow">'.
			   $row['TITREEVENEMENT']
			   .' le '.
			   $row['DATEDEBUTEV']
			  .' à '.
			   $row['LIBELLEVILLE']
			   .' </span></a>';
                 echo $tab;
		}
	     
     ?> 
            </marquee>
        </div>
    </header>
<?php }?>