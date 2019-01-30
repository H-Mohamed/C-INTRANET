<?php 
include("includes/db.php"); 
include("includes/functions.php");  
$set=false;
$getLast_Doc=Query_Array("SELECT * FROM `bibliotheque_document` ORDER BY `IDDOC` DESC LIMIT 6");
 if(isset($_GET['id'])){
     $iddoc = ctype_digit($_GET['id']) ? intval($_GET['id']) : null;
     if ($iddoc !== null)
     {
         $set=true;
         $doc=get_document($iddoc);
     }
 }

?>
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
   <style>   
      .imgT{
      width: 94px;
      height: 122px;
      }     
      .imgOfActive{
      width: 112px;
      height: 156px;
      }
      .imgC{
      height: 90%;
      width: 90%;
      }  
      .text-white{
         color:white;
      }
      .details{
         text-align: justify;
         text-justify: inter-word;
      } 
      .center{
          display:block!important;
          margin:0 auto!important; 
          padding:10px 20px !important;
      }
      .info-doc-keywords{ background: rgba(0,0,0,0.2); padding: 7px 20px;margin: -20px 0 20px 0 ;color:white;
          border-radius: 30px 30px 30px 0px;min-width:20%;max-width: 40%;display:block;clear:both;}  
      .info-doc-detail{ background: #D81A38; padding: 17px 30px;
          border-radius: 30px 30px 0 30px; margin: -10px 0 -20px 0 ;
           position: relative; width: 58.2%; float: left;}  
    .bar_nouveautés{ padding: 20px 0 0 0; float: right; width: 100%;}
 #TopBar{
 height: 55px;
 width: 100%;
 display:inline-block;  
 }
 #TopBar>a>img{
 max-height: 50px;
 margin-left: 10px;
 max-width:300px; 
 } 
 #TopBar #Connecter{ 
 float:right;
 line-height: 55px;
 margin-right: 37px;
 margin-top: -45px;
 font-size:14pt;
 color: #d81a38;
 font-family:Calibri;
 font-weight:500;
 }   #Actualite{
 position: relative;
 padding-top: 5px;
 height: 30px;
 padding-bottom: 5px;
 margin-bottom: -5px;
 line-height: 30px;
 box-shadow:0px 0px 5px 5px rgba(255,255,255,0.2);
 width: 100%;
 background-color: #d81a38;
 display: flex;
 height: 40px;      
 }
 #Actualite>a{
 margin-left: 20px;
 margin-right: 20px;
 color: white;
 font-size: 15pt;
 font-family: Exo-Light;
 }
 #Actualite>div{
 display:inline-block;
 }
 #Actualite>div>i{
 color: white;
 line-height: 30px;
 font-size: 16pt;
 margin-left: 10px;
 }
 span{
     color:black;
     padding-left:5px;
     font-weight:bolder;
 } 
    </style>
</head>
<body cz-shortcut-listen="true">
<?php include('header.php'); ?> 
   <section style="margin-top:0px;" class="slider_biblio">
      <div class="container-fluid p-0">
         <div class="Title_Slider pull-left  h-white ">
            <h5><?php if($set) echo  $doc[0]["TYPE"];?> | <?php if($set) echo  $doc[0]["NOMDOC"]; ?></h5>
         </div>
      </div>
      <div  style="padding:10px 0 0px 0;">
         <div class="container">
             <div>
                 <h5 style="margin:0px 0 5px 0;"><?php if($set) echo  $doc[0]["THEME"];?>  > <?php if($set) echo  $doc[0]["SOUS_THEME"];?>  </h5>
                 <br>
                 <div class="info-doc-keywords" style="padding:5px;">
                 <h4 style="display:inline">Ajouté le : </h4>
                 <span><?php if($set) echo  $doc[0]["DATEAJOUT"];?> </span>
              </div> 
             </div>
           <div class="info-doc-detail col-12 details text-white" style="max-height:385px;overflow-y:auto;overflow-x:hidden;" >  
           <?php if($set) echo  $doc[0]["Description"];?> 
             </div> 
                <div class="pull-right" style="margin-top:-20px;margin-bottom:0px;box-shadow: 5px 5px #CCC, 10px 10px #DDD, 15px 15px #EEE;">
                    <a href="<?php if($set) echo  $doc[0]["CHEMIN"];?> "> <img style="max-width:300px!important;min-width:200px!important" src="<?php if($set) echo  $doc[0]["Image"];?> " ></a>
                 </div>
                 <div class="info-doc-keywords">
                 <h4 style="display:inline">Mots Clès</h4>
                 <span  ><?php if($set) echo  $doc[0]["KEYWORDS"];?> </span> 
             </div> 
            </div>
      </div>
      <div  class="Title_Slider pull-left h-white">
            <h5>D'autres documents qui peuvent vous intéresser</h5>
         </div>
       <div style="margin-bottom:6%;" class="upcoming-slider">
         <div class="container"> 
            <div class   ="bar_nouveautés pull-left">
               <ul id="nouveau_docs" class="nouveau_docs pull-left" > 
               <script>
               var Last_Doc = <?php echo json_encode($getLast_Doc); ?>;
               </script>
             <?php
                $first=true;
                $cmp=0;
                if(count($getLast_Doc)>0){ 
                foreach ($getLast_Doc as $value){
                   if(strlen($value["NOMDOC"])>10)
                   $nomD=mb_substr($value["NOMDOC"],0,10,'UTF-8')." ...";
                   else $nomD=$value["NOMDOC"];
                    if($first==true){
                          $first=false; 
                          echo "<li><a href='document?id=".$value["IDDOC"]."' title='".$value["NOMDOC"]."' id='".$cmp."' onclick='showInfo(this.id)'  class='active'><span>".$nomD."</span><img class='imgT' src='".$value["Image"]."' alt=''>  <img class='b-shadow' src='img/b-shadow.png' alt=''></a></li>";
                       }else {
                            echo "<li><a href='document?id=".$value["IDDOC"]."' title='".$value["NOMDOC"]."' id='".$cmp."' onclick='showInfo(this.id)'  class=''><span>".$nomD."</span><img class='imgT' src='".$value["Image"]."' alt=''>  <img class='b-shadow' src='img/b-shadow.png' alt=''></a></li>";
                  
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
   
<?php include('footer.html'); ?>
   <script>function showInfo(c){
            var NDoc=document.querySelectorAll(".nouveau_docs li a");
            for(i=0;i<NDoc.length;i++){
                  if(NDoc[i].id!=c){
                        NDoc[i].classList.remove("active");
                  }else NDoc[i].classList.add("active");
            }
      }
      </script>
 </body>
</html>
