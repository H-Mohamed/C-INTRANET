<?php 
    if(isset($_COOKIE["U"])){ 
    ?>
    <style> #add{
      height: 50px;
      width: 50px;
      position: absolute;
      z-index: 5; 
      top: 175px;
      right: 5px;
      background: #D62929;
      border-radius: 90px;
      border:3px solid white; 
      }
      #add a{
      text-decoration:none!important;
      margin-left: 13.3px;
      cursor: pointer; 
      color: white;
      font-size: 33px;
      font-weight: 900;
      font-family: Exo-Light;
      }  
      a:hover,a:visited{color:white;
      text-decoration:none!important;
      }/*
        #bubble {
        position: fixed;
        z-index: 5;
        top: 175px;
        right: 55px;
        padding: 8px; 
        background: #d81a38;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        color:white;
        font-size:2rem;
        display: none;
        } 
        #bubble:after 
        {
        content: '';
        position: absolute;
        border-style: solid;
        border-width: 11px 0 11px 12px;
        border-color: transparent #d81a38; 
        display: none;
        width: 0;
        z-index: 1;
        right: -12px;
        top: 12px;
        }
        #add a:hover   #bubble{
            display: block!important;
        }
        #add:hover  #bubble:after{
            display: block;
        }
      */  
     </style>  
     <div id='add'>
       <!--div id='bubble'>
            Téleverser Un Document
        </div--> 
        <a href='upload.php'>+</a>
      </div> 
        <?php }
    ?>
<?php 
   include("includes/db.php"); 
   include("includes/functions.php");  
   $getLast_Doc=array(); 
   $getLast_Doc=Query_Array("SELECT * FROM `bibliotheque_document` ORDER BY `IDDOC` DESC LIMIT 5");
   $themes=Query_Array("SELECT * FROM `bibliotheque_theme`");
   $Theme=$themes[0]["THEME"];
   $getSousTheme=getSous_theme($Theme);
   $getTypes=getTypes();
   $SousTheme=$getSousTheme[0]["SOUS_THEME"];
   $page=1;
   $perpage=10;
   if(isset($_GET['page']))$page=$_GET['page'];
   if(isset($_GET['theme']))$Theme=$_GET['theme'];
   if(isset($_GET['soustheme']))$SousTheme=$_GET['soustheme'];
   if(isset($_GET['theme']) && !isset($_GET['soustheme'])){
       $Q_where="`THEME`='".$Theme."'";
       $SousTheme="";
    }
   else if(isset($_GET['theme']) && isset($_GET['soustheme'])) 
   $Q_where="`THEME`='".$Theme."' and `SOUS_THEME`='".$SousTheme."'";
   else {
       $Q_where="`THEME`='".$Theme."'";
       $SousTheme="";
   }
   $Documents=Query_Array("SELECT * FROM `bibliotheque_document` where ".$Q_where);
   $pages=ceil(count($Documents)/$perpage);
   $Page_suivant=$page+1;
   if($Page_suivant>$pages)$Page_suivant=$page;
   
   $Page_Precedent=$page-1;
   if($Page_Precedent<$pages && $Page_Precedent<=0)$Page_Precedent=$page;
   $Documents=Query_Array("SELECT * FROM `bibliotheque_document` where ".$Q_where." limit ".($page-1)*$perpage.",$perpage");
   
   ?>
<script>
   var Last_Doc = <?php echo json_encode($getLast_Doc); ?>;
