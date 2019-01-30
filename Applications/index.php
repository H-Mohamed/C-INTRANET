<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil - CCIS</title>
      <meta name="author" content="Stagiaires TDI 201 TASSILA Promotion 2016-2018(Mr. MOHAMED HARIR & Mr. MOHAMED AMINE DERRAGH)">
    <link rel="stylesheet" href="css/font-awesome.min.css">   
    <link rel="stylesheet" href='css/pure-css-select-style.css'>
    <link rel="stylesheet" href='css/home.css'> 
    <link rel="stylesheet" href="css/w3.css">
	<script src="js/jquery.js"></script>
</head>
<body class="show">
 <?php include("header.php")?> 
    <div style="" id="id01" class="w3-modal">
    <div style="height:300px; width:400px; border-radius:20px;" class="w3-modal-content w3-animate-zoom">
      <div class="w3-container"style="text-align:center; margin-top:50px; ">
        <span onclick="document.getElementById('id01').style.display='none'" style="font-size:20px;font-family:calibri;color:#D81A38;" id="close" class="w3-button w3-display-topright">&times;</span>
                <img style="margin-top:50px; " src="img/coming soon.png">
                <p style="font-size:23px;font-family:calibri;text-shadow: 0px 0px 1px #424242;"> Désolé, Page en Cours de Construction</p>
      </div>
    </div>
    </div> 
        <div class="row" style="margin-top:3%;">
            <div class="SApp hvr-underline-from-left" style='background: #3387ea'> 
                
                <a href="Agenda">
                    <div class='icon animate pulse'>
                          <i class="fa fa-calendar" aria-hidden="true"></i>
                    </div>
                    <div class="title">                     Agenda                
                    </div>
                </a>
            </div>
            <div class="SApp hvr-underline-from-left" style='background: #f9be3e'> 
                   <a href="Bibliotheque">   <div class='icon'>
                          <i class="fa fa-book" aria-label="kkszdkopqzpd"></i>
                    </div>
                    <div class="title">                     Bibliothèque   
                </div>
                </a>
            </div>
            <div class="LApp hvr-underline-from-left" style='background: #d3583e'> 
                      <a href="#" onclick="document.getElementById('id01').style.display='block'"><div class='icon'>
                          <i class="fa fa-file-text" aria-hidden="true"></i>
                    </div>
                    <div class="title">                    PV & Rapports des Réunions               
                                        </div>
                </a>
             </div>
            <div class="SApp hvr-underline-from-left" style='background: #59b0e2'> 
                     <a href="#" onclick="document.getElementById('id01').style.display='block'">   <div class='icon'>
                          <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                    <div class="title">                     Visiteurs               
                         </div></a>
            </div>
            <div class="SApp hvr-underline-from-left" style='background: #32af95'> 
                        <a href="#" onclick="document.getElementById('id01').style.display='block'"><div class='icon'>
                          <i class="fa fa-bell-o" aria-hidden="true"></i>
                    </div>
                    <div class="title">                     Revu Hebdo                
                            </div></a>
            </div>
        </div>
        <div class="row">

            <div class="LApp hvr-underline-from-left" style='background: #86a73f;margin: 0 4px 0 0;'> 
                      <a href="#" onclick="document.getElementById('id01').style.display='block'"><div class='icon'>
                        <i class="fa "> <img width='76px' src="img/chair.png" style="margin-bottom: -32px"> </i>
                    </div>
                    <div class="title">                     Occupation des Salles                
                          </div> </a>   
            </div>
            <div class="XApp hvr-underline-from-left" style='background: #20283c ;margin: 4px 0 0;'> 
                       <a href="#" onclick="document.getElementById('id01').style.display='block'"> <div class='icon'>
                          <i class="fa fa-map" aria-hidden="true"></i>
                    </div>
                    <div class="title">                     Bulletin d'Informations                
                           </div></a>
            </div>
            <div class="SApp hvr-underline-from-left" style='background: #7e5b8c;padding-top: 40px!important;height: 200px!important;'> 
                        <a href="#" onclick="document.getElementById('id01').style.display='block'" ><div class='icon' style='background: #7e5b8c;margin-top: -40px!important'>
                          <i class="fa fa-envelope" aria-hidden="true"></i>
                    </div>
                    <div class="title">                     Courriels                
                            </div></a>
            </div>
        </div>
        <br>
   
        <br>
    <footer style='position:fixed!important;bottom:0!important;'>
        <div>
            <span>  CCIS SM Internet
            </span>
            <span> Conditions Génerales
            </span>
            <span> Agenda
            </span> 
    </div>
        <img src="img/logo_Buttom.png" >
        <div><span> Sous-Iktisad
            </span>
            <span> Centre d'aide
            </span>
            <span><a href="ContactUs"> Contacter-Nous</a>
            </span> 
        </div>
    </footer>
    

	
<script>
if (window.innerWidth<= 1300) 
				document.querySelector('#Connecter div:first-of-type').style.width = '700px'; 
	else
				document.querySelector('#Connecter div:first-of-type').style.width = '800px';
</script></body>
</html>