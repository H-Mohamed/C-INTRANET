<?php
         session_start();
         $con =mysqli_connect("localhost","root","","ccis_agenda") ;
		    	$queryUTF="set names 'utf8'";
           mysqli_query($con,$queryUTF) or die(mysqli_error()."[".$queryUTF."]");		 
         function runQuery($query) { 
            $result = mysqli_query($GLOBALS['con'],$query);
         /*	while($row= mysqli_fetch_assoc($result)) {
               $resultset[] = $row;
            }*/
            while ($row = mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
                }
               if(!empty($resultset))
               return $resultset;
         }
         // Check connection
         if (mysqli_connect_errno())
           {
           echo "Failed to connect to MySQL: " . mysqli_connect_error();
           }
         $queryUTF="set names 'utf8'";
         $getnatures="SELECT * FROM nature_evenement";
         $nature_array = runQuery($getnatures);
         $countEv="select count(IDEVENEMENT) as NbrEv from evenement";
         $req=mysqli_query($con,$countEv) or die(mysqli_error());
         $data=mysqli_fetch_assoc($req);  
         $nbEV=$data['NbrEv'];
         $EVperpage=8;
         $nbrpages= ceil($nbEV/$EVperpage);
         $page=1;
         mysqli_query($con,$queryUTF) or die(mysqli_error()."[".$queryUTF."]"); 
         if(!isset($_GET['page']) && !isset($_GET['ASC']) && !isset($_GET['Type']) && !isset($_GET['DD']) && !isset($_GET['DF'])){
                           $countEv="select count(IDEVENEMENT) as NbrEv from evenement";
                           $req=mysqli_query($con,$countEv) or die(mysqli_error($con));
                           $data=mysqli_fetch_assoc($req);  
                           $nbEV=$data['NbrEv'];
                           $EVperpage=8;
                           $nbrpages= ceil($nbEV/$EVperpage);
                           $page=1;
                           $queryEvent = "SELECT * FROM evenement ORDER BY evenement.DATEDEBUTEV DESC Limit ".($page-1)*$EVperpage.",$EVperpage";  
                           $resultEvent = mysqli_query($con,$queryEvent) or die(mysqli_error($con)."[".$queryEvent."]"); 
         }
         else
         {
          if(isset($_GET['page']))
            { 
               if((intval($_GET['page'],10)<=0) || (intval($_GET['page'],10)>$nbrpages))
               {
                  $page=1; 
               }
               else
               $page=$_GET['page'];
               $countEv="select count(IDEVENEMENT) as NbrEv from evenement";
               $req=mysqli_query($con,$countEv) or die(mysqli_error($con));
               $data=mysqli_fetch_assoc($req);  
               $nbEV=$data['NbrEv'];
               $EVperpage=8;
               $nbrpages= ceil($nbEV/$EVperpage); 
               $queryEvent = "SELECT * FROM evenement ORDER BY evenement.DATEDEBUTEV DESC Limit ".($page-1)*$EVperpage.",$EVperpage";  
               $resultEvent = mysqli_query($con,$queryEvent) or die(mysqli_error($con)."[".$queryEvent."]");
            } 
            if(isset($_GET["ASC"]))
            {
               $countEv="select count(IDEVENEMENT) as NbrEv from evenement";
               $req=mysqli_query($con,$countEv) or die(mysqli_error($con));
               $data=mysqli_fetch_assoc($req);  
               $nbEV=$data['NbrEv'];
               $EVperpage=8;
               $nbrpages= ceil($nbEV/$EVperpage);
                 if(isset($_GET['page']))
                  $page=$_GET['page'];
                 else
                  $page=1;
               $asc=intval($_GET['ASC'],10);
               if($asc<0 || $asc>1)
               {
                  $asc=1;
               }
               else
               {
                  switch($asc){
                     case 1 :    $queryEvent = "SELECT * FROM evenement ORDER BY evenement.DATEDEBUTEV ASC Limit ".($page-1)*$EVperpage.",$EVperpage";  
                                 $resultEvent = mysqli_query($con,$queryEvent) or die(mysqli_error($con)."[".$queryEvent."]");
                                 break;
                     case 0 :    $queryEvent = "SELECT * FROM evenement ORDER BY evenement.DATEDEBUTEV DESC Limit ".($page-1)*$EVperpage.",$EVperpage";  
                                 $resultEvent = mysqli_query($con,$queryEvent) or die(mysqli_error($con)."[".$queryEvent."]");
                                 break;
                  }
               }
            }
            if(isset($_GET['Type'])){
               $type=mysqli_real_escape_string($con, $_GET['Type']);   
               $countEv="select count(IDEVENEMENT) as NbrEv from evenement where LIBELLENATURE='".$type."'";
               $req=mysqli_query($con,$countEv) or die(mysqli_error($con));
               $data=mysqli_fetch_assoc($req);  
               $nbEV=$data['NbrEv'];
               $EVperpage=8;
               $nbrpages= ceil($nbEV/$EVperpage);
               if(isset($_GET['page']))
                  $page=$_GET['page'];
                 else
                  $page=1;
               $queryEvent = "SELECT * FROM evenement where LIBELLENATURE='".$type."' ORDER BY evenement.DATEDEBUTEV DESC Limit ".($page-1)*$EVperpage.",$EVperpage";  
               $resultEvent = mysqli_query($con,$queryEvent) or die(mysqli_error($con)."[".$queryEvent."]");
            }
            if(isset($_GET['DD']) && isset($_GET['DF'])){
                           $DF=mysqli_real_escape_string($con, $_GET['DF']);
                           $DD=mysqli_real_escape_string($con, $_GET['DD']);
                           $countEv="select count(IDEVENEMENT) as NbrEv from evenement where DATEDEBUTEV >= '".$DD."' and DATEFINEV <= '".$DF."'";
                           $req=mysqli_query($con,$countEv) or die(mysqli_error($con));
                           $data=mysqli_fetch_assoc($req);  
                           $nbEV=$data['NbrEv'];
                           $EVperpage=8;
                           $nbrpages= ceil($nbEV/$EVperpage);
                            if(isset($_GET['page']))
                           $page=$_GET['page'];
                            else
                           $page=1;
                           $queryEvent = "SELECT * FROM evenement where DATEDEBUTEV >='".$DD."' and DATEDEBUTEV <= '".$DF."' ORDER BY evenement.DATEDEBUTEV DESC Limit ".($page-1)*$EVperpage.",$EVperpage";  
                           $resultEvent = mysqli_query($con,$queryEvent) or die(mysqli_error($con)."[".$queryEvent."]");    
                  }
         }
         ?>