</script>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="content-type" content="text/html; charset=UTF-8">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=dDOCice-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
      <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="css/style.css">
      <link href="css/font-css.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="../css/font-awesome.min.css">
      <script src="../js/jquery.js"></script>
      <script type="text/javascript" src="../js/moment.min.js"></script>
      <script type="text/javascript" src="../js/daterangepicker.js"></script>
      <link rel="stylesheet" type="text/css" href="../css/daterangepicker.css" />
      <style>
                .Rmullti{
            font-size: 13pt;
            font-family: calibri;
            color: #828181;
            }
            .selectme{
            width: auto;height: 35px;
            border: 1px solid #e7eaee!important;
            font-size: 14pt;
            font-family: calibri;
            color: #828181;   
            cursor:pointer;
            background: #fafafa url("img/icon-select.png") no-repeat 90% 50%;
            }
            .selectme:after{ 
            content:'<>';
            font:11px "Consolas", monospace;
            color:#000;
            z-index: 5;
            -webkit-transform:rotate(90deg);
            -moz-transform:rotate(90deg);
            -ms-transform:rotate(90deg);
            transform:rotate(90deg);
            right:8px; top:2px; 
            border-bottom:1px solid #ddd;
            position:absolute;
            }
            .selectme select{
            padding: 5px 8px;
            width: 130%;
            border: none;
            box-shadow: none;
            background: transparent;
            background-image: none;
            -webkit-appearance: none;
            box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
            }
            
                  .searchBox #datefield{
            height: 35px;
            width: 240px;
            padding-left: 5px;
            text-align: left;
            font-size: 14pt;
            font-family: calibri;
            border: 1px solid #e7eaee;
            color: #828181;
            background: #fafafa url("img/icon-select.png") no-repeat 90% 50%;
            }
            .searchBox #searchfield{
            padding-left: 20px;
            width: 270px!important;
            height: 35px;
            margin-left: 15px;
            text-align: left;
            font-size: 14pt;
            font-family: calibri;
            border: 1px solid #e7eaee;
            color: #828181;
            background: #fafafa url("img/icon-select.png") no-repeat 90% 50%;
            }
            .searchBox a{
            background-color: #d81a38;
            color: white;
            text-align: center;
            width: 35px;
            height: 35px;
            line-height: 32px;
            text-decoration: none !important;
            text-decoration-color: white;
            color: white !important;
            font-size: 15pt;
            }

                .searchBox{
                margin-top:30px;
            }
                 .imgT {
                 width: 94px;
                 height: 122px;
                 }
                 .imgOfActive {
                 width: 112px;
                 height: 156px;
                 }
                 .imgC {
                 width: 90%;
                 height: 174px;
                 }
                 .theme_active {
                 background-color: #d81a38;
                 color: #fff;
                 }
                 .SousThemes {
                 background: #3c3c3c!important;
                 border-bottom-right-radius: 20px!important;
                 margin-left: 10px!important;
                 margin-right: 10px!important;
                 border-bottom-left-radius: 20px!important;
                 display: block!important;
                 }
                 .SousThemes li {
                 border-top: 2px solid #2c2c2c;
                 }
                 .themes>li>a:hover {
                 background: #3c3c3c!important;
                 border-bottom: 3px solid #d81a38;
                 display: block!important;
                 color: white;
                 text-decoration: none;
                 }
                 .themes>li:hover ul {
                 background: #3c3c3c!important;
                 border-bottom-right-radius: 20px!important;
                 margin-left: 10px!important;
                 margin-right: 10px!important;
                 border-bottom-left-radius: 20px!important;
                 display: block!important;
                 border-bottom: 3px solid #d81a38;
                 }      

          </style>
   </head>
   <body cz-shortcut-listen="true">
      <?php include('header.html'); ?>
      <section style="margin-top:80px;" class="slider_biblio">
         <div class="container-fluid p-0">
            <div class="Title_Slider pull-right h-white">
               <h5>Nouveautés</h5>
            </div>
         </div>
         <div class="upcoming-slider">
            <div class="container">
               <div class="info-doc-detail h-white p-white">
                  <div class="bx-wrapper" style="max-width: 100%;">
                     <div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 230px;">
                        <div class="bx-wrapper" style="max-width: 100%;">
                           <div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 100%!important;">
                              <div class="release-doc-slider" style="width: 915%; position: relative; transition-duration: 0s;">
                                 <div class="item" style="float: left; list-style: outside none none; position: relative; width: 375px;">
                                    <?php
                                       if(count($getLast_Doc)>0)
                                       echo "<div class='detail'> <h5><a id='title_selected' href='document?id=".$getLast_Doc[0]["IDDOC"]."' title='".mb_substr($getLast_Doc[0]["NOMDOC"],0,56,'UTF-8')."'>".mb_substr($getLast_Doc[0]["NOMDOC"],0,56,'UTF-8')."</a></h5> <p id='desc_selected' style='padding-bottom: 20px;'>".mb_substr($getLast_Doc[0]["Description"],0,160,'UTF-8')." ...</p> <a href='Document.php?id=".$getLast_Doc[0]["IDDOC"]."' id='lire_selected' style='position: absolute; bottom: 0px; color: #fff;font-size: 25px;'>Lire la suite</a> </div> <div class='detail-img' style='/*! display: none; */margin: 40px 0 0 0;'> <img id='img_selected' class='imgOfActive' src='".$getLast_Doc[0]["Image"]."' alt=''> </div>";
                                       else echo "<h2 style='line-height: 225px;text-align: center;'>Aucun résultat correspondant à vos critères de recherche</h2>";
                                       ?>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="bar_nouveautés">
                  <?php
                     $first=true;
                     $cmp=0;
                     if(count($getLast_Doc)>0){
                     echo "<ul id='nouveau_docs' class='nouveau_docs'>";
                     foreach ($getLast_Doc as $value){
                        if(strlen($value["NOMDOC"])>10)
                        $nomD=mb_substr($value["NOMDOC"],0,10,'UTF-8')." ...";
                        else $nomD=$value["NOMDOC"];
                         if($first==true){
                               $first=false; 
                               echo "<li><a title='".$value["NOMDOC"]."' id='".$cmp."' onclick='showInfo(this.id)'  class='active'><span>".$nomD."</span><img class='imgT' src='".$value["Image"]."' alt=''>  <img class='b-shadow' src='img/b-shadow.png' alt=''></a></li>";
                            }else {
                                 echo "<li><a title='".$value["NOMDOC"]."' id='".$cmp."' onclick='showInfo(this.id)'  class=''><span>".$nomD."</span><img class='imgT' src='".$value["Image"]."' alt=''>  <img class='b-shadow' src='img/b-shadow.png' alt=''></a></li>";
                       
                          }
                       $cmp++;  
                     }
                     }else echo " <h2 style='text-align: center;line-height: 156px;margin-left: 80px;'>Aucun résultat correspondant à vos critères de recherche</h2>";
                     ?>
                  </ul>
               </div>
            </div>
         </div>
      </section>
      
      <div class="searchBox">
         <form action="search.php?">
            <table width="100%">
               <tbody>
                <tr> 
                <td style="padding: 0px 3px 0 0;">
                     <span  style="margin: 30px;" class="Rmullti">Rechercher un document  :</span> 
                     <input name="keyword" id="searchfield" placeholder="Mots Clés" type="text">
                </td>  
                <td  >
                    <input value="" class="fa fa-search selectme" style="margin: 10px 30px -10px -40px;width: 35px;height: 35px;background-image: url('../img/search.png');background-origin: border-box;background-size: 25px 25px;background-repeat: no-repeat;background-position-x: 5px;background-position-y: 5px;background-color: #D81A38;" type="submit">
                  </td>
                  <td>
                  
                     <span class="Rmullti">Date de mise en ligne :</span>
                     <input id="datefield" name="daterange" placeholder="Mots Clés"  value="01/01/2015 - 01/31/2015" type="text">
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
                                    "startDate": "01/01/2010",
                                    "endDate": "01/01/2039"
                                },
                                  function(start, end, label) {
                                 var datedebut= start.format('YYYY-MM-DD');
                                 var datefin= end.format('YYYY-MM-DD');
                                 var goto = "search.php?keyword=&DB="+datedebut+"&DF="+datefin; 
                              if (goto!=='') {
                                  window.location = goto;
                                    }
                                  }
                              );
                            
                        });
                                           
                     </script>
                  </td>
                  <td>
                     <span class="Rmullti">Trier Par :</span>
                     <select class="selectme" id="trier" style="width: 220px!important;">  
                     <script> 
                          $("#trier").change(function(){
                              var goto = $(':selected', this).val(); 
                              if (goto!=='') {
                                  window.location = goto;
                              } 
                          }); 
                     </script>
                         <option value="#" style="font-style: italic;font-weight: bold;">Ancienneté</option>
                        <option value="search.php?trier=0">Plus récent</option> 
                        <option value="search.php?trier=1">Plus ancien</option> 
                     </select>
                  </td>
                  <td>
                     <span class="Rmullti">Thème :</span>
                     <select class="selectme" id="theme" style="width: 220px!important;">
                        <script> 
                          $("#theme").change(function(){
                              var goto = $(':selected', this).val(); 
                              if (goto!=='') {
                                  window.location = goto;
                              } 
                          });
                     </script>
                              <option value='#'>Sélectionner un Thème</option>
                     <?php
                        if(count($themes)>0){
                            foreach($themes as $value){
                                echo "<option value='search.php?theme=".$value["THEME"]."'>".$value["THEME"]."</option>";
                            }
                        }
                     ?>
                     </select>
                  </td>
                  <td>
                     <span class="Rmullti">Sous Thèmes :</span>
                     <select class="selectme" id="theme" style="width: 220px!important;">
                        <script> 
                          $("#theme").change(function(){
                              var goto = $(':selected', this).val(); 
                              if (goto!=='') {
                                  window.location = goto;
                              } 
                          });
                     </script>
                              <option value='#'>Sélectionner un Thème</option>
                     <?php
                        if(count($themes)>0){
                            foreach($themes as $value){
                                echo "<option value='search.php?theme=".$value["THEME"]."'>".$value["THEME"]."</option>";
                            }
                        }
                     ?>
                     </select>
                  </td>
               </tr>
               <tr>
            </tr></tbody></table>
         </form>
      </div>
      <section class="documents-collection">
         <div class="container">
            <div class="row">
               <div id="documents-collections-tabs" >
                  <div class="col-lg-3 col-sm-12">
                     <div class="sidebar">
                        <h3 style="padding-top: 15px;text-align: center;">Rubriques</h3>
                        <ul id="themes" class="Themes" style="overflow-y: hidden">
                           <?php
                              if(count($themes)>0){
                                   $cmp=0;
                                         foreach($themes as $value){
                                               $getSousTheme=Query_Array("SELECT * FROM bibliotheque_sous_theme where `THEME`='".$value["THEME"]."'");
                                               if($value["THEME"]==$Theme){
                                                     echo "<li><a id=".$cmp." onclick='Show_SousTheme(this.id)' class='theme_active' href='?theme=".$value["THEME"]."' >".$value["THEME"]."</a>";
                                               }else echo "<li><a id=".$cmp." onclick='Show_SousTheme(this.id)' class='' href='?theme=".$value["THEME"]."' >".$value["THEME"]."</a>";
                                               if(count($getSousTheme)>0){
                                                     if($value["THEME"]==$Theme)
                                                     echo "<ul  style='display: none;'>";
                                                     else echo "<ul style='display: none;'>";
                                                     foreach($getSousTheme as $Svalue){
                                                      echo "<li ><a href='?theme=".$value["THEME"]."&soustheme=".$Svalue["SOUS_THEME"]."#themes' style='color: white;text-align: center;'>".$Svalue["SOUS_THEME"]."</a></li>";
                                                     }
                                                      echo "</ul>";
                                               }
                                               echo "</li>";
                                                 $cmp++;          
                                         }
                              }
                              ?>
                           <!--  <li><a class="theme_active" href="#" >Theme1</a></li>
                              <li><a href="#">Theme2</a></li>
                              <li><a href="#" >Theme3</a></li>
                              <li><a href="#" >Theme4</a></li>
                              <li><a href="#" >Theme5</a></li>
                              <li><a href="#" >Theme6</a></li>
                              <li><a href="#" class="theme-tabs">Theme7</a></li>-->
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-9 col-sm-12">
                     <div class="collection">
                        <div class="title-main-content">
                           <h3><?php echo $Theme; ?></h3>
                           <h3 style='margin-left: 20px;margin-right: 20px;color: #000;font-weight: bold;'>-</h3>
                           <h3 style='color: #4b4b4b;'><?php echo $SousTheme; ?></h3>
                        </div>
                     </div>
                     <div class="collection-content">
                        <ul>
                           <?php 
                              if(count($Documents)>0)
                                    foreach($Documents as $value){
                                          echo" <li> <div class='s-document'> <div class='s-document-img'> <img class='imgC' src='".$value["Image"]."' alt=''> <div class='s-document-hover'> <div class='position-center-x'> </a><a class='btn-1 sm shadow-0' data-toggle='modal' data-target='#quick-view' href='document?id=".$value["IDDOC"]."'>Lire la suite</a> </div> </div> </div> <h6><a href='document?id=".$value["IDDOC"]."' title='".$value["NOMDOC"]."' >".mb_substr($value["NOMDOC"],0,16,'UTF-8')."</a></h6> <span>".$value["DATEAJOUT"]."</span> </div> </li>";
                                    }
                              
                                    else echo"<h2 style='line-height: 555px;text-align: center;'>Aucun résultat correspondant à vos critères de recherche</h2>";
                              ?>
                        </ul>
                     </div>
                     <div class="pagination-pages">
                        <ul class="pagination">
                        <?php 
                              echo "<li><a  href='page=".$Page_Precedent."' >Précedent</a></li>";
                              for($i=1;$i<=$pages;$i++){
                                    if($page==$i){
                                    echo "<li class='active' ><a href='page=".$i."'>".$i."</a></li>";
                                    }
                                    else echo "<li><a href='page=".$i."'>".$i."</a></li>";
                              }
                              if($pages==0)  echo "<li class='active' ><a href='page=1'>1</a></li>";
                              
                              echo "<li><a  href='page=".$Page_suivant."' >Suivant</a></li>";
                              ?>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         </div>
      </section>
      <?php include('footer.html'); ?>
      <script>
         function showInfo(c) {
             var NDoc = document.querySelectorAll(".nouveau_docs li a");
             for (i = 0; i < NDoc.length; i++) {
                 if (NDoc[i].id != c) {
                     NDoc[i].classList.remove("active");
                 } else {
                     NDoc[i].classList.add("active");
                     if(Last_Doc[i]["NOMDOC"].length>56)
                     nom_doc=Last_Doc[i]["NOMDOC"].substr(0,56)+" ...";
                     else nom_doc=Last_Doc[i]["NOMDOC"].substr(0,56);
                     document.querySelector("#title_selected").innerHTML = nom_doc;
                     document.querySelector("#title_selected").href = Last_Doc[i]["CHEMIN"];
                     if(Last_Doc[i]["Description"].length>160)desc_doc=Last_Doc[i]["Description"].substr(0,160)+" ...";
                     else desc_doc=Last_Doc[i]["Description"].substr(0,160);
                     document.querySelector("#desc_selected").innerHTML = desc_doc;
                     document.querySelector("#img_selected").src = Last_Doc[i]["Image"];
                     document.querySelector("#lire_selected").href = "Document.php?id="+Last_Doc[i]["IDDOC"];
                 }
             }
         }
         
         function Show_SousTheme(c) {
             var NThemes = document.querySelectorAll(".themes>li>a");
             for (i = 0; i < NThemes.length; i++) {
                 if (NThemes[i].id != c) {
                     NThemes[i].classList.remove("theme_active");
                 } else {
                     NThemes[i].classList.add("theme_active");
                 }
             }
         }

                 var tagA = document.querySelectorAll(".pagination a");
        for(i=0;i<tagA.length;i++){
            if(tagA[i].id!="lire_selected"){
            var parameter=tagA[i].getAttribute("href").split("=");
            tagA[i].href=addParameter(window.location.href,parameter[0],parameter[1],false);
            }
        }
         function addParameter(url, parameterName, parameterValue, atStart/*Add param before others*/){
    replaceDuplicates = true;
    if(url.indexOf('#') > 0){
        var cl = url.indexOf('#');
        urlhash = url.substring(url.indexOf('#'),url.length);
    } else {
        urlhash = '';
        cl = url.length;
    }
    sourceUrl = url.substring(0,cl);

    var urlParts = sourceUrl.split("?");
    var newQueryString = "";

    if (urlParts.length > 1)
    {
        var parameters = urlParts[1].split("&");
        for (var i=0; (i < parameters.length); i++)
        {
            var parameterParts = parameters[i].split("=");
            if (!(replaceDuplicates && parameterParts[0] == parameterName))
            {
                if (newQueryString == "")
                    newQueryString = "?";
                else
                    newQueryString += "&";
                newQueryString += parameterParts[0] + "=" + (parameterParts[1]?parameterParts[1]:'');
            }
        }
    }
    if (newQueryString == "")
        newQueryString = "?";

    if(atStart){
        newQueryString = '?'+ parameterName + "=" + parameterValue + (newQueryString.length>1?'&'+newQueryString.substring(1):'');
    } else {
        if (newQueryString !== "" && newQueryString != '?')
            newQueryString += "&";
        newQueryString += parameterName + "=" + (parameterValue?parameterValue:'');
    }
    return urlParts[0] + newQueryString + urlhash;
};
      </script>
   </body>
</html>

