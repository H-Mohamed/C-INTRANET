   <?php 
    $con = mysqli_connect("localhost","root","","ccis_agenda") ;
    mysqli_set_charset($con, 'utf8') or trigger_error(mysqli_error($con)); 
    function mois($m){
            $mn='';
                switch($m){
                        case    1:$mn='Janvier';break;
                        case    2:$mn='Février';break;
                        case    3:$mn='Mars';break;
                        case    4:$mn='Avril';break;
                        case    5:$mn='Mai';break;
                        case    6:$mn='Juin';break;
                        case    7:$mn='Juiellt';break;
                        case    8:$mn='Aout';break;
                        case    9:$mn='Septembre';break;
                        case   10:$mn='Octobre';break;
                        case   11:$mn='Novembre';break;
                        case   12:$mn='Décembre';break;
                    }
                                return $mn;
                }
    $query='select * from evenement where idevenement='.$_GET["numeroE"].' limit 1';
    $result = mysqli_query($con,$query); 

    if(mysqli_num_rows($result)){
    $E = mysqli_fetch_assoc($result);
    $query='SELECT emp.MATRICULEEMPLOYE,emp.NOMEMPLOYE as NEMP, emp.PRENOMEMPLOYE as PEMP FROM employe AS emp INNER JOIN (SELECT MATRICULEEMPLOYE FROM affecter WHERE idevenement='.$_GET["numeroE"].' and ROLE="CHARGESUIVI" ORDER BY MATRICULEEMPLOYE DESC LIMIT 1) as v2 ON emp.MATRICULEEMPLOYE = v2.MATRICULEEMPLOYE ORDER BY RAND() LIMIT 1';
    $result = mysqli_query($con,$query); 
    $ChS = mysqli_fetch_assoc($result);

    $query='SELECT emp.MATRICULEEMPLOYE,emp.NOMEMPLOYE as NEMP, emp.PRENOMEMPLOYE as PEMP FROM employe AS emp INNER JOIN (SELECT MATRICULEEMPLOYE FROM affecter WHERE idevenement='.$_GET["numeroE"].' and ROLE="Participants" ORDER BY MATRICULEEMPLOYE DESC ) as v2 ON emp.MATRICULEEMPLOYE = v2.MATRICULEEMPLOYE ORDER BY RAND();';
    $result = mysqli_query($con,$query);  
    $date = DateTime::createFromFormat("Y-m-d",$E["DATEDEBUTEV"]);
    $Y= $date->format("Y");
    $M= mois($date->format("m"));
    $D= '&nbsp;Le &nbsp;&nbsp;'.$date->format("d").'&nbsp;&nbsp; /&nbsp;&nbsp; '.$M.' &nbsp;&nbsp;/&nbsp;&nbsp; '.$Y;				
    ?> 
    <!DOCTYPE html>	
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php echo $E["TITREEVENEMENT"];?>  - CCIS</title>
        <meta name="author" content="Stagiaires TDI 201 TASSILA Promotion 2016-2018(Mr. MOHAMED HARIR & Mr. MOHAMED AMINE DERRAGH)">
        <link rel="stylesheet" href="../css/font-awesome.min.css">   
        <link rel="stylesheet" href='../css/pure-css-select-style.css'>
        <link rel="stylesheet" href='../css/home.css'> 
    <link rel="stylesheet" href="../css/bootstratp-min.css"  >
        <link rel="stylesheet" href="../css/w3.css">
        <script src="../js/bootstrap-min.js"></script>
    <style>
        p{z-index: 3;}
                #Actualite{
                position:relative;
                padding-top: 5px;
                height: 40px;
                padding-bottom:5px;
                line-height: 30px;
                    width: 100%;
                background-color: #d81a38;
            display:flex;         
    }
            #Actualite>a{
                margin-left: 10px;
                margin-right:37px;
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
            }  footer {
                /* color bckd 81a38  */
            background-color:#d81a38 ;
            margin:0px 0 0 0;
            }
        .printlogo{ 
                display: none!important;
        }
        @media print {
            html,body {
            margin: 0!important 28px!important 12px!important 0!important;
            }
            .event .details{
                overflow: visible;
            }
            .details .right{
                background:rgba(216, 26, 56,.4);
            }
            dt {  
            background:  linear-gradient(to right,rgba(255, 255, 255, .9),rgba(216, 26, 56, .4),rgba(216, 26, 56, .5));
            font: bold 18px/31px Helvetica, Arial, sans-serif;
            margin: 0;
            border-left: 2px solid black;  
            position: relative;
            top:-1px;
            width: 99%; 
            }
            header,.download,.print, footer{
                display: none!important;
            }
            .printlogo{ 
                display: block!important;
                opacity:.4;
                width:70%;
                margin:auto 10px auto 20px;
            }
            dt{
                color:blue;
                padding-left:13px ;
            }
            .photo{
                 display:block!important;
            height:300px ;
            width:380px;}
                }
            }
        </style>
    </head>
    <body>
        <?php include("header.php")?> 
        <div class="event container" style='margin-bottom:50px;position: relative;z-index: 0;'>
        <div class="printlogo"><img src="../img/logo.png" width='500px' alt="printlogo"  style='margin-bottom:50px;'></div>
        <div class='download'> <img src="../img/it-paper.png" width='65px' alt="Imprimer" onclick="window.print();"></div>
                <div class='print' onclick="document.getElementById('id01').style.display='block';"> <img src="../img/it-pdf.png" width='65px' alt='Pdf' ></div> 
            <div class='details'>
                <div class="left">
                    <div class='date'>
                        <img src="../img/icon_events.png">
                            <h3> <?php echo $D;?> </h3>
                    </div>
                    <div class='titre'>
                        <h2> <?php echo $E["TITREEVENEMENT"];?>  </h2>
                    </div>
            <?php if($E["IMAGE"]!=""){?>
            <div>
                <center><img class='photo' height='400px' width="630px" src='<?php echo $E["IMAGE"];  ?>'></center>
            </div>
            <?php } ?>
                    <div class='Commentaires' style="z-index: 0;">
                    <p><?php echo $E["COMMENTAIRE"];?></p>
                    </div>
            </div>
            <div class='right'>
                        
                    <dt>Heure</dt>
                            <dd> <?php echo $E["HEUREVENEMENT"];?> </dd> 
                    <dt>Lieu</dt>
                    <dd> <?php echo $E["LIBELLEVILLE"];?></dd>
                            <dd> <?php echo $E["LIBELLELIEU"];?> </dd> 
                        <dt>
                            Département Concerné
                        </dt>
                            <dd> <?php echo $E["LIBELLEDEPARTEMENT"];?></dd>
                        <dt >
                            Chargé de Suivi
                        </dt>
                            <dd> <?php echo $ChS["NEMP"].'&nbsp&nbsp'.$ChS["PEMP"];?></dd>
                        <dt> Représentants </dt>
                <?php
                while($row = mysqli_fetch_assoc($result)){
                echo '<dd>'.$row["NEMP"].'&nbsp&nbsp'.$row["PEMP"].'</dd>';
                }
                ?>
                            
                
                
                </div> 
            </div>
        </div>
        <div style="" id="id01" class="w3-modal">
        <div style="height:300px; width:400px; border-radius:20px;" class="w3-modal-content w3-animate-zoom">
        <div class="w3-container"style="text-align:center; margin-top:50px; ">
            <span onclick="document.getElementById('id01').style.display='none'" style="font-size:20px;font-family:calibri;color:#D81A38;" id="close" class="w3-button w3-display-topright">&times;</span>
                    <img style="margin-top:50px; " src="../img/coming soon.png">
                    <p style="font-size:23px;font-family:calibri;text-shadow: 0px 0px 1px #424242;"> Désolé, Fonctionnalité en Cours de Construction. Essayez d'imprimer dans un fichier</p>
        </div>
        </div>
        </div> 
        <footer style="z-index: 5;">
            <div style="margin-top: 16px;">
                <span>  CCIS SM Internet
                </span>
                <span> Conditions Génerales
                </span>
                <span> Agenda
                </span> 
        </div>
            <img style="margin-top: -63px;" src="../img/logo_Buttom.png" >
            <div style="margin-top: 16px;">
                <span> Sous-Iktisad
                </span>
                <span> Centre d'aide
                </span>
                <span> Contacter-Nous
                </span> 
            </div>
        </footer>
        </body>
    </html>

    <?php mysqli_close($con);
    }
    else echo '<META http-equiv="refresh" content="0;URL=index.php">';

    ?>