<!DOCTYPE html>
<html lang="en">
   <head>
   <meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>AGENDA - CCIS</title>
      <meta name="author" content="Stagiaires TDI 201 TASSILA Promotion 2016-2018(MOHAMED HARIR & AMINE DERRAGH)">
      <link rel="stylesheet" href="../css/font-awesome.min.css">
      <link rel="stylesheet" href='../css/pure-css-select-style.css'>
      <link rel="stylesheet" href='../css/home.css'>
      <script src="../js/jquery.js"></script>
      <!-- Include Date Range Picker -->
      <script type="text/javascript" src="../js/moment.min.js"></script>
      <script type="text/javascript" src="../js/daterangepicker.js"></script>
      <link rel="stylesheet" type="text/css" href="../css/bootstratp-min.css" />
      <link rel="stylesheet" type="text/css" href="../css/daterangepicker.css" />
      <!-- Date Range Picker -->
   </head>
   <style>
      @font-face {
      font-family: Exo-Light;
      src: url(../fonts/Exo-Light.otf);
      }
      *:not(i,marquee){ 
      font-family: Exo-Light;
      }
      .add{
      height: 45px;
      width: 45px;
      position: fixed;
      z-index: 5;
      top: 175px;
      right: 5px;
      background: #D62929;
      border-radius: 90px;
      padding: 0px;
      }
      .add a{
      margin-left: 13.3px;
      cursor: pointer;
      text-decoration: none;
      color: white;
      font-size: 33px;
      font-weight: 900;
      font-family: Exo-Light;
      }
      .add hover{
      }
      .searchBox table{
      margin-top:10px;
      }
      .Evenements{
      width:95%;
      margin: 20px 40px 0 40px;
      overflow: hidden;
      font-family: calibri;
      }
      .Evenements  figure {
      float:left;
      width:287px;
      height:280px;
      line-height:auto;
      position: relative;
      padding: 0 !important;
      margin: 15px;
      -webkit-box-shadow: 1px 1px 2px 0px rgba(0,0,0,0.2);
      -moz-box-shadow: 1px 1px 2px 0px rgba(0,0,0,0.2);
      box-shadow: 1px 1px 2px 0px rgba(0,0,0,0.2);
      background-color:#FFF;
      border: 1px solid #f0f0f0;
      border-right: 0px;
      border-bottom: 0px;
      } .Evenements  figure .titleEvent  {
      width: 230px;
      margin: 0 0 0 10px;
      font-size: 17.5px;
      height: 50px;
      display: inline-block;
      font-weight: 600;
      position: absolute;
      }.Evenements  figure .moisEvent  {
      width: 50px;
      height: 50px;
      background-color: #D62929;
      text-align: center;
      color: white;
      display: inline-block;
      font-weight: bold;
      font-size:17px;
      }
      /* Removes the clear button from date inputs */
      input[type="date"]::-clear-button ,input,select{ 
      }
      /* Removes the spin button */
      input[type="date"]::-inner-spin-button {  
      }
      /* Always display the drop down caret */
      input[type="date"]::-calendar-picker-indicator {
      color: #2c3e50;
      }
      /* A few custom styles for date inputs */
      input[type="date"],input,select{ 
      color: #95a5a6;
      font-family: "Helvetica", arial, sans-serif;
      font-size: 18px;
      border:1px solid #ecf0f1;
      background:#ecf0f1;
      padding:5px;
      display: inline-block !important;
      visibility: visible !important;
      }
      input,input[type="date"],select, focus {
      color: #95a5a6;
      box-shadow: none;
      -webkit-box-shadow: none;
      -moz-box-shadow: none;
      }
      footer {
        clear: both;
        position: relative;
        z-index: 10;
        margin-top: 5.1em;
        bottom: 0px;
      }
   </style>
   <body> 
   <?php include("header.php")?>  <?php 
    if(isset($_COOKIE["U"])){ 
    ?>     <div class='add'><a href='add-event.php'>+</a> </div>
    <?php }
    ?> 
      <br class='saut'>
      <div class="searchBox">
         <form action="search.php?">
            <table width="100%">
               <tr>
                  <td>
                     <input type="text" name="Revent" id="searchfield" placeholder="RECHERCHER"  >
                    </td>
                  <td><input type="submit" value='' class="fa fa-search" style="margin: auto 30px auto -30px;width: 35px;height: 35px;background-image: url('../img/search.png');background-origin: border-box;background-size: 25px 25px;background-repeat: no-repeat;background-position-x: 5px;background-position-y: 5px;background-color: #D81A38;"/>
                  </td>
                  <td>
                     <span class="Rmullti" >DATE EVENEMENT :</span>
                     <input id="datefield" type="text" name="daterange" value="01/01/2015 - 01/31/2015" />
                     <script type="text/javascript">
                        $(function() { 
                            $('input[name="daterange"]').daterangepicker({
                                "showDropdowns": true,
                                    "locale": {
                                        "format": "MM/DD/YYYY",
                                        "separator": " - ",
                                        "applyLabel": "Appliquer",
                                        "cancelLabel": "Annuler",
                                        "fromLabel": "Début",
                                        "toLabel": "Fin",
                                        "customRangeLabel": "Custom",
                                        "weekLabel": "S",
                                        "daysOfWeek": [
                                            "Di",
                                            "Lu",
                                            "Ma",
                                            "Me",
                                            "Je",
                                            "Ve",
                                            "Sa"
                                        ],
                                        "monthNames": [
                                            "Janvier",
                                            "Février",
                                            "Mars",
                                            "Avri",
                                            "Mai",
                                            "Juin",
                                            "Juillet",
                                            "Août",
                                            "September",
                                            "October",
                                            "November",
                                            "Décember"
                                        ],
                                        "firstDay": 1
                                    },
                                    "linkedCalendars": true,
                                    "showCustomRangeLabel": true,
                                    "startDate": "01/01/2018",
                                    "endDate": "01/01/2019"
                                },
                                  function(start, end, label) {
                                 var datedebut= start.format('YYYY-MM-DD');
                                 var datefin= end.format('YYYY-MM-DD');
                                 var goto = "index.php?DD="+datedebut+"&DF="+datefin; 
                              if (goto!=='') {
                                  window.location = goto;
                                 // console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
                                    }
                                  }
                              );
                            
                        });
                        
                     // envoie daterange=06%2F06%2F2017+-+06%2F06%2F2018
                       
                     </script>
                  </td>
                  <td>
                     <span class="Rmullti" >Trier Par :</span>
                     <select class="selectme" id="trier" style="width: 220px!important;">  
                     <script> 
                          $("#trier").change(function(){
                              var goto = $(':selected', this).val(); 
                              if (goto!=='') {
                                  window.location = goto;
                              } 
                          }); 
                     </script>
                        <option value="#" style="font-style: italic;font-weight: bold;">Ancient ou Récent</option>
                        <option value="index.php?ASC=0">Plus récent</option> 
                        <option value="index.php?ASC=1">Plus ancient</option> 
                     </select>
                  </td>
                  <td>
                     <span class="Rmullti" >Type :</span>
                     <select class="selectme" id="type" style="width: 220px!important;">
                        <option value="#" style="font-style: italic;font-weight: bold;">Nature d'evenement</option>
                        <?php if (!empty($nature_array)) { 
										foreach($nature_array as $key=>$value){
										echo	'<option value="index.php?Type='.$nature_array[$key]["LIBELLENATURE"].'">'.$nature_array[$key]["LIBELLENATURE"].'</option>';
											 	}
										}
										else echo '<option value="">NULL</option>'; 
											?>
                        <script> 
                          $("#type").change(function(){
                              var goto = $(':selected', this).val(); 
                              if (goto!=='') {
                                  window.location = goto;
                              } 
                          });
                     </script>
  
                     </select>
                  </td>
               <tr>
            </table>
         </form>
      </div>
      <section class="Evenements" style="min-height:400px">
      <?php
      if (mysqli_num_rows($resultEvent)==0) { echo " <div class='center'>Aucune correspondace selon les critères données</center>"; }
    else{ 
      while ($row = mysqli_fetch_assoc($resultEvent))
      {     
       /* echo substr(date("d", strtotime($row['DATEEVENEMENT'])),0,3);
        echo substr(date("F", strtotime($row['DATEEVENEMENT'])),0,3);
        echo $row['TITREEVENEMENT'];
        echo substr($row['Comments'],0,300);*/
       
        $commentair=preg_replace( '/\r|\n/', "",$row['COMMENTAIRE']);
        $commentair=substr($commentair,0,264);
        $commentair=mb_strtolower($commentair,'UTF-8');
        echo '<figure class="white" style="border: 1px solid #e6e9ec;"> <div class="moisEvent">'.substr(date("d", strtotime($row['DATEDEBUTEV'])),0,3).'<br>'.substr(date("F", strtotime($row['DATEDEBUTEV'])),0,3).'</div> <div class="titleEvent"><div style="display: table-cell !important;vertical-align: middle !important;height: 50px;">'.$row['TITREEVENEMENT'].'</div> </div><div style="height: 170px; overflow: hidden;
margin-bottom: 10px;"><p style="    text-align: justify;
text-justify: inter-word; font-size: 16px;font-family: calibri;padding: 10px;">'.$commentair.' ...</p></div> <div style="text-align: center;"><a href="event.php?numeroE='.$row['IDEVENEMENT'].'" style="background-color: #d62929;padding: 10px 20px 10px 20px;text-decoration: none;color: white;border-radius: 5px;border-bottom: 6px solid #bf0b0b;font-family:arial;">LIRE LA SUITE</a></div> </figure>';
      }     
    }?>
         <script>
            for(i=0;i<12;i++){
               // document.write('<figure class="white"> <div class="moisEvent">27<br>nov</div> <div class="titleEvent"><div style="display: table-cell !important;vertical-align: middle !important;height: 50px;">Evenement 0</div> </div> <p style="font-size: 16px;font-family: calibri;padding: 10px;">Une petite déscription en 300 caractère max du commentaire récupéré de la base données to build on the card title and make up the bulk of the card récupéré de la base données to build on the card hhhhhhhhhh khkhkhkkhkhkkh...</p> <div style="text-align: center;"><a href="#" style="background-color: #d62929;padding: 10px 20px 10px 20px;text-decoration: none;color: white;border-radius: 5px;border-bottom: 6px solid #bf0b0b;font-family:arial;">LIRE LA SUITE</a></div> </figure>')
            }
         </script>
      </section>
      <style>
         
