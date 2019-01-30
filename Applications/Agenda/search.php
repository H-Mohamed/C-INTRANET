 
<?php
session_start(); 
         $con = mysqli_connect("localhost","root","","ccis_agenda") ;
         // Check connection
         if (mysqli_connect_errno())
           {
           echo "Failed to connect to MySQL: " . mysqli_connect_error();
           }
         $queryUTF="set names 'utf8'";

         mysqli_query($con,$queryUTF) or die(mysqli_error()."[".$queryUTF."]");
         $countEv="select count(IDEVENEMENT) as NbrEv from evenement ";
         $req=mysqli_query($con,$countEv) or die(mysqli_error());
         $data=mysqli_fetch_assoc($req);  
         $nbEV=$data['NbrEv'];
         $EVperpage=8;
         $nbrpages= ceil($nbEV/$EVperpage); 
         if(!isset($_GET['page'])){
         $page=1;
         }
         else
         { 
            if((intval($_GET['page'],10)<=0) || (intval($_GET['page'],10)>$nbrpages))
            {
               $page=1; 
            }
            else
            $page=$_GET['page']; 
         }
         if(isset($_GET["Revent"])){
         $Revent=mysqli_real_escape_string($con, $_GET['Revent']);
         $countEv="select count(IDEVENEMENT) as NbrEv from evenement where TITREEVENEMENT Like'%".$Revent."%' OR COMMENTAIRE Like '%".$Revent."%'";
         $req=mysqli_query($con,$countEv) or die(mysqli_error());
         $data=mysqli_fetch_assoc($req); 
         $nbEV=$data['NbrEv'];
         $EVperpage=8;
         $nbrpages= ceil($nbEV/$EVperpage);
         $queryEvent = "SELECT * FROM evenement where TITREEVENEMENT Like'%".$Revent."%' OR COMMENTAIRE Like '%".$Revent."%' ORDER BY evenement.DATEDEBUTEV DESC Limit ".($page-1)*$EVperpage.",$EVperpage";
         }
         else
         $queryEvent = "SELECT * FROM evenement ORDER BY evenement.DATEDEBUTEV DESC Limit ".($page-1)*$EVperpage.",$EVperpage"; 
         $resultEvent = mysqli_query($con,$queryEvent) or die(mysqli_error()."[".$queryEvent."]");
         ?>
<!DOCTYPE html>
<html lang="en">
   <head>
   <meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Accueil - CCIS</title>
      <link rel="stylesheet" href="../css/font-awesome.min.css">
      <link rel="stylesheet" href='../css/pure-css-select-style.css'>
      <link rel="stylesheet" href='../css/home.css'>
      <script src="js/jquery321.js"></script>
      <!-- Include Date Range Picker -->
      <script type="text/javascript" src="../js/moment.min.js"></script>
      <script type="text/javascript" src="../js/daterangepicker.js"></script>
      <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
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
   <body id='bdy'>
   
      <?php include("header.php")?>
      <div class='add'><a href='add-event.php'>+</a> </div>
      <br class='saut'>
      <div class="searchBox">
         <form action="search.php">
            <table width="100%">
               <tr width="100%">
                  <td width="100%">
                     <input type="text" name="Revent" id="searchfield" placeholder="RECHERCHER" style='width:99%!important' >
                    </td>
                  <td><input type="submit" value='' class="fa fa-search" style="margin: auto 30px auto -30px;width: 35px;height: 35px;background-image: url('../img/search.png');background-origin: border-box;background-size: 25px 25px;background-repeat: no-repeat;background-position-x: 5px;background-position-y: 5px;background-color: #D81A38;"/>
                  </td> 
               </tr>
            </table>
         </form>
      </div>
      <section class="Evenements" style="min-height:400px">
      <?php
    if (mysqli_num_rows($resultEvent)==0) { echo " <div class='center'>Aucune correspondace trouvé, Essayez d'autres mots clés</center>"; }
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
        echo '<figure class="white"> <div class="moisEvent">'.
        substr(date("d", strtotime($row['DATEDEBUTEV'])),0,3).'<br>'.
        substr(date("F", strtotime($row['DATEDEBUTEV'])),0,3).
        '</div> <div class="titleEvent"><div style="display: table-cell !important;vertical-align: middle !important;height: 50px;">'.
        $row['TITREEVENEMENT'].'</div> </div><div style="height: 170px; overflow: hidden;margin-bottom: 10px;">'.
        '<p style="text-align: justify;text-justify: inter-word; font-size: 16px;font-family: calibri;padding: 10px;">'.
        $commentair.' ...</p></div> <div style="text-align: center;"><a href="event.php?numeroE='.$row['IDEVENEMENT'].
        '" style="background-color: #d62929;padding: 10px 20px 10px 20px;text-decoration: none;color: white;border-radius: 5px;'.
        'border-bottom: 6px solid #bf0b0b;font-family:arial;">LIRE LA SUITE</a></div> </figure>';
      }     
    }
    ?>
         <script> 
         </script>
      </section>
   
         <div class="center">
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
          <div class="pagination">  
            <a href="index.php?page=<?php if(($page-1)<=0)echo 1; else echo $page-1;?>">&laquo;</a>
            <?php
            for($i=1;$i<=$nbrpages;$i++){
               if($i==$page)
                echo " <a class='active' href=\"search.php?page=$i\">$i</a> ";  
               else
             echo " <a href=\"search.php?page=$i\">$i</a> ";  
            }
            ?>
            <a href="search.php?page=<?php if(($page)>=$nbrpages) echo $nbrpages; else echo $page+1;?>">&raquo;</a>
          </div>
        </div> 
      <footer>
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
      <script>
         function rechercher() {
         		var input, filter, table, rows, td;
         		input = document.getElementById("searchfield");
         		filter = input.value.toUpperCase();
         		container = document.getElementById("cards");
         		cards = container.getElementsByClassName("card");
         		var g = 0;
         		for (var i = 0; i < rows.length; i++) {
         			var cardtitle = cards[i].getElementsByTagName("h4")[0];
         			if(cardtitle){
         				if (cardtitle.innerHTML.toUpperCase().indexOf(filter) > -1) {
         					cardtitle[i].style.display = "";
         				}
         				else {
         					cardtitle[i].style.display = "none";
         				}
         			}
         		}
         	}
            $("#searchfield").keyup(function(){
               rechercher();
               });
                
      </script>
   </body>
</html>

