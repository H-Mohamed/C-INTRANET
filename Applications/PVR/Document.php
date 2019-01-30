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
    	<!-- include jQuery + carouFredSel plugin -->
		<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" language="javascript" src="jquery.carouFredSel-6.2.1-packed.js"></script>

		<!-- optionally include helper plugins -->
		<script type="text/javascript" language="javascript" src="helper-plugins/jquery.mousewheel.min.js"></script>
		<script type="text/javascript" language="javascript" src="helper-plugins/jquery.touchSwipe.min.js"></script>
		<script type="text/javascript" language="javascript" src="helper-plugins/jquery.transit.min.js"></script>
		<script type="text/javascript" language="javascript" src="helper-plugins/jquery.ba-throttle-debounce.min.js"></script>
		<script type="text/javascript" language="javascript">
			$(function() {
				//	Basic carousel + timer, using CSS-transitions
				$('#foo1').carouFredSel({
					auto: {
						pauseOnHover: 'resume',
						progress: '#timer1'
					}
				}, {
					transition: true
				});

			});
		</script>
    <style>
        .imgT {
            width: 94px;
            height: 122px;
        }

        .imgOfActive {
            width: 112px;
            height: 156px;
        }

        .imgC {
            height: 90%;
            width: 90%;
        }

        .text-white {
            color: white;
        }

        .details {
            text-align: justify;
            text-justify: inter-word;
        }

        .center {
            display: block!important;
            margin: 0 auto!important;
            padding: 10px 20px !important;
        }

        .info-doc-keywords {
            background: rgba(0, 0, 0, 0.2);
            padding: 7px 20px;
            margin: -20px 0 20px 0;
            color: white;
            border-radius: 30px 30px 30px 0px;
            min-width: 20%;
            max-width: 40%;
            display: block;
            clear: both;
        }

        .info-doc-detail {
            background: #D81A38;
            padding: 17px 30px;
            border-radius: 30px 30px 0 30px;
            margin: -10px 0 -20px 0;
            position: relative;
            width: 58.2%;
            float: left;
        }

        .bar_nouveautés {
            padding: 20px 0 0 0;
            float: right;
            width: 100%;
        }

        #TopBar {
            height: 55px;
            width: 100%;
            display: inline-block;
        }

        #TopBar>a>img {
            max-height: 50px;
            margin-left: 10px;
            max-width: 300px;
        }

        #TopBar #Connecter {
            float: right;
            line-height: 55px;
            margin-right: 37px;
            margin-top: -45px;
            font-size: 14pt;
            color: #d81a38;
            font-family: Calibri;
            font-weight: 500;
        }

        #Actualite {
            position: relative;
            padding-top: 5px;
            height: 30px;
            padding-bottom: 5px;
            margin-bottom: -5px;
            line-height: 30px;
            box-shadow: 0px 0px 5px 5px rgba(255, 255, 255, 0.2);
            width: 100%;
            background-color: #d81a38;
            display: flex;
            height: 40px;
        }

        #Actualite>a {
            margin-left: 20px;
            margin-right: 20px;
            color: white;
            font-size: 15pt;
            font-family: Exo-Light;
        }

        #Actualite>div {
            display: inline-block;
        }

        #Actualite>div>i {
            color: white;
            line-height: 30px;
            font-size: 16pt;
            margin-left: 10px;
        }

        span {
            color: black;
            padding-left: 5px;
            font-weight: bolder;
        }

        .container {
            padding-top: 10px;
        }

        table {
            width: 100%;
            min-height: 500px;
            background: #e6e6e6;
            color: dimgray;
            margin-bottom: 90px;
        }

        tr {
            line-height: 20px;
        }

        .title {
            padding: 0px 40px!important;
            line-height: 10px;
            font-weight: 600;
            font-size: 1.8rem;
            color: white;
            background: #D81A38;
        }

        .imgs {
            max-width:50px;
            height: 100%;
            padding: 0px 5px; 
            margin: 0;
            background: white;
        }
    
        
        .image{
            width:550px;
            margin: 0 auto;
            height:300px;
        }
        tr,td{
            height: 30px;
        }
        tr td:first-child {
            padding: 0 10px;
            min-width:0px;
            max-width:0px;
            border-right:1px solid rgba(105, 105, 105, 0.39);
        }

        .download {
            cursor: pointer;
            background: #2a9a16;
            padding: 0px!important;
            line-height: 20px!important;
            height: 30px;
            text-align: center!important;
            color: white!important;

        }
           .list_carousel {  
				min-width: 400px;
               margin-top: -60px!important;
			}
			.list_carousel ul {
				margin: 0;
				padding: 0;
				list-style: none;
				display: block;
			} 
			.list_carousel.responsive {
				width: auto;
				margin-left: 0;
			}  
			.timer {
				background-color: #999;
				height: 6px;
				width: 0px;
			}

    </style>
</head>
<body cz-shortcut-listen="true">
    <?php include('header.php'); ?>
    <div class="container">
        <table>
            <tr>
                <td class="title" colspan="3">
                    TitreTitreTitr eTit reTitreTitreTitreTi treTitreTitreTitreT itreTitreTitr eTitreTitreTitreTitreTitre TitreTitreTitre</td>
                <tr>
                    <td>
                        Details</td>
                    <td>Infos </td>
                    <td class='imgs' rowspan="7">
                        <div class="list_carousel" style="position:relative;bottom:0">
                            <div class="caroufredsel_wrapper" style="display: block; text-align: start;  position: relative; width: 100%; height:   300px; margin: 0px; overflow: hidden;">
                                <ul id="foo1" style="text-align: left; float: none; position: absolute; top: 0px; right: auto; bottom: auto; left: 0px; margin: 0px; width: 2232px; height: 72px; z-index: auto;">
                                    <li><img class="image" src="images/003.jpg"></li>
                                    <li><img class="image" src="images/006.jpg"></li>
                                    <li><img class="image" src="images/004.jpg"></li>
                                    <li><img class="image" src="images/006.jpg"></li>
                                    <li><img class="image" src="images/003.jpg"></li> 
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                            <div id="timer1" class="timer" style="width: 100%;"></div>
                        </div>

                    </td>
                </tr>
                <tr>
                    <td>
                        Details</td>
                    <td>Infos </td>

                </tr>
                <tr>
                    <td>
                        Details</td>
                    <td>Infos </td>

                </tr>
                <tr>
                    <td>
                        Chargé de Suivi</td>
                    <td>Infos </td>

                </tr>
                <tr>
                    <td>
                        Details</td>
                    <td>Infos </td>

                </tr>
                <tr>
                    <td>
                        Details</td>
                    <td>Infos </td>

                </tr>
                <tr>
                    <td class="download" colspan="3">
                        Telecharger</td>
                </tr>
        </table>
    </div>
    <?php include('footer.html'); ?>
    <script>
        function showInfo(c) {
            var NDoc = document.querySelectorAll(".nouveau_docs li a");
            for (i = 0; i < NDoc.length; i++) {
                if (NDoc[i].id != c) {
                    NDoc[i].classList.remove("active");
                } else NDoc[i].classList.add("active");
            }
        }

    </script>
</body>

</html>