.center {
    text-align: center;
}

.pagination {
    display: inline-block;
}

.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
    margin: 0 4px;
}

.pagination a.active {
    background-color: #d62929;
    color: white;
    border: 1px solid #ddd;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
      </style> 
         <div class="center">
          <div class="pagination">
            <?php
            if(!isset($_GET["ASC"]) && !isset($_GET["Type"]) && !isset($_GET['DD']) && !isset($_GET['DF'])){
            ?> 
            <a href="index.php?page=<?php if(($page-1)<=0)echo 1; else echo $page-1;?>">&laquo;</a>
            <?php
            for($i=1;$i<=$nbrpages;$i++){
               if($i==$page)
                echo " <a class='active' href=\"index.php?page=$i\">$i</a> ";  
               else
             echo " <a href=\"index.php?page=$i\">$i</a> ";  
            }
            ?>
            <a href="index.php?page=<?php if(($page)>=$nbrpages) echo $nbrpages; else echo $page+1;?>">&raquo;</a>
            <?php 
            }
            else if(isset($_GET["ASC"])){
            $asc=intval($_GET['ASC'],10);
            if($asc<0 || $asc>1)
            {
               $asc=1;
            }
            ?> 
            <a href="index.php?page=<?php if(($page-1)<=0)echo 1; else echo $page-1; echo "&ASC=".$asc;?>">&laquo;</a>
            <?php
            for($i=1;$i<=$nbrpages;$i++){
               if($i==$page)
                echo " <a class='active' href=\"index.php?page=$i"."&ASC=".$asc."\">$i</a> ";  
               else
             echo " <a href=\"index.php?page=$i"."&ASC=".$asc."\">$i</a> ";  
            }
            ?>
            <a href="index.php?page=<?php if(($page)>=$nbrpages) echo $nbrpages; else echo $page+1; echo "&ASC=".$asc;?>">&raquo;</a>
            <?php } 
            else if(isset($_GET["Type"])){
               $type=mysqli_real_escape_string($con, $_GET['Type']);  
            ?> 
            <a href="index.php?page=<?php if(($page-1)<=0)echo 1; else echo $page-1; echo "&Type=".$type;?>">&laquo;</a>
            <?php
            for($i=1;$i<=$nbrpages;$i++){
               if($i==$page)
                echo " <a class='active' href=\"index.php?page=$i"."&Type=".$type."\">$i</a> ";  
               else
             echo " <a href=\"index.php?page=$i"."&Type=".$type."\">$i</a> ";  
            }
            ?>
            <a href="index.php?page=<?php if(($page)>=$nbrpages) echo $nbrpages; else echo $page+1; echo "&Type=".$type;?>">&raquo;</a>
            <?php }
            else if(isset($_GET['DD']) && isset($_GET['DF']) ){ 
                           $DF=mysqli_real_escape_string($con, $_GET['DF']);
                           $DD=mysqli_real_escape_string($con, $_GET['DD']);
            ?> 
            <a href="index.php?page=<?php if(($page-1)<=0)echo 1; else echo $page-1; echo "&DD=".$DD."&DF=".$DF;?>">&laquo;</a>
            <?php
            for($i=1;$i<=$nbrpages;$i++){
               if($i==$page)
                echo " <a class='active' href=\"index.php?page=$i"."&index.php?DD=".$DD."&DF=".$DF."\">$i</a> ";  
               else
             echo " <a href=\"index.php?page=$i"."&DD=".$DD."&DF=".$DF."\">$i</a> ";  
            }
            ?>
            <a href="index.php?page=<?php if(($page)>=$nbrpages) echo $nbrpages; else echo $page+1; echo "&DD=".$DD."&DF=".$DF;?>">&raquo;</a>
           
                  <?php } ?>
          </div>
        </div> 
    <footer style='position:fixed!important;bottom:0!important;'>
         <div style="margin-top: 16px;">
            <span>  CCIS SM Internet
            </span>
            <span> Conditions Génerales
            </span>
            <span> Agenda
            </span> 
         </div>
         <img style="margin-top: -65px;" src="../img/logo_Buttom.png" >
         <div style="margin-top: 16px;">
            <span> Sous-Iktisad
            </span>
            <span> Centre d'aide
            </span>
            <span> Contacter-Nous
            </span> 
         </div>
      </footer>
      <style>
                            .daterangepicker i{
                                color:black!important;
                            }
                     </style>
   </body>
</html>

