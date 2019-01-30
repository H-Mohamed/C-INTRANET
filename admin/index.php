

<!DOCTYPE html>
<html lang="en">
   <?php
      if(!isset($_COOKIE["U"])|| !isset($_COOKIE["T"]) )
      {
      	header("Location: ../Applications/login.php");
      }
      ?>
   <head>
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
      <tag autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"/>
      <title>Document</title>
      <style>
        .alert-success{
          color: #155724;
          background-color: #d4edda;
          border-color: #c3e6cb;
          padding: 12px;
          margin: 20px;
        }
        .alert-danger{
          color: #721c24;
          background-color: #f8d7da;
          border-color: #f5c6cb;
          padding: 12px;
          margin: 20px;
        }
        .alert-warning{
          color: #856404;
          background-color: #fff3cd;
          border-color: #ffeeba;
          padding: 12px;
          margin: 20px;
        }
         html{	height: 100%;}
         body {
         padding: 0;
         margin: 0;
         font-size: 16px;
         font-family: sans-serif;
         height: 100%;
         }
         .clearfix:after {
         content: "";
         display: block;
         height: 0;
         width: 0;
         clear: both;
         }
         .admin-panel {
         width: 100%;
         height: 100%;
         }
         .slidebar {
         width: 15%;
         height: 100% !important;
         float: left;
         border-right: 1px solid rgb(235,235,235);
         background-color: rgb(255, 255, 255);
         }
         .slidebar .logo {
         margin-top: 20px;
         border-bottom: 1px solid rgb(235,235,235);
         }
         .slidebar .logo h3{
         margin-bottom: 30px;
         }
         .slidebar ul {
         padding: 0;
         margin:0;
         display: block;
         background-color: rgb(255, 255, 255);
         }
         .slidebar li {
         list-style-type: none;
         margin: 0;
         position: relative;
         }
         .slidebar ul a {
         color: rgb(140,140,140);
         text-decoration: none;
         font:16px/40px helvetica,verdana,sans-serif;
         box-sizing:border-box;
         border-bottom: 1px solid rgb(235,235,235);
         display: block;
         box-shadow:inset 0 1px 0 rgb(255,255,255);
         text-indent:7px;
         width: 200px;
         text-transform: capitalize;
         }
         .slidebar ul a i{
         font-size:25px; margin-right:14px;
         color: rgb(29, 29, 29);
         }
         .slidebar ul li:hover a{
         background-color: rgb(255,255,255);
         box-shadow: 1px 0 0 rgb(255,255,255),inset 5px 0 0 -1px #1976D2;
         }
         .slidebar ul li:hover ul {
         display:block;
         }
         /*main*/
         .main {
         float: left;
         width: 84.9%;
         height: 100%;
         background-color: #F9F9F9;
         position: relative;
         font-family: helvetica,verdana,sans-serif;
         }
         .main .topbar {
         border-bottom: 1px solid rgb(235,235,235);
         margin: 0;
         padding: 0;
         background-color: #1976D2;
         }
         /*topbar顶部按钮栏*/
         .topbar li:last-child {
         float: right;
         list-style: none;
         }
         .topbar li {float: left;list-style: none;}
         .topbar a {
         font-family: helvetica,verdana,sans-serif;
         display: inline-block;
         line-height: 50px;
         width:152px;
         text-align: center;
         text-decoration: none;
         color: white;
         }
         .topbar a:hover {
         background-color: rgb(42, 128, 209);
         }
         .topbar li:first-child a {
         border: none;
         width: 50px;
         }
         /*mainContent*/
         .mainContent{
         }
         .mainContent h4 {
         line-height: 1;
         font-size: 18px;
         margin: 1.3em 0 1em;
         margin-left: 17px;
         }
         .mainContent>div {
         background-position:top center;
         background-repeat: no-repeat;
         background-size: 350px 90px;
         padding-top:50px;
         display: none;
         position: absolute;
         opacity: 0;
         -webkit-transition:opacity 200ms linear;
         -moz-transition:opacity 200ms linear;
         -ms-transition:opacity 200ms linear;
         transition:opacity 200ms linear;
         width: 79%;
         }
         /*通过opacity来切换不同的选项卡*/
         .mainContent>div:target {
         opacity: 1;
         display: block;
         }
         .mainContent h2 {
         margin:1em 30px;
         color: rgb(93, 93, 93);
         font-size: 20px;
         }
         .mainContent h2:before {
         font-family: 'icomoon';
         content: attr(data-icon);
         font-weight: normal;
         font-variant: normal;
         text-transform: none;
         line-height: 1;
         margin-right: 10px;
         -webkit-font-smoothing: antialiased;
         }
         #dashboard,#agenda,#Agenda_Gerer{
         width: 100%;
         background-color: #F9F9F9;
         padding: 40px 0 40px 0;
         }
         #dashboard >div ,#agenda > div, #Agenda_Gerer >div{
         border: 1px solid rgb(235,235,235);
         margin-left: 30px;
         float: left;
         border-radius: 5px;
         min-width: 345px;
         height: 262px;
         display: inline-block;
         margin-bottom:40px;
         }
         #agenda > div:first-of-type ,#Agenda_Gerer> div{
         border: 1px solid rgb(216, 216, 216);
         background-color: white;
         padding: 0px;
         min-width: 95%;
         max-height: 345px;
         height: 100%;
         overflow-y: scroll;
         -webkit-box-shadow: 1px 1px 2px 0px rgba(0,0,0,0.2);
         -moz-box-shadow: 1px 1px 2px 0px rgba(0,0,0,0.2);
         box-shadow: 1px 1px 2px 0px rgba(0,0,0,0.2);
         }
         #Agenda_Ajouter,#Agenda_Modifier{
         background-color: white;
         width: 100%;
         height: 100%;
         }
         #Agenda_Ajouter > form table input[type="text"],#Agenda_Modifier> form table input[type="text"]{
         background-color: gray;
         width: 300px;
         box-shadow: 0px 0px 3px 0 rgba(0, 0, 0, 0.308);
         color: #a3a3a3;
         background-color: rgb(255, 255, 255);
         height: 40px;
         }
         #Agenda_Ajouter > form table  select,#Agenda_Ajouter > form table input,#Agenda_Modifier > form table  select,#Agenda_Modifier > form table input{
         box-shadow: 0px 0px 3px 0 rgba(0, 0, 0, 0.308);
         color: #a3a3a3;
         border: 0px solid black;
         height: 40px;
         width: 300px;
         margin-left:30px;
         }
         select:-moz-focusring {
         color: transparent!important;
         text-shadow: 0 0 0 #000!important;
         }
         #Agenda_Ajouter > form table  select,#Agenda_Modifier > form table  select{
         appearance:none;
         -moz-appearance:none; /* Firefox */
         -webkit-appearance:none; /* Safari and Chrome */
         background-image:
         linear-gradient(45deg, transparent 50%, gray 50%),
         linear-gradient(135deg, gray 50%, transparent 50%),
         linear-gradient(to right, #ccc, #ccc);
         background-position:
         calc(100% - 20px) calc(1em + 5px),
         calc(100% - 15px) calc(1em + 5px),
         calc(100% - 2.5em) 0.77em;
         background-size:
         5px 5px,
         5px 5px,
         1px 1.5em;
         background-repeat: no-repeat;
         }
         #Agenda_Ajouter > form table  select:hover,#Agenda_Ajouter > form table input[type="date"]:hover,#Agenda_Ajouter > form table input[type="checkbox"]:hover,#Agenda_Ajouter > form table input[type="time"]:hover{
         cursor: pointer;
         }
         #Agenda_Ajouter > form table input:focus,#Agenda_Ajouter > form table  select:focus{
         box-shadow: 0px 0px 5px 0 rgba(25, 121, 210, 0.719);
         }
         #Agenda_Ajouter > form table{
         width: 90%;
         margin: auto;
         margin-top:10px;
         }
         #Agenda_Ajouter > form table td:first-of-type{
         width: 150px;
         }

         #Agenda_Modifier > form table  select:hover,#Agenda_Modifier > form table input[type="date"]:hover,#Agenda_Modifier > form table input[type="checkbox"]:hover,#Agenda_Modifier > form table input[type="time"]:hover{
         cursor: pointer;
         }
         #Agenda_Modifier > form table input:focus,#Agenda_Modifier > form table  select:focus{
         box-shadow: 0px 0px 5px 0 rgba(25, 121, 210, 0.719);
         }
         #Agenda_Modifier > form table{
         width: 90%;
         margin: auto;
         margin-top:10px;
         }
         #Agenda_Modifier > form table td:first-of-type{
         width: 150px;
         }
         #agenda table,#Agenda_Gerer table{
         width: 100%;
         height:auto;
         }
         #agenda table td,#Agenda_Gerer table td{
         text-align: center;
         color: black;
         }
         #agenda table th,#Agenda_Gerer table th{
         width:calc(100%/8);
         padding: 6px 13px;
         background: rgba(25, 121, 210, 0.822);
         color: white;
         font-weight: bold;
         }
         #agenda tr:nth-child(even),#Agenda_Gerer tr:nth-child(even)
         {
         background:  rgba(230, 230, 230, 0.349);
         }
         #agenda th + th,#Agenda_Gerer th +th{
         border-left:1px solid rgb(190, 180, 180); 
         }
         #agenda td + td,#Agenda_Gerer td + td{
         border-left:1px solid #D6D6D6;
         }
         .monitor ul {
         float: left;
         padding: 0;
         margin: 0 31px 0 17px;
         }
         .monitor li {
         list-style:none;
         font: 600 14px/28px helvetica,verdana,sans-serif;
         color: rgb(102,102,102);
         text-transform: capitalize;
         }
         .monitor li a {
         color: rgb(102,102,102);
         text-transform: capitalize;
         text-decoration: none;
         }
         .monitor li:first-child {
         border-bottom: 1px dotted rgb(153,153,153);
         }
         .discussions .comments {color: rgb(27,106,173);}
         .discussions .approved {color: rgb(105,174,48);}
         .discussions .pending {color: rgb(246,129,15);}
         .discussions .spam {color: rgb(243,47,47);}
         .monitor .count {
         color: rgb(27,106,173);
         text-align: right;
         font-weight: 600;
         margin-right: 15px;
         min-width: 25px;
         display: inline-block;
         }
         .monitor p {
         color: rgb(128,128,128);
         margin: 28px 0 18px 17px;
         display: block;
         font-weight: 600;
         font-size: 12px;
         }
         .monitor p a {
         text-decoration: none;
         color:rgb(27,106,173);
         }
         input,select {
         width: 95.4%;
         margin: auto;
         -moz-box-sizing:border-box;
         box-sizing:border-box;
         height: 35px;
         line-height: 15px;
         padding: 10px 0;
         margin-left: 30px;
         margin-bottom: 1px!important;
         background-color: rgb(255, 255, 255);
         border-radius: 5px;
         outline: none;
         border: none;
         text-indent: 10px;
         }
         /*统一各浏览器下placeholder内的字体样式*/
         .quick-press input[type="text"]::-webkit-input-placeholder {font-size: 14px;}
         .quick-press input[type="text"]:-moz-input-placeholder {font-size: 14px;}
         .quick-press input[type="text"]::-moz-input-placeholder {font-size: 14px;}
         .quick-press input[type="text"]:-ms-input-placeholder {font-size: 14px;}
         .quick-press button {
         margin-top: 13px;
         border-radius: 5px;
         text-align: center;
         line-height: 30px;
         padding: 0;
         }
         .quick-press .save, .quick-press .delet {
         font-family: 'icomoon';
         width: 37px;
         background: -webkit-linear-gradient(top,rgb(246,246,240),rgb(232,232,232));
         background: -moz-linear-gradient(top,rgb(246,246,240),rgb(232,232,232));
         background: -ms-linear-gradient(top,rgb(246,246,240),rgb(232,232,232));
         background: linear-gradient(top,rgb(246,246,240),rgb(232,232,232));
         border: 1px solid rgb(229,229,229); 
         color: rgb(102,102,102); 
         float: left;
         margin-right: 5px;
         }
         .quick-press .save:hover, .quick-press .delet:hover {
         background: -webkit-linear-gradient(top,rgb(232,232,232),rgb(246,246,240));
         background: -moz-linear-gradient(top,rgb(232,232,232),rgb(246,246,240));
         background: -ms-linear-gradient(top,rgb(232,232,232),rgb(246,246,240));
         background: linear-gradient(top,rgb(232,232,232),rgb(246,246,240));
         }
         .quick-press .save:active, .quick-press .delet:active {
         background: -webkit-linear-gradient(top,rgb(228,228,228),rgb(210,210,210));
         background: -moz-linear-gradient(top,rgb(228,228,228),rgb(210,210,210));
         background: -ms-linear-gradient(top,rgb(228,228,228),rgb(210,210,210));
         background: linear-gradient(top,rgb(228,228,228),rgb(210,210,210));
         }
         .quick-press .submit {
         float: right;
         width: 70px;
         border: 1px solid rgb(238,85,64);
         color: #fff;
         font-size: 16px;
         background: -webkit-linear-gradient(top,rgb(245,101,82),rgb(234,83,63));
         background: -moz-linear-gradient(top,rgb(245,101,82),rgb(234,83,63));
         background: -ms-linear-gradient(top,rgb(245,101,82),rgb(234,83,63));
         background: linear-gradient(top,rgb(245,101,82),rgb(234,83,63));
         }
         .quick-press .submit:hover {
         background: -webkit-linear-gradient(top,rgb(220,85,70),rgb(210,65,53));
         background: -moz-linear-gradient(top,rgb(220,85,70),rgb(210,65,53));
         background: -ms-linear-gradient(top,rgb(220,85,70),rgb(210,65,53));
         background: linear-gradient(top,rgb(220,85,70),rgb(210,65,53));
         }
         /*logo*/
         /*statusbar底部功能按钮*/
         .statusbar {
         position: fixed;
         bottom: 0;
         border-top: 1px solid rgb(235,235,235);
         width: 100%;
         height: 40px;;
         padding: 0;
         background-color: white;
         margin: 0;
         }
         .statusbar li {
         list-style: none;
         line-height: 40px;
         }
         .statusbar a {
         color: rgb(102,102,102);
         text-decoration: none;
         text-align: center;
         display: block;
         }
         .statusbar a:hover {
         background-color: rgb(247,247,247);
         }
         .statusbar .profiles-setting, .statusbar .logout {
         float: right;
         }
         .statusbar .profiles-setting a, .statusbar .logout a {
         font-family: 'icomoon';
         width: 49px;
         height: 49px;
         line-height: 50px;
         border-left: 1px solid rgb(235,235,235);
         }
         @font-face {
         font-family: 'icomoon';
         src:url('fonts/icomoon.eot');
         src:url('fonts/icomoon.eot?#iefix') format('embedded-opentype'),
         url('fonts/icomoon.woff') format('woff'),
         url('fonts/icomoon.ttf') format('truetype'),
         url('fonts/icomoon.svg#icomoon') format('svg');
         font-weight: normal;
         font-style: normal;
         }
         #agenda table,#Agenda_Gerer table{
         padding: 5px;
         }
         .slidebar ul li ul{
         width:90px;margin-left:55px;
         display: none;
         }
         .slidebar ul li ul li {
         margin:2px;
         }
         .slidebar ul li ul li a{
         font-size:16px; height:30px; line-height:30px; border:0px solid black; 
         box-shadow: 0px 0 0 rgb(255,255,255),inset 0px 0 0 0px rgba(26, 26, 26, 0.829)!important;
         color: rgb(136, 136, 136);
         }
         /*logo*/
         .logo a {
         width: 88px;
         height: 88px;
         display: inline-block;
         position: relative;
         left: 50%;
         top: 50%;
         margin: 5px 0 15px -45px;
         border: 1px solid rgb(200, 200, 200);
         border-radius: 50%;
         background-color: rgb(214, 214, 214);
         }
         .logo a:before {
          color: #1976D2;
         content: "A";
         width: 70px;
         height: 70px;
         font: 50px/70px helvetica, verdana, sans-serif;
         text-align: center;
         position: absolute;
         top: 8px;
         left: 8px;
         border-radius: 35px;
         border: 1px solid rgb(210, 210, 210);
         display: inline-block;
         background: -webkit-linear-gradient(top, rgb(255, 255, 255), rgb(245, 245, 245));
         background: -moz-linear-gradient(top, rgb(255, 255, 255), rgb(245, 245, 245));
         background: -ms-linear-gradient(top, rgb(255, 255, 255), rgb(245, 245, 245));
         background: linear-gradient(top, rgb(255, 255, 255), rgb(245, 245, 245));
         }
      </style>
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <script src="js/jquery321.js"></script>
   </head>
   <body>
      <?php
         $con = mysqli_connect("localhost","root","","ccis_agenda") ;
         // Check connection
         if (mysqli_connect_errno())
           {
           echo "Failed to connect to MySQL: " . mysqli_connect_error();
           }
           
           $queryUTF="set names 'utf8'";
           mysqli_query($con,$queryUTF) or die(mysqli_error()."[".$queryUTF."]"); 
         $queryEv = "SELECT * FROM evenement";
         $resultEv = mysqli_query($con,$queryEv) or die(mysqli_error()."[".$queryEv."]");

         $queryVille = "SELECT * FROM ville";
         $resultVille = mysqli_query($con,$queryVille) or die(mysqli_error()."[".$queryVille."]");
         $resultVille2 = mysqli_query($con,$queryVille) or die(mysqli_error()."[".$queryVille."]");
         $resultV = mysqli_query($con,$queryVille) or die(mysqli_error()."[".$queryVille."]");

         $queryLieu = "SELECT * FROM lieu  ORDER BY `lieu`.`LIBELLEVILLE` ASC";
         $resultLieu = mysqli_query($con,$queryLieu) or die(mysqli_error()."[".$queryLieu."]");
         $resultLieu3 = mysqli_query($con,$queryLieu) or die(mysqli_error()."[".$queryLieu."]");

         $queryNat = "SELECT * FROM nature_evenement";
         $resultNat = mysqli_query($con,$queryNat) or die(mysqli_error()."[".$queryNat."]");
         $resultNa2 = mysqli_query($con,$queryNat) or die(mysqli_error()."[".$queryNat."]");

         $queryDep = "SELECT LIBELLEDEPARTEMENT FROM departement";
         $resultDep = mysqli_query($con,$queryDep) or die(mysqli_error()."[".$queryDep."]");
         $queryDep2 = "SELECT * FROM departement";
         $resultDep2 = mysqli_query($con,$queryDep2) or die(mysqli_error()."[".$queryDep2."]");
         
         $queryEmp = "SELECT * FROM employe";
         $resultEmp = mysqli_query($con,$queryEmp) or die(mysqli_error()."[".$queryEmp."]");
         $resultEmp2 = mysqli_query($con,$queryEmp) or die(mysqli_error()."[".$queryEmp."]");
         $resultPart = mysqli_query($con,$queryEmp) or die(mysqli_error()."[".$queryEmp."]");
         $resultPar2 = mysqli_query($con,$queryEmp) or die(mysqli_error()."[".$queryEmp."]");

         ?>
      <script>
         var lieuJson =  new Array();
        
         function chargementLieu(v){
         	var lieu_select=document.querySelectorAll(".lieu");
           for(j=0;j<lieu_select.length;j++){
         	lieu_select[j].innerHTML="";}
         	for(i=0;i<lieuJson.length;i++){
         		if(lieuJson[i].ville==v){
          			//alert(lieuJson[i].lieu);
                for(j=0;j<lieu_select.length;j++){
                  lieu_select[j].insertAdjacentHTML('beforeend',"<option value='"+lieuJson[i].lieu+"'>"+lieuJson[i].lieu+"</option>");
                }
         		}
         	}
         }
         		<?php
            while ($row = mysqli_fetch_assoc($resultLieu))
            { 
            	?>
         				lieuJson.push(<?php echo '{"ville":"'.$row["LIBELLEVILLE"].'","lieu":"'.$row["LIBELLELIEU"].'"}' ?>);
         				<?php
            }		
            ?>	 

      </script>
      <div class="admin-panel clearfix">
         <div class="slidebar">
            <div class="logo">
               <a href="#dashboard"></a>
            </div>
            <ul>
               <li><a href="#dashboard" id="targeted"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a> </li>
               <li>
                  <a href="#agenda" id="targeted"><i class="fa fa-calendar" aria-hidden="true"></i><span>Agenda</span></a>
                  <ul>
                     <li><a href="#Agenda_Ajouter">&#10140;&nbsp;Ajouter</a></li>
                     <li><a href="#Agenda_Modifier">&#10140;&nbsp;Modifier</a></li>
                     <li><a href="#Agenda_Gerer">&#10140;&nbsp;Gérer</a></li>
                  </ul>
               </li>
      
            </ul>
         </div>
         <div class="main">
            <ul class="topbar clearfix">
               <li> <a onclick="menu();"><i class="fa fa-bars" aria-hidden="true"></i></a></li>
               <li> <img style='cursor:pointer;margin-top:5px;' width="35%" style="margin-left:15px;margin-top:5px;" src="img/blogo.png"></li>
               <li><a href="#" style="width:auto;padding:0 10px; 0 10px"><?php echo $_COOKIE["U"]; ?></a><a href="logout.php?user=<?php echo $_COOKIE["U"]; ?>&disconnect=true">Se déconnecter<i style="margin-left:10px;" class="fa fa-sign-out" aria-hidden="true"></i>
                  </a>
               </li>
            </ul>
            <div class="mainContent clearfix">
               <div id="dashboard">
               </div>
               <div id="agenda">
                <script>
                          function disabledCheckOnclick(){
                                /* ***************************************** */
                                var Aj_Tab_Part= document.querySelectorAll(".Participant_Ajouter");  
                                var Mo_Tab_Part= document.querySelectorAll(".Participant_Modifier");  

                                var Aj_charg= document.querySelector("#Aj_charg");
                                var Mo_charg= document.querySelector("#Mo_charg");
                                for(i=0;i<Aj_Tab_Part.length;i++){
                                  if(Aj_charg.value==Aj_Tab_Part[i].value){  
                                    Aj_Tab_Part[i].setAttribute('disabled',true);
                                    Aj_Tab_Part[i].checked=false;
                                  }
                                }
                                for(i=0;i<Mo_Tab_Part.length;i++){
                                  if(Mo_charg.value==Mo_Tab_Part[i].value){  
                                    Mo_Tab_Part[i].setAttribute('disabled',true);
                                    Mo_Tab_Part[i].checked=false;
                                  }
                                }

                            }
                         window.addEventListener("pageshow",function(){
                          var lieu_select=document.querySelectorAll(".lieu");
                            lieu_select[0].innerHTML="";
                            for(i=0;i<lieuJson.length;i++){
                              if(lieuJson[i].ville==lieuJson[0].ville){
                                  //alert(lieuJson[i].lieu);
                                    lieu_select[0].insertAdjacentHTML('beforeend',"<option value='"+lieuJson[i].lieu+"'>"+lieuJson[i].lieu+"</option>");
                              }
                            }
                            disabledCheckOnclick();
                          },false);
                                              function getId(a){
                                                if(a.getAttribute('src')=='img/modifier.png'){
                                                var id= a.parentElement.parentElement.querySelector('td:first-of-type').innerHTML;
                                                window.location.replace("?id="+id+"#Agenda_Modifier");
                                                }
                                                else{var id= a.parentElement.querySelector('td:first-of-type').innerHTML;
                                                window.location.replace("../Applications/Agenda/event.php?numeroE="+id+"#Agenda_Modifier");
                                                }
                                              }

                                              function disabledCheck(a){
                                                  var partisipantsM=document.querySelectorAll('.Participant_Modifier');
                                                
                                                  for(i=0;i<partisipantsM.length;i++){
                                                    if(a.value==partisipantsM[i].value)partisipantsM[i].setAttribute('disabled',true);
                                                    else{partisipantsM[i].removeAttribute('disabled');partisipantsM[i].checked=false;}
                                                  }
                                                  //****************************************** */

                                                  var partisipantsA=document.querySelectorAll('.Participant_Ajouter');
                                                //  alert(a.value);
                                                  for(i=0;i<partisipantsA.length;i++){
                                                    if(a.value==partisipantsA[i].value)partisipantsA[i].setAttribute('disabled',true);
                                                    else{partisipantsA[i].removeAttribute('disabled');partisipantsA[i].checked=false;}
                                                  }
                                              }
                 </script>
                  <h2 class="header">Agenda</h2>
                  <input id='RechercheEvent' type='text' placeholder="Rechercher un evenement par Titre" onkeyup="recherche()" onkeypress="recherche()" onkeydown="recherche()" style='margin-bottom:-20px'>
                  <br>
                  <div class="monitor">
                     <table id='tableEvent' cellspacing=0>
                        <tr>
                           <th>Id</th>
                           <th>Titre</th>
                           <th>Date Evenement</th>
                           <th>Departement</th>
                           <th>Nature</th>
                           <th>Object</th>
                           <th>Modifie</th>
                           <th>Supprimer</th>
                        </tr>
  
                                <?php
                                 while ($row = mysqli_fetch_assoc($resultEv))
                                 {
                                 	echo "<tr style='cursor: help;'><td onclick='getId(this)'>".$row['IDEVENEMENT']."</td><td onclick='getId(this)'>".$row['TITREEVENEMENT']."</td><td onclick='getId(this)'>".$row['DATEDEBUTEV']."</td><td onclick='getId(this)'>".$row['LIBELLEDEPARTEMENT']."</td><td onclick='getId(this)'>".$row['LIBELLENATURE']."</td><td onclick='getId(this)'>".$row['LIBELLEVILLE']."</td><td> <img style='cursor:pointer;' onclick='getId(this)' height='20px' src='img/modifier.png' ></td><td> <img style='cursor:pointer;'onclick='DeleteElement(this)'  id='Delete_Event'  height='20px' src='img/supprimer.png'></td> </tr>";
                                 }
                                ?>
                     </table>
                  </div>
               </div>
               <div id="Agenda_Ajouter">
                  <h2 class="header">Agenda ➜ Ajouter</h2>
                    <form action="insert.php"  method="POST"  enctype="multipart/form-data" >
                     <table cellspacing="20">
                     <?php
										if(isset($_GET["success"])){ 
										 if(intval($_GET["success"],10)==1) echo'<tr><td colspan=4><center class="alert-success">Bien Ajouté</center></td></tr>';
										 else if (intval($_GET["success"],10)==0) echo'<tr><td colspan=4> <center class="alert-danger">Erreur d\'ajout, Veuillez contacter l\'Administrateur de base de données</center></td></tr>';
										// else if (intval($_GET["success"],10)==2) echo'<tr class="alert-warning"  ><td colspan=4> <center>Erreur d\'ajout, Veuillez contacter l\'Administrateur ref:'.$_GET["success"].'</center></td></tr>';
								 		 else if (intval($_GET["success"],10)==3) echo'<tr><td colspan=4> <center class="alert-warning"><i class="fa fa-exclamation-triangle warning" style="color:red;margin-right:10px"  aria-hidden="true"></i>Erreur de téléchargement de l\'image, Veuillez réessaier ou Contactez l\'Administrateur de base de données</center></td></tr>';
										 
								;} ?>  

                      <iframe src="http://localhost:8080/ccisgit/REPOCCIS/Applications/Bibliotheque/upload?noheader" ></iframe>
                        <tr>
                           <td>TITRE</td>
                           <td>
                              <input required name="TITREEVENEMENT" type="text">
                           </td>
                           <td>LIBELLENATURE</td>
                           <td>					
                              <select name="LIBELLENATURE">
                              <?php
                                 while ($row = mysqli_fetch_assoc($resultNat))
                                 {
                                 	echo "<option value='".$row['LIBELLENATURE']."'>".$row['LIBELLENATURE']."</option>";
                                 }
                                ?>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td>DEPARTEMENT</td>
                           <td>
                              <select  name="LIBELLEDEPARTEMENT">
                              <?php
                                 while ($row = mysqli_fetch_assoc($resultDep))
                                 {
                                 	echo "<option value='".$row['LIBELLEDEPARTEMENT']."'>".$row['LIBELLEDEPARTEMENT']."</option>";
                                 }
                                    	?>
                              </select>
                           </td>
                           <td></td>
                           <td> 
                           </td>
                        </tr>
                        <tr>
                           <td>Ville</td>
                           <td>
                              <select name="LIBELLEVILLE" id="ville" onchange="chargementLieu(this.value)">
                              <?php 
                                 while ($row = mysqli_fetch_assoc($resultVille))
                                 {
                                 	echo "<option value='".$row['LIBELLEVILLE']."'>".$row['LIBELLEVILLE']."</option>";
                                 }
                                 ?>
                              </select>
                           </td>
                           <td>Lieu</td>
                           <td>
                              <select  name="LIBELLELIEU"  class="lieu">
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td>DATE EVENEMENT</td>
                           <td>
                              <input required name="DATEDEBUTEV"  type="date">
                           </td>
                           <td style="font-size:20px;">➜</td>
                           <td>
                              <input required name="DATEFINEV"  type="date">
                           </td>
                        </tr>
                        <tr>
                           <td>HEUR</td>
                           <td>
                              <input required name="HEUREVENEMENT"  type="time">
                           </td>
                           <td>Image (facultative) </td>
                           <td>
                             <style> 
                                input[type=file] {
                                 cursor: pointer; 
                                 color:rgba(0, 0, 0, 0.308);
                                 border:0;
                                 box-shadow:0;
                                 opacity: .4; 
                                 box-shadow: 0px 0px 0px 0 rgba(0, 0, 0, 0.308);
                                 padding: 0px;
                               }
                             </style>
                             <input type="file" accept=".png,.jpg,.jpeg" name="image" title="Télecharger une Image pour l'evenement">
                             </td>
                        </tr>
                        <tr>
                           <td>Participants</td>
                           <td >
                              <table style='overflow-y: scroll;'>
                                 <?php 
                                    while ($row = mysqli_fetch_assoc($resultPart))
                                    {
                                    	echo "<tr><td style='width:10px;'><input class='Participant_Ajouter' name='participants[]' style='width:10px;height:10px;dispaly:inline;margin-top:-10px' type='checkbox' value='".$row['MATRICULEEMPLOYE']."'></td><td>".$row['NOMEMPLOYE']." ".$row['PRENOMEMPLOYE']."</td></tr>";
                                    }
                                    ?>
                              </table>
                           </td>
                           <td>Chargé de suivi</td>
                           <td>
                              <select id='Aj_charg' onchange="disabledCheck(this)" name="chargeS">
                              <?php 
                                 while ($row = mysqli_fetch_assoc($resultEmp))
                                 {
                                 	
                                 	echo "<option value='".$row['MATRICULEEMPLOYE']."'>".$row['NOMEMPLOYE']." ".$row['PRENOMEMPLOYE']."</option>";
                                 }
                                 ?>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td>Commentaire</td>
                           <td colspan=3><textarea required name="Comments" cols="90" rows="5"></textarea></td>
                        </tr>
                        <tr>
                           <td colspan=4 align=center><input   style="background-color:#1976D2; color:white;  text-align:center; width:200px; margin-bottom:50px !important;" type="submit" name="Ajouter" value="Ajouter" ></td>
                        </tr>
                     </table>
                  </form>
               </div>
               <div id="Agenda_Modifier">
                  <h2 class="header">Agenda ➜ Modifier</h2>
                  <?php
                                      $queryEvent = "SELECT * FROM evenement WHERE IDEVENEMENT=(select max(IDEVENEMENT) from evenement)";
                                      $resEvent = mysqli_query($con,$queryEvent) or die(mysqli_error()."[".$queryEvent."]");
                  if(isset($_GET["id"])){
                    $id=$_GET['id'];
                    while ($row = mysqli_fetch_assoc($resEvent))
                    {
                    $idMax= $row['IDEVENEMENT'];
                    }
                    if($id>$idMax)$id=$idMax;
                  }else {
                    while ($row = mysqli_fetch_assoc($resEvent))
                    {
                    $id= $row['IDEVENEMENT'];
                    }
                  }
                  $queryEvID="SELECT * FROM evenement WHERE IDEVENEMENT=".$id;
                              $ev_id = mysqli_query($con,$queryEvID);
                              $rowEV = mysqli_fetch_assoc($ev_id);
                  
                  ?>
                  <form action="update.php"  method="POST"  enctype="multipart/form-data">
                  <table cellspacing="20">
                  <?php
										if(isset($_GET["success"])){ 
										 if(intval($_GET["success"],10)==1) echo'<tr><td colspan=4><center class="alert-success">Bien Modifier</center></td></tr>';
										 else if (intval($_GET["success"],10)==0) echo'<tr><td colspan=4> <center class="alert-danger">Erreur de modification, Veuillez contacter l\'Administrateur de base de données</center></td></tr>';
										// else if (intval($_GET["success"],10)==2) echo'<tr class="alert-warning"  ><td colspan=4> <center>Erreur d\'ajout, Veuillez contacter l\'Administrateur ref:'.$_GET["success"].'</center></td></tr>';
								 		 else if (intval($_GET["success"],10)==3) echo'<tr><td colspan=4> <center class="alert-warning"><i class="fa fa-exclamation-triangle warning" style="color:red;margin-right:10px"  aria-hidden="true"></i>Erreur de téléchargement de l\'image, Veuillez réessaier ou Contactez l\'Administrateur de base de données</center></td></tr>';
										 
								;} ?>  
                    <tr>
                    <td>ID</td>
                    <td colspan=4><!--<input readonly  name="IDEVENEMENT" id='id' type="text" value="<?php //echo $rowEV['IDEVENEMENT'];  ?>">-->
                                 <select onchange="window.location.replace('?id='+this.value+'#Agenda_Modifier');" name="IDEVENEMENT">
                                       <?php
                                            $ID_EV = mysqli_query($con,$queryEv) or die(mysqli_error()."[".$queryEv."]");
                                          while ($row = mysqli_fetch_assoc($ID_EV)){
                                           if($rowEV['IDEVENEMENT']==$row['IDEVENEMENT']) echo "<option selected value='".$row['IDEVENEMENT']."'>".$row['IDEVENEMENT']."</option>";
                                           else echo "<option value='".$row['IDEVENEMENT']."'>".$row['IDEVENEMENT']."</option>";
                                          }
                                       ?>
                                 </select>
                    </td>
                    </tr>
                     <tr>
                        <td>TITRE</td>
                        <td>
                           <input name="TITREEVENEMENT" id='titre' type="text" value="<?php echo $rowEV['TITREEVENEMENT'];  ?>">
                        </td>
                        <td>LIBELLENATURE</td>
                        <td>					
                           <select name="LIBELLENATURE">
                           <?php
                                    $resultNatu = mysqli_query($con,$queryNat) or die(mysqli_error()."[".$queryNat."]");
                              while ($row = mysqli_fetch_assoc($resultNatu))
                              {
                                if($row['LIBELLENATURE']==$rowEV['LIBELLENATURE'])
                                echo "<option value='".$row['LIBELLENATURE']."' selected>".$row['LIBELLENATURE']."</option>";
                                else echo "<option value='".$row['LIBELLENATURE']."'>".$row['LIBELLENATURE']."</option>";
                              }
                             ?>
                           </select>
                        </td>
                     </tr>
                     <tr>
                        <td>DEPARTEMENT</td>
                        <td>
                           <select name="LIBELLEDEPARTEMENT">
                           <?php
                                    $resultDepartement = mysqli_query($con,$queryDep) or die(mysqli_error()."[".$queryDep."]");

                              while ($row = mysqli_fetch_assoc($resultDepartement))
                              {
                                if($row['LIBELLEDEPARTEMENT']==$rowEV['LIBELLEDEPARTEMENT'])
                                echo "<option value='".$row['LIBELLEDEPARTEMENT']."' selected >".$row['LIBELLEDEPARTEMENT']."</option>";
                                else echo "<option value='".$row['LIBELLEDEPARTEMENT']."'>".$row['LIBELLEDEPARTEMENT']."</option>";

                              }
                                   ?>
                           </select>
                        </td>
                        <td></td>
                        <td> 
                        </td>
                     </tr>
                     <tr>
                        <td>Ville</td>
                        <td>
                           <select name="LIBELLEVILLE" id="ville" onchange="chargementLieu(this.value)">
                           <?php 
                                    $result_Ville = mysqli_query($con,$queryVille) or die(mysqli_error()."[".$queryVille."]");

                              while ($row = mysqli_fetch_assoc($result_Ville))
                              {
                                if($row['LIBELLEVILLE']==$rowEV['LIBELLEVILLE'])
                                echo "<option value='".$row['LIBELLEVILLE']."' selected>".$row['LIBELLEVILLE']."</option>";
                                else echo "<option value='".$row['LIBELLEVILLE']."'>".$row['LIBELLEVILLE']."</option>";
                              }
                              ?>
                           </select>
                        </td>
                        <td>Lieu</td>
                        <td>
                           <select  name="LIBELLELIEU"  class="lieu">
                           <?php 
                                    $querylieuEV="SELECT * FROM lieu WHERE LIBELLEVILLE='".$rowEV['LIBELLEVILLE']."'";
                                    $result_lieu= mysqli_query($con,$querylieuEV) or die(mysqli_error()."[".$querylieuEV."]");

                              while ($row = mysqli_fetch_assoc($result_lieu))
                              {
                                if($row['LIBELLELIEU']==$rowEV['LIBELLELIEU'])
                                echo "<option value='".$row['LIBELLELIEU']."' selected>".$row['LIBELLELIEU']."</option>";
                                else echo "<option value='".$row['LIBELLELIEU']."'>".$row['LIBELLELIEU']."</option>";
                              }
                              ?>
                           </select>
                        </td>
                     </tr>
                     <tr>
                        <td>DATE EVENEMENT</td>
                        <td>
                           <input name="DATEDEBUTEV" value="<?php echo $rowEV['DATEDEBUTEV']; ?>"  type="date">
                        </td>
                        <td style="font-size:20px;">➜</td>
                        <td>
                           <input name="DATEFINEV" value="<?php echo $rowEV['DATEFINEV']; ?>"  type="date">
                        </td>
                     </tr>
                     <tr>
                        <td>HEUR</td>
                        <td>
                           <input name="HEUREVENEMENT" value="<?php echo $rowEV['HEUREVENEMENT']; ?>"  type="time">
                        </td>
                        <td>Image (facultative) </td>
                        <td>
                          <style> 
                             input[type=file] {
                              cursor: pointer; 
                              color:rgba(0, 0, 0, 0.308);
                              border:0;
                              box-shadow:0;
                              opacity: .4; 
                              box-shadow: 0px 0px 0px 0 rgba(0, 0, 0, 0.308);
                              padding: 0px;
                            }
                          </style>
                          <input type="file" accept=".png,.jpg,.jpeg" name="image" title="Télecharger une Image pour l'evenement">
                          </td>
                     </tr>
                     <tr>
                        <td>Participants</td>
                        <td >
                           <table style='overflow-y: scroll;'>
                              <?php 
                                        $qp="SELECT MATRICULEEMPLOYE from employe WHERE `MATRICULEEMPLOYE` IN (SELECT `MATRICULEEMPLOYE` FROM `affecter` WHERE `IDEVENEMENT`=".$rowEV['IDEVENEMENT']." and `ROLE`='Participants')";
                                        $queryParticipants="SELECT * from employe WHERE `MATRICULEEMPLOYE` IN (SELECT `MATRICULEEMPLOYE` FROM `affecter` WHERE `IDEVENEMENT`=".$rowEV['IDEVENEMENT']." and `ROLE`='Participants')";

                                        $participantsEV = mysqli_query($con,$queryParticipants) or die(mysqli_error()."[".$queryParticipants."]");
                                        

                                        while ($row = mysqli_fetch_assoc($participantsEV))
                                        {
                                            echo "<tr><td style='width:10px;'><input class='Participant_Modifier' checked name='participants[]' style='width:10px;height:10px;dispaly:inline;margin-top:-10px' type='checkbox' value='".$row['MATRICULEEMPLOYE']."'></td><td>".$row['NOMEMPLOYE']." ".$row['PRENOMEMPLOYE']."</td></tr>";
                                        }

                                      $queryEmpNot="SELECT * from employe WHERE MATRICULEEMPLOYE NOT IN  (".$qp.")";
                                      $participants = mysqli_query($con,$queryEmpNot) or die(mysqli_error()."[".$queryEmpNot."]");
  
                                      $qchrgeS = "SELECT * FROM affecter WHERE `ROLE`='CHARGESUIVI' and IDEVENEMENT=".$rowEV['IDEVENEMENT'];
                                      $RchrgeS = mysqli_query($con,$qchrgeS)or die(mysqli_error()."[".$qchrgeS."]");
                                      $chargeS= mysqli_fetch_assoc($RchrgeS);
                                  
                                    while ($row = mysqli_fetch_assoc($participants))
                                    {
                                        if($row['MATRICULEEMPLOYE']==$chargeS['MATRICULEEMPLOYE'])
                                        echo "<tr><td style='width:10px;'><input disabled class='Participant_Modifier'  name='participants[]' style='width:10px;height:10px;dispaly:inline;margin-top:-10px' type='checkbox' value='".$row['MATRICULEEMPLOYE']."'></td><td>".$row['NOMEMPLOYE']." ".$row['PRENOMEMPLOYE']."</td></tr>";
                                        else echo "<tr><td style='width:10px;'><input class='Participant_Modifier'  name='participants[]' style='width:10px;height:10px;dispaly:inline;margin-top:-10px' type='checkbox' value='".$row['MATRICULEEMPLOYE']."'></td><td>".$row['NOMEMPLOYE']." ".$row['PRENOMEMPLOYE']."</td></tr>";
                                   }
                                 ?>
                           </table>
                        </td>
                        <td>Chargé de suivi</td>
                        <td>
         
                           <select id='Mo_charg' onchange="disabledCheck(this)" name="chargeS">
                           <?php 
                                    $EMPLOYE = mysqli_query($con,$queryEmp) or die(mysqli_error()."[".$queryEmp."]");
                                    $queryEmDP = "SELECT * FROM affecter WHERE `ROLE`='CHARGESUIVI' and IDEVENEMENT=".$rowEV['IDEVENEMENT'];
                                    $EMPLOYE_dep = mysqli_query($con,$queryEmDP)or die(mysqli_error()."[".$queryEmDP."]");
                                    $chrgeS= mysqli_fetch_assoc($EMPLOYE_dep);
                                while ($row = mysqli_fetch_assoc($EMPLOYE))
                                {
                                  if($row['MATRICULEEMPLOYE']==$chrgeS['MATRICULEEMPLOYE']){
                                  echo "<option value='".$row['MATRICULEEMPLOYE']."' selected>".$row['NOMEMPLOYE']." ".$row['PRENOMEMPLOYE']."</option>";
                                }else{ echo "<option value='".$row['MATRICULEEMPLOYE']."'>".$row['NOMEMPLOYE']." ".$row['PRENOMEMPLOYE']."</option>";}

                                }
                              ?>
                           </select>
                        </td>
                     </tr>
                     <tr>
                        <td>Commentaire</td>
                        <td colspan=3><textarea name="Comments" cols="90" rows="5"><?php echo $rowEV['COMMENTAIRE']; ?></textarea></td>
                     </tr>
                     <tr>
                        <td colspan=4 align=center><input   style="background-color:#1976D2; color:white;  text-align:center; width:200px; margin-bottom:50px !important;" type="submit" name="Modifier" value="Modifier" ></td>
                     </tr>
                  </table>
                </form>
               </div>
               <div id="Agenda_Gerer">
                 <script>
                            function vider(a){
                              var select= a.parentElement.parentElement.querySelector('select');
                              var input= a.parentElement.parentElement.querySelectorAll('input');
                              select.selectedIndex=0;
                              for(i=0;i<input.length;i++){
                                input[i].value='';
                              }
                            }
                            function Mode_Insert(a){
                              var select= a.parentElement.parentElement.querySelector('select');
                              var input= a.parentElement.parentElement.querySelectorAll('input');
                              var img= a.parentElement.parentElement.querySelectorAll('img');
                              var id= a.parentElement.parentElement.querySelector('td:first-of-type').innerHTML;

                              var href;
                                    switch(img[0].id){
                                      case "Insert_employe":href="type="+img[0].id+"&id="+id+"&nom="+input[0].value+"&prenom="+input[1].value+"&dep="+select.value+"&datedebut="+input[2].value+"&datefin="+input[3].value;break;
                                      case "Insert_dep":href="type="+img[0].id+"&dep="+input[0].value+"&pass="+input[1].value;break;
                                      case "Insert_nature":href="type="+img[0].id+"&nature="+input[0].value;break;
                                      case "Insert_ville":href="type="+img[0].id+"&ville="+input[0].value;break;
                                      case "Insert_lieu":href="type="+img[0].id+"&lieu="+input[0].value+"&ville="+select.value;break;
                                    }
                                    //alert(href);
                                    var xhttp=new XMLHttpRequest();
                                    xhttp.open("POST","insert.php?"+href,false);
                                    xhttp.send(); 
                                    alert(xhttp.responseText);
                                 //  document.write=(xhttp.responseText);
                                  // Annuler(a);
                                  location.reload(); 
                            }
                            function DeleteElement(a){
                              var img= a.parentElement.parentElement.querySelectorAll('img');
                              var id= a.parentElement.parentElement.querySelector('td:first-of-type').innerHTML;
                              var sp= a.parentElement.parentElement.querySelectorAll('span');
                              
                              var href;
                                    switch(img[1].id){
                                      case "Delete_employe":href="type="+img[1].id+"&id="+id;break;
                                      case "Delete_dep":href="type="+img[1].id+"&dep="+sp[0].innerHTML;break;
                                      case "Delete_nature":href="type="+img[1].id+"&nature="+sp[0].innerHTML;break;
                                      case "Delete_ville":href="type="+img[1].id+"&ville="+sp[0].innerHTML;break;
                                      case "Delete_lieu":href="type="+img[1].id+"&lieu="+sp[0].innerHTML;break;
                                      case "Delete_Event":href="type="+img[1].id+"&id="+id;break;

                                    }
                                    //alert(href);
                                    var xhttp=new XMLHttpRequest();
                                    xhttp.open("POST","delete.php?"+href,false);
                                    xhttp.send(); 
                                    alert(xhttp.responseText);
                                  location.reload();
                            }
                            
                            function Mode_modifier(a){
                              var sp= a.parentElement.parentElement.querySelectorAll('span');
                              var img= a.parentElement.parentElement.querySelectorAll('img');
                              var inpt= a.parentElement.parentElement.querySelectorAll('input');
                              var select= a.parentElement.parentElement.querySelector('select');
                              var id= a.parentElement.parentElement.querySelector('td:first-of-type').innerHTML;
                              if(img[0].getAttribute('src')!='img/save.png'){
                                    img[0].src='img/save.png';
                                    img[1].src='img/exit.png';
                                    img[1].setAttribute('onclick','Annuler(this)');
                                    for(i=0;i<sp.length;i++){
                                      sp[i].setAttribute('contenteditable','true');
                                      sp[i].setAttribute('style','border-bottom:3px solid #4291DA');
                                      if(i<inpt.length)inpt[i].removeAttribute('disabled');
                                    }
                                    var xhttp=new XMLHttpRequest();
                                    xhttp.open("GET","ajax.php?type=getdepartements&id="+id,false);
                                    xhttp.send(); 
                                    select.insertAdjacentHTML('beforeend',xhttp.responseText);
                              }else {
                                    var href;
                                    switch(img[0].id){
                                      case "Update_employe":href="type="+img[0].id+"&id="+id+"&nom="+sp[0].innerHTML+"&prenom="+sp[1].innerHTML+"&dep="+select.value+"&datedebut="+inpt[0].value+"&datefin="+inpt[1].value;break;
                                      case "Update_dep":href="type="+img[0].id+"&dep="+sp[0].innerHTML+"&pass="+sp[1].innerHTML+"&lastdep="+sp[0].id;break;
                                      case "Update_nature":href="type="+img[0].id+"&nature="+sp[0].innerHTML+"&lastnature="+sp[0].id;break;
                                      case "Update_ville":href="type="+img[0].id+"&ville="+sp[0].innerHTML+"&lastville="+sp[0].id;break;
                                      case "Update_lieu":href="type="+img[0].id+"&lieu="+sp[0].innerHTML+"&lastlieu="+sp[0].id;break;
                                    }
                                   //alert(href);
                                    var xhttp=new XMLHttpRequest();
                                    xhttp.open("POST","update.php?"+href,false);
                                    xhttp.send(); 
                                   // alert(xhttp.responseText);
                                    Annuler(a);
                                  location.reload(); 
                              }
                            }
                            function Annuler(a){
                              var sp= a.parentElement.parentElement.querySelectorAll('span');
                              var img= a.parentElement.parentElement.querySelectorAll('img');
                              var inpt= a.parentElement.parentElement.querySelectorAll('input');
                              var group= a.parentElement.parentElement.querySelectorAll('optgroup');
                              if(group.length>0)group[1].remove();
                              img[0].src='img/modifier.png';
                              img[1].src='img/supprimer.png';
                              img[1].setAttribute('onclick','DeleteElement(this)');
                              for(i=0;i<sp.length;i++){
                                sp[i].removeAttribute('contenteditable');
                                sp[i].setAttribute('style','border:0px;');
                                if(i<inpt.length)inpt[i].setAttribute('disabled','true');
                              }
                            }
                            function selectEmT(a){
                              var select= a.parentElement.parentElement.querySelector('select');
                              var inpt= a.parentElement.parentElement.querySelectorAll('input');
                              var id= a.parentElement.parentElement.querySelector('td:first-of-type').innerHTML;
                              //alert(id);
                              var xhttp=new XMLHttpRequest();
                              xhttp.open("GET","ajax.php?type=getdates&departement="+select.value+"&id="+id,false);
                              xhttp.send(); 
                              var dates=xhttp.responseText.split("|");
                              var resDebut = dates[0].split("-");
                              var resfin = dates[1].split("-");
                            //alert();
                            inpt[0].value=resDebut[0]+"-"+resDebut[1]+"-"+resDebut[2];
                            inpt[1].value=resfin[0]+"-"+resfin[1]+"-"+resfin[2];
                            }

                          </script>
                <h2 class="header">Agenda ➜ Gérer</h2>
                <table>
                    <?php
										if(isset($_GET["success"])){ 
                     if(intval($_GET["success"],10)==1) echo'<tr><td colspan=4><center class="alert-success">Bien Ajouté</center></td></tr>';
                     else if(intval($_GET["success"],10)==2) echo'<tr><td colspan=4><center class="alert-success">Bien Modifier</center></td></tr>';
                     else if(intval($_GET["success"],10)==3) echo'<tr><td colspan=4><center class="alert-success">Bien Supprimer</center></td></tr>';
										 else if (intval($_GET["success"],10)==4) echo'<tr><td colspan=4> <center class="alert-danger">Erreur , Veuillez contacter l\'Administrateur de base de données</center></td></tr>';
								;} ?>  
                </table>
                    <div class="monitor">
                      <table id='tableEmp' cellspacing=0>
                        <tr>
                           <th>Id</th>
                           <th>Nom</th>
                           <th>Prenom</th>
                           <th>Departement</th>
                           <th>Date Début</th>
                           <th>Date Fin</th>
                           <th>Modifie</th>
                           <th>Supprimer</th>
                        </tr>
                        <?php
                            while ($row = mysqli_fetch_assoc($resultEmp2) )
                            {
                              $queryEmT = "SELECT * FROM em_travaille_dep where MATRICULEEMPLOYE=".$row['MATRICULEEMPLOYE'];
                              $resultEmT = mysqli_query($con,$queryEmT) or die(mysqli_error()."[".$queryEmT."]");
                              $resultEmT2 = mysqli_query($con,$queryDep2) or die(mysqli_error()."[".$queryDep2."]");
  
                              echo "<tr><td>".$row['MATRICULEEMPLOYE']."</td><td><span>".$row['NOMEMPLOYE']."</span></td><td><span
                              >".$row['PRENOMEMPLOYE']."</span></td><td><select style='width: 95.4%;margin: auto;height: 35px;
                              background-color: rgba(255, 255, 255, 0);border: none;text-indent: 10px;border-radius: 0px;padding: 0px;'
                               id='Em_T_Dep' onchange='selectEmT(this)'><option disabled selected>selectioner un departement</option> 
                                <optgroup label='Travail a:'>" ;                     
                              while ($r = mysqli_fetch_assoc($resultEmT) )
                              {
                                echo "<option  value='".$r['LIBELLEDEPARTEMENT']."'>".$r['LIBELLEDEPARTEMENT']."</option>";
                              }
                              echo " </optgroup></select></td><td><input style='margin: auto;background-color: rgba(255, 255, 255, 0);
                              text-indent: 15px;width: 130px;' type='date' id='Mdatedebut' name='Mdatedebut' disabled></td>
                              <td><input style='margin: auto;background-color: rgba(255, 255, 255, 0);text-indent: 15px;width: 130px;'
                               type='date' id='Mdatefin' name='Mdatefin' disabled></td><td> <img style='cursor:pointer;' height='20px' id='Update_employe' src='img/modifier.png' 
                               onclick='Mode_modifier(this)'></td><td>
                                <img style='cursor:pointer;' id='Delete_employe' height='20px' src='img/supprimer.png' onclick='DeleteElement(this)' ></td></tr>";
                            }
                            $new = mysqli_fetch_assoc(mysqli_query($con,"SELECT max(`MATRICULEEMPLOYE`)+1 as MATRICULEEMPLOYE FROM `employe`")) ;
                            echo "<tr><td>".$new['MATRICULEEMPLOYE']."</td><td>
                            <span style='border-bottom:3px solid #4291DA;'>
                            <input placeholder='nom employe' style='width: 80%;margin: auto;height: 35px; background-color: rgba(255, 255, 255, 0);border: none;text-indent: 10px;border-radius: 0px;padding: 0px;'></span>
                            </td><td><span style='border-bottom:3px solid #4291DA;'>
                            <input placeholder='prenom employe'  style='width: 80%;margin: auto;height: 35px; background-color: rgba(255, 255, 255, 0);border: none;text-indent: 10px;border-radius: 0px;padding: 0px;'></span></td><td><select style='width: 95.4%;margin: auto;height: 35px;
                              background-color: rgba(255, 255, 255, 0);border: none;text-indent: 10px;border-radius: 0px;padding: 0px;'
                               id='Em_T_Dep'><option disabled selected>selectioner un departement</option>";
                               while ($r = mysqli_fetch_assoc($resultEmT2) )
                               {
                                 echo "<option  value='".$r['LIBELLEDEPARTEMENT']."'>".$r['LIBELLEDEPARTEMENT']."</option>";
                               }
                               echo " </optgroup></select></td><td><input style='margin: auto;background-color: rgba(255, 255, 255, 0);
                               text-indent: 15px;width: 130px;' type='date' id='Mdatedebut' name='Mdatedebut' ></td>
                               <td><input style='margin: auto;background-color: rgba(255, 255, 255, 0);text-indent: 15px;width: 130px;'
                                type='date' id='Mdatefin' name='Mdatefin' ></td><td> <img style='cursor:pointer;' height='20px' id='Insert_employe' src='img/save.png' 
                                onclick='Mode_Insert(this)'></td><td>
                                 <img style='cursor:pointer;' id='annuler' height='20px' src='img/exit.png' onclick='vider(this)' ></td></tr>";

                        ?>
                        </table>
               
                  </div>
                  <div class="monitor" style="min-width: 250px;">
                      <table id='tableDep' cellspacing=0>
                            <tr>
                              <th>Departement</th>
                              <th>Mot de passe</th>
                              <th>Modifie</th>
                              <th>Supprimer</th>
                            </tr> 
                            <?php
                               while ($row = mysqli_fetch_assoc($resultDep2) )
                              {
                                echo "<tr><td><span id='".$row['LIBELLEDEPARTEMENT']."'>".$row['LIBELLEDEPARTEMENT']."</span></td><td><span>".$row['PASS']."</span></td><td>
                                 <img style='cursor:pointer;' height='20px' id='Update_dep' src='img/modifier.png' onclick='Mode_modifier(this)'></td>
                                <td> <img style='cursor:pointer;' height='20px' src='img/supprimer.png' onclick='DeleteElement(this)' id='Delete_dep' ></td></tr>";
                              }
                              echo "<tr><td><span style='border-bottom:3px solid #4291DA;'>
                              <input placeholder='departement' style='width: 80%;margin: auto;height: 35px; background-color: rgba(255, 255, 255, 0);border: none;text-indent: 10px;border-radius: 0px;padding: 0px;'></span></td><td>                            <span style='border-bottom:3px solid #4291DA;'>
                              <input placeholder='Mot de passe' style='width: 80%;margin: auto;height: 35px; background-color: rgba(255, 255, 255, 0);border: none;text-indent: 10px;border-radius: 0px;padding: 0px;'></span></td>
                              <td> <img style='cursor:pointer;' height='20px' id='Insert_dep' src='img/save.png' 
                                  onclick='Mode_Insert(this)'></td><td>
                                   <img style='cursor:pointer;' id='annuler' height='20px' src='img/exit.png' onclick='vider(this)' ></td></tr>";
                            ?>
                        </table>
                  </div>
                  <div class="monitor" style="min-width: 250px;width: 494px;">
                      <table id='tableVille' cellspacing=0>
                            <tr>
                              <th>Ville</th>
                              <th>Lieu</th>
                              <th>Modifie</th>
                              <th>Supprimer</th>
                            </tr> 
                            <?php
                            while ($row = mysqli_fetch_assoc($resultVille2) )
                            {
                              $queryLieu2 = "SELECT * FROM lieu where LIBELLEVILLE='".$row['LIBELLEVILLE']."'";
                              $resultLieu2 = mysqli_query($con,$queryLieu2) or die(mysqli_error()."[".$queryLieu2."]");

                              echo "<tr><td><span id='".$row['LIBELLEVILLE']."'>".$row['LIBELLEVILLE']."</span></td><td><select style='width: 95.4%;margin: auto;height: 35px;background-color: rgba(255, 255, 255, 0);border: none;text-indent: 10px;border-radius: 0px;padding: 0px;' onchange=''> <option disabled selected>lieu</option>" ;                     
                              while ($r = mysqli_fetch_assoc($resultLieu2) )
                              {
                                echo "<option  value='".$r['LIBELLELIEU']."'>".$r['LIBELLELIEU']."</option>";
                              }
                              echo "</select></td><td>
                               <img style='cursor:pointer;' height='20px' id='Update_ville'  src='img/modifier.png' onclick='Mode_modifier(this)'></td><td>
                               <img style='cursor:pointer;' height='20px' src='img/supprimer.png' onclick='DeleteElement(this)' id='Delete_ville' ></td></tr>";
                            }
                            echo "<tr><td colspan='2'><span style='border-bottom:3px solid #4291DA;'>
                            <input placeholder='ville' style='width: 80%;margin: auto;height: 35px; background-color: rgba(255, 255, 255, 0);border: none;text-indent: 10px;border-radius: 0px;padding: 0px;'></span></td>
                            <td> <img style='cursor:pointer;' height='20px' id='Insert_ville' src='img/save.png' 
                                onclick='Mode_Insert(this)'></td><td>
                                 <img style='cursor:pointer;' id='annuler' height='20px' src='img/exit.png' onclick='vider(this)' ></td></tr>";
                        ?>
                        </table>
                  </div>
                  <div class="monitor" style="min-width: 495px;width: 560px;">
                      <table id='tableNature' cellspacing=0>
                            <tr>
                              <th>Nature</th>
                              <th>Modifie</th>
                              <th>Supprimer</th>
                            </tr> 
                            <?php
                               while ($row = mysqli_fetch_assoc($resultNa2) )
                              {
                                echo "<tr><td><span id='".$row['LIBELLENATURE']."'>".$row['LIBELLENATURE']."</span></td>
                                <td> <img style='cursor:pointer;' height='20px' id='Update_nature' src='img/modifier.png' onclick='Mode_modifier(this)'></td>
                                <td> <img style='cursor:pointer;' height='20px' src='img/supprimer.png' onclick='DeleteElement(this)' id='Delete_nature' ></td></tr>";
                              }
                              echo "<tr><td><span style='border-bottom:3px solid #4291DA;'>
                              <input placeholder='Nature' style='width: 80%;margin: auto;height: 35px; background-color: rgba(255, 255, 255, 0);border: none;text-indent: 10px;border-radius: 0px;padding: 0px;'></span></td>
                              <td> <img style='cursor:pointer;' height='20px' id='Insert_nature' src='img/save.png' 
                                  onclick='Mode_Insert(this)'></td><td>
                                   <img style='cursor:pointer;' id='annuler' height='20px' src='img/exit.png' onclick='vider(this)' ></td></tr>";
                                  
                            ?>
                        </table>
                  </div>
                  <div class="monitor" style="min-width: 495px;">
                      <table id='tableNature' cellspacing=0>
                            <tr>
                              <th>Lieu</th>
                              <th>Ville</th>
                              <th>Modifie</th>
                              <th>Supprimer</th>
                            </tr> 
                            <?php
                               while ($row = mysqli_fetch_assoc($resultLieu3) )
                              {
                                echo "<tr><td><span id='".$row['LIBELLELIEU']."'>".$row['LIBELLELIEU']."</span></td><td>".$row['LIBELLEVILLE']."</td>
                                <td> <img style='cursor:pointer;' height='20px' id='Update_lieu'  src='img/modifier.png' onclick='Mode_modifier(this)'></td>
                                <td> <img style='cursor:pointer;'  height='20px' src='img/supprimer.png' onclick='DeleteElement(this)'  id='Delete_lieu' ></td></tr>";
                              }
                              echo "<tr><td><span style='border-bottom:3px solid #4291DA;'>
                              <input placeholder='Lieu' style='width: 80%;margin: auto;height: 35px; background-color: rgba(255, 255, 255, 0);border: none;text-indent: 10px;border-radius: 0px;padding: 0px;'></span></td>
                              <td>
                              <select style='width: 95.4%;margin: auto;height: 35px;background-color: rgba(255, 255, 255, 0);border: none;text-indent: 10px;border-radius: 0px;padding: 0px;' onchange=''> ";                     
                              while ($r = mysqli_fetch_assoc($resultV) )
                              {
                                echo "<option  value='".$r['LIBELLEVILLE']."'>".$r['LIBELLEVILLE']."</option>";
                              }
                              echo "</select></td>
                              <td> <img style='cursor:pointer;' height='20px' id='Insert_lieu' src='img/save.png' 
                                  onclick='Mode_Insert(this)'></td><td>
                                   <img style='cursor:pointer;' id='annuler' height='20px' src='img/exit.png' onclick='vider(this)' ></td></tr>";
                            ?>
                        </table>         
                  </div>

               </div>
               
               <div id="links">
                  <h2 class="header">links</h2>
               </div>
               <div id="comments">
                  <h2 class="header">comments</h2>
               </div>
               <div id="widgets">
                  <h2 class="header">widgets</h2>
               </div>
               <div id="plugins">
                  <h2 class="header">plugins</h2>
               </div>
               <div id="users">
                  <h2 class="header">users</h2>
               </div>
               <div id="tools">
                  <h2 class="header">tools</h2>
               </div>
               <div id="settings">
                  <h2 class="header">settings</h2>
               </div>
            </div>
            <ul class="statusbar">
               <li><a href="http://CCIS-agadir.com">© CCIS AGADIR 2017/2018</a></li>
            </ul>
         </div>
      </div>
      <script>
         function recherche() {
         	var input, filter, table, rows, td, i;
         	input = document.getElementById("RechercheEvent");
         	filter = input.value.toUpperCase();
         	table = document.getElementById("tableEvent");
         	rows = table.getElementsByTagName("tr");
         	var g = 0;
         	for (var i = 0; i < rows.length; i++) {
         		var td1 = rows[i].getElementsByTagName("td")[0];
         		var td2 = rows[i].getElementsByTagName("td")[1];
         		var td3 = rows[i].getElementsByTagName("td")[2];
         		var td4 = rows[i].getElementsByTagName("td")[3];
         		var td5 = rows[i].getElementsByTagName("td")[4];
         		var td6 = rows[i].getElementsByTagName("td")[5];
         		if(td1){
         			if (td1.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1 || td3.innerHTML.toUpperCase().indexOf(filter) > -1 || td4.innerHTML.toUpperCase().indexOf(filter) > -1 || td5.innerHTML.toUpperCase().indexOf(filter) > -1 || td6.innerHTML.toUpperCase().indexOf(filter) > -1) {
         				rows[i].style.display = "";
         			}
         			else {
         				rows[i].style.display = "none";
         			}
         		}
         	}
         	// alert("ok");
         }
         		document.querySelector('input[type:\'checkbox\']').style.display = 'inline-block!important';
         
         function menu() {
         	if (document.querySelector('.slidebar').clientWidth != 50) {
         		document.querySelector('.slidebar').style.width = '50px';
         		if ($(window).width()<= 1280){
         		document.querySelector('.main').style.width = '96%';
         		}
         		else
         		document.querySelector('.main').style.width = '96.2%';
         		document.querySelector('.logo').style.display = "none"; 
         		document.querySelector('ul:first-of-type>li span').style.color = "red!important";
         	}
         	else {
         		document.querySelector('.slidebar').style.width = '15%';
         		document.querySelector('.main').style.width = ' 84.9%';
         		document.querySelector('.logo').style.display = "block";
         	}
         }
      </script>
   </body>
</html>

