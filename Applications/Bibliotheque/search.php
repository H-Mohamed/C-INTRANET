<?php 
   include("includes/db.php"); 
   include("includes/functions.php");  
   $getLast_Doc=array(); 
   $getLast_Doc=Query_Array("SELECT * FROM `bibliotheque_document` ORDER BY `IDDOC` DESC LIMIT 5");
   $getTypes=getTypes();
   $keyword="";
   $page=1; 
   $trier="";   
   $type="";
   $perpage=10;
   $dateDebut="01/01/2018";
   $datefin="01/01/2019";
   if(isset($_GET['DB']))$dateDebut=$_GET['DB'];
   if(isset($_GET['DF'])) $datefin=$_GET['DF'];
   if(isset($_GET['page']))$page=$_GET['page'];
   if(isset($_GET['keyword']))$keyword=$_GET['keyword'];
   if(isset($_GET['trier'])){
       $trier=$_GET['trier'];
       if($trier==0)$trier="ORDER BY `DATEAJOUT` DESC";
       else if($trier==1)$trier="ORDER BY `DATEAJOUT` ASC";
   }
   if(isset($_GET['type'])){
    $type=$_GET['type'];
    $type="and `TYPE`='".$type."'";
}
   $keywords="'%".str_replace(",","%' or `KEYWORDS` LIKE '%",$keyword)."%'";
   if(isset($_GET['DF']) && isset($_GET['DB']))$Query_date="and `DATEAJOUT` BETWEEN '".$dateDebut."' and '".$datefin."'";
   else $Query_date="";
   $Documents=Query_Array("SELECT * FROM `bibliotheque_document` where (`KEYWORDS` LIKE ".$keywords." or `NOMDOC` LIKE '%".$keyword."%') ".$Query_date." ".$type."  ".$trier);
   $pages=ceil(count($Documents)/$perpage);
   $Page_suivant=$page+1;
   if($Page_suivant>$pages)$Page_suivant=$page;
   $Page_Precedent=$page-1;
   if($Page_Precedent<$pages && $Page_Precedent<=0)$Page_Precedent=$page;
   $Documents=Query_Array("SELECT * FROM `bibliotheque_document` where (`KEYWORDS` LIKE ".$keywords." or `NOMDOC` LIKE '%".$keyword."%') ".$Query_date." ".$type." ".$trier." limit ".($page-1)*$perpage.",$perpage");
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
    width: auto;
    padding-left: 20px;
    text-align: left;
    font-size: 14pt;
    font-family: calibri;
    border: 1px solid #e7eaee;
    color: #828181;
    background: #fafafa url("img/icon-select.png") no-repeat 90% 50%;
    }
    .searchBox #searchfield{
    padding-left: 20px;
    width: 250px!important;
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
                                       echo "<div class='detail'> <h5><a id='title_selected' href='".$getLast_Doc[0]["CHEMIN"]."' title='".mb_substr($getLast_Doc[0]["NOMDOC"],0,56,'UTF-8')."'>".mb_substr($getLast_Doc[0]["NOMDOC"],0,56,'UTF-8')."</a></h5> <p id='desc_selected' style='padding-bottom: 20px;'>".mb_substr($getLast_Doc[0]["Description"],0,160,'UTF-8')." ...</p> <a href='Document.php?id=".$getLast_Doc[0]["IDDOC"]."' id='lire_selected' style='position: absolute; bottom: 0px; color: #fff;font-size: 25px;'>Lire la suite</a> </div> <div class='detail-img' style='/*! display: none; */margin: 40px 0 0 0;'> <img id='img_selected' class='imgOfActive' src='".$getLast_Doc[0]["Image"]."' alt=''> </div>";
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
               <tbody><tr>
                  <td>
                     <input name="keyword" value="<?php echo $keyword; ?>" id="searchfield" placeholder="RECHERCHER" type="text">
                    </td>
                  <td><input value="" class="fa fa-search selectme" style="margin: auto 30px auto -30px;width: 35px;height: 35px;background-image: url('../img/search.png');background-origin: border-box;background-size: 25px 25px;background-repeat: no-repeat;background-position-x: 5px;background-position-y: 5px;background-color: #D81A38;" type="submit">
                  </td>
                  <td>
                     <span class="Rmullti">DATE EVENEMENT :</span>
                     <input id="datefield"  type="text">
                     <script type="text/javascript">
                        $(function() { 
                            $('#datefield').daterangepicker({
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
                              //   Thref=window.location.href.split("?");
                                //    if(Thref.length>1)
                                   // var goto ="?"+Thref[1]+"&DB="+datedebut+"&DF="+datefin; 
                                 //   else var goto =Thref+"?DB="+datedebut+"&DF="+datefin; 
                                 var goto = "search.php?keyword=&DB="+datedebut+"&DF="+datefin; 

                              if (goto!=='') {
                                  window.location = goto;
                                 // console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
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
                     <option value="#" style="font-style: italic;font-weight: bold;">Ancien ou Récent</option>
                        <option value="trier=0">Plus récent</option> 
                        <option value="trier=1">Plus ancien</option> 
                     </select>
                  </td>
                  <td>
                     <span class="Rmullti">Type :</span>
                     <select class="selectme" id="type" style="width: 220px!important;">
                     <script> 
                          $("#type").change(function(){
                              var goto = $(':selected', this).val(); 
                              if (goto!=='') {
                                  window.location = goto;
                              } 
                          }); 
                     </script>
                     <option value='#'>Sélectionner un type</option>
                     <?php
                        if(count($getTypes)>0){
                            foreach($getTypes as $value){
                                echo "<option value='type=".$value["TYPE"]."'>".$value["TYPE"]."</option>";
                            }
                        }
                     ?>
                        
                     </select>
                  </td>
               </tr><tr>
            </tr></tbody></table>
         </form>
      </div>
      <section class="documents-collection">
         <div class="container">
            <div class="row">
               <div id="documents-collections-tabs">
            
                  <div style="width: 100%!important;" class="col-lg-9 col-sm-12">
                     <div class="collection">
                        <div class="title-main-content">
                           <h3>Recherche</h3>
                           <h3 style='margin-left: 20px;margin-right: 20px;color: #000;font-weight: bold;'>-</h3>
                           <h3 style='color: #4b4b4b;'><?php echo $keyword; ?></h3>
                        </div>
                     </div>
                     <div style="height: auto!important;" class="collection-content">
                        <ul>
                           <?php 
                              if(count($Documents)>0)
                                    foreach($Documents as $value){
                                          echo" <li style='width: 13.5% !important;'> <div class='s-document'> <div class='s-document-img'> <img class='imgC' src='".$value["Image"]."' alt=''> <div class='s-document-hover'> <div class='position-center-x'> </a><a class='btn-1 sm shadow-0' data-toggle='modal' data-target='#quick-view' href='#'>Lire la suite</a> </div> </div> </div> <h6><a href='Document.php?id=".$value["IDDOC"]."' title='".$value["NOMDOC"]."' >".mb_substr($value["NOMDOC"],0,16,'UTF-8')."</a></h6> <span>".$value["DATEAJOUT"]."</span> </div> </li>";
                                    }
                              
                                    else echo"<h2 style='line-height: 555px;text-align: center;'>Aucun résultat correspondant à vos critères de recherche</h2>";
                              ?>
                        </ul>
                     </div>
                     <div class="pagination-pages" style="text-align: center!important;" >
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
         
        var tagA = document.querySelectorAll(".pagination a");
        for(i=0;i<tagA.length;i++){
            if(tagA[i].id!="lire_selected"){
            var parameter=tagA[i].getAttribute("href").split("=");
            tagA[i].href=addParameter(window.location.href,parameter[0],parameter[1],false);
            }
        }
        var tagS = document.querySelectorAll(".selectme option");
        for(i=0;i<tagS.length;i++){
            var parameter=tagS[i].getAttribute("value").split("=");
            tagS[i].setAttribute("value",addParameter(window.location.href,parameter[0],parameter[1],false));
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

