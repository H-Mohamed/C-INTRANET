			<?php
				session_start();
				$conn=mysqli_connect("localhost","root","","ccis_agenda") ;
			$queryUTF="set names 'utf8'";
           mysqli_query($conn,$queryUTF) or die(mysqli_error()."[".$queryUTF."]");
			if(isset($_COOKIE["U"])){ 
				function runQuery($query) { 
					$result = mysqli_query($GLOBALS['conn'],$query);
				/*	while($row= mysqli_fetch_assoc($result)) {
						$resultset[] = $row;
					}*/
				while ($row = mysqli_fetch_assoc($result)) {
			   $resultset[] = $row;
			}
					if(!empty($resultset))
						return $resultset;
				}
				//$departs_array = $db_handle->runQuery("SELECT * FROM  `departement` BY id ASC");
				$my_query="SELECT * FROM lieu";
				$lieu_array   = runQuery($my_query);
				$my_query="SELECT * FROM ville";
				$ville_array  = runQuery($my_query); 
				$my_query="SELECT * FROM nature_evenement";
				$nature_array = runQuery($my_query); 
				$my_query="SELECT * FROM employe";
				$employe_array   = runQuery($my_query);
			?>
			<html> 
				<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta http-equiv="X-UA-Compatible" content="ie=edge"> 
				<title><?php echo $_COOKIE["U"];?> | AJOUTER UN EVENEMENT - CCIS</title>
				  <meta name="author" content="Stagiaires TDI 201 TASSILA Promotion 2016-2018(Mr. MOHAMED HARIR & Mr. MOHAMED AMINE DERRAGH)">
				<link rel="stylesheet" href="../css/font-awesome.min.css">   
				<link rel="stylesheet" href='../css/pure-css-select-style.css'>
			   <link rel="stylesheet" href="../css/bootstratp-min.css"  >
			   <script src="../js/bootstrap-min.js"></script>
			<script src="../js/jquery321.js"></script>
			<link rel="stylesheet" href='../css/home.css'> </head>
		
		
		<style>
			#Agenda_Ajouter{
						background-color: rgba(245,243,243,0.2);
			width: 100%;
			min-height: 800px;
			height: 100%;
			}
			td{
				padding:10px;
			}
			textarea,input[type="text"]{
			background-color: gray;
			width: 300px;
			box-shadow: 0px 0px 3px 0 rgba(0, 0, 0, 0.308);
			color: #a3a3a3;
			background-color: rgb(255, 255, 255);
			height: 40px;
			}
			select, input{
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
			 select{ 
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
			
			} form table  select:hover,
			 form table input[type="date"]:hover,
				form table input[type="checkbox"]:hover,
				form table input[type="time"]:hover{
			cursor: pointer;
			}
			 form table input:focus,
				form table  select:focus{
			box-shadow: 0px 0px 5px 0 rgba(25, 121, 210, 0.719);
			}
			 form table{
			width: 90%;
			margin: auto;
			margin-top:10px;
			}
			 form table td:first-of-type{
			width: 150px;
			}
			
					#Actualite{
						height:40px!important;
						min-height: 30px!important;line-height: 30px!important;        
			}
			 #Actualite{
						 position:relative;
						padding-top: 5px;
						height: 30px;
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
					}
		</style>
	<body> 
			<?php include("header.php")?> 
			<div  class="container" id="Agenda_Ajouter" style='margin-top:10px'>
			 <h3><img src="../img/DEPICO.png"> Département: &nbsp;<?php echo $_COOKIE["U"];?> | Ajouter un Evenement </h3>
								<form action="insert.php" method="POST"  enctype="multipart/form-data" style="min-height: 850px;">
									<table  cellspacing="60" > 
										<?php
										if(isset($_GET["success"])){ 
										 if(intval($_GET["success"],10)==1) echo'<tr class="alert-success"><td colspan=4><center>Bien Ajouté</center></td></tr>';
										 else if (intval($_GET["success"],10)==0) echo'<tr class="alert-danger"  ><td colspan=4> <center>Erreur d\'ajout, Veuillez contacter l\'Administrateur</center></td></tr>';
										// else if (intval($_GET["success"],10)==2) echo'<tr class="alert-warning"  ><td colspan=4> <center>Erreur d\'ajout, Veuillez contacter l\'Administrateur ref:'.$_GET["success"].'</center></td></tr>';
								 		 else if (intval($_GET["success"],10)==3) echo'<tr class="alert-warning"  ><td colspan=4> <center><i class="fa fa-exclamation-triangle warning" style="color:red;margin-right:10px"  aria-hidden="true"></i>Erreur de téléchargement de l\'image, Veuillez réessaier ou Contactez l\'Administrateur</center></td></tr>';
										 
								;} ?>  
										<tr>
											<td >TITRE</td>
											<td colspan=3>
												<input type="text" name='TITREEVENEMENT'>
											</td>
											<td></td>
											<td></td>
										</tr>
										<tr>
											<td>DEPARTEMENT</td>
											<td>  
												<input name="LIBELLEDEPARTEMENT"  value='<?php echo $_COOKIE["U"];?>' type="text" readonly >
											</td> 
											<td>NATURE</td>
											<td>
												<select name="LIBELLENATURE" id='LIBELLENATURE' style='width:300px!important;'>
												<?php if (!empty($nature_array)) { 
													foreach($nature_array as $key=>$value){
													echo	'<option value='.$nature_array[$key]["LIBELLENATURE"].'>'.$nature_array[$key]["LIBELLENATURE"].'</option>';
															}
													}
													else echo '<option value="">NULL</option>'; 
														?>
													</select>
											</td>  
										</tr>
										<tr>
											<td>Ville</td>
											<td>
												<select name='LIBELLEVILLE' id="lesvilles" style='width:300px!important;'>
												<?php if (!empty($ville_array)) { 
													foreach($ville_array as $key=>$value){
													echo	'<option value='.$ville_array[$key]["LIBELLEVILLE"].'>'.$ville_array[$key]["LIBELLEVILLE"].'</option>';
															}
													}
													else echo '<option value="">Aucune Ville</option>'; 
																?>
													</select>
											</td>  
											<td>Lieu</td>
											<td>
										  <select  name="LIBELLELIEU"  id="leslieux" style='width:300px!important;'>
										  </select>
									   </td>  
										</tr>
										<tr>
											<td>DATE EVENEMENT</td>
											<td>
												<input name="DATEDEBUTEV" type="date">
											</td>
											<td style="font-size:20px;">➜</td>
											<td>
												<input name="DATEFINEV" type="date">
											</td>
										</tr>
										<tr>
											<td>HEUR</td>
											<td>
												<input name="HEUREVENEMENT" type="time" value="13:30">
											</td>
											<td>Image (facultative) </td>
											<td>
												<style> 
													 input[type=file] {
														cursor: pointer; 
														color:rgba(0, 0, 0, 0.808);
														border:0;
														box-shadow:0;
														opacity: .8; 
														box-shadow: 0px 0px 0px 0 rgba(0, 0, 0, 0.308);
													}
												</style>
												<input type="file" accept=".png,.jpg,.jpeg" name="image" title="Télecharger une Image pour l'evenement">
												 </td>
										</tr>
										<tr>
											<td>Participants</td>
											<td style='width:300px!important;overflow-y:scroll;max-height:250px;display:block'>  
												<table style='display:block;background-color: rgba(252,252,252,0.7);'>
													<?php if (!empty($employe_array)) { 
															foreach($employe_array as $key=>$value){
																echo '<tr style="margin:35px"><input  name="participants[]" style="width:15px;height:15px;display:inline;margin-top:10px;border:0;" type="checkbox" value="'.$employe_array[$key]["MATRICULEEMPLOYE"].'">'.$employe_array[$key]["NOMEMPLOYE"]."  ".$employe_array[$key]["PRENOMEMPLOYE"].'</option></tr><br>';
															} 
														}
														else echo '<input type=" text" value="NULL"/>'; 
													?> 
												</table>
												</td>  
											<td>Chargé de suivi</td>
											<td>
											<select name="chargeS" style='width:300px!important;'>
												<?php if (!empty($employe_array)) {
													foreach($employe_array as $key=>$value){
														echo	'<option  value='.$employe_array[$key]["MATRICULEEMPLOYE"].'>'.$employe_array[$key]["NOMEMPLOYE"]." ".$employe_array[$key]["PRENOMEMPLOYE"].'</option>';
															}
														}
													else echo '<option value="">NULL</option>';  
												?>
											</select>
											</td>  
											</tr>
											<tr>
										<td colspan=4 align=left>
											Commentaires
				 <textarea name='COMMENTAIRE' style='max-height: 200px;border:none;border-radius:4px;color:#333;cursor:pointer;font-size:16px;margin:0 10px 15px 0;padding:11px;float:left;min-height: 80px;min-width:80%;text-align:left;padding:7px;-webkit-transition:background-color 200ms;transition:background-color 200ms;-webkit-appearance:none;float:right'> </textarea>
										</td>
										</tr>
										<tr style="margin-bottom:30px">
										<td colspan=4 align=center>
										<button type="submit" class="submit" name="submit" data-submit="...Sending" style='border:none;border-radius:4px;color:#333;cursor:pointer;font-size:16px;margin:-10px -10px 15px 0;padding:11px;min-width:100px;text-align:center;-webkit-transition:background-color 200ms;transition:background-color 200ms;-webkit-appearance:none;float:right' value='Go back' > Ajouter</button>
										</td>
										</tr>
									</table>
								</form> 
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
			<script>
				// function changement ville			
			function changeV(){
				v=$("#lesvilles").val();
				var table_lieux= new Array();
				<?php if (!empty($lieu_array)) { 
				foreach($lieu_array as $key=>$value){
				?>
				table_lieux.push(<?php echo	'{"ville":"'.$lieu_array[$key]["LIBELLEVILLE"].'","lieu":"'.$lieu_array[$key]["LIBELLELIEU"].'"}';?>);
				<?php
				}
				} 
				?>
				var lesNoptions="";
				if(table_lieux.length!==0){
				for(i=0;i<table_lieux.length;i++){ 
				if(table_lieux[i].ville==v) { 
				//alert(i);
				//	alert("<option value='"+table_lieux[i].lieu+"'>"+table_lieux[i].lieu+"</option>"	);
				lesNoptions+="<option value='"+table_lieux[i].lieu+"'>"+table_lieux[i].lieu+"</option>";
				
				}
				
				} 
				}
				
				$("#leslieux").html(function() { 
				return lesNoptions;
				});
				}
				changeV();
				$("#lesvilles").change(function(){ changeV();	});
			</script>
			<script>
				
				$('input[readonly]').live('focus',function(e){ $(this).blur(); });
			</script>
			<!--script>
					window.addEventListener("pageshow",function(){
						chargementLieu(document.querySelector("#ville").value);
					 },false);
					 var lieuJson =  new Array(); 
					 function chargementLieu(v){
						var lieu_select=document.querySelector("#lieu");
						lieu_select.innerHTML="";
						for(i=0;i<lieuJson.length;i++){
							if(lieuJson[i].ville==v){
								//alert(lieuJson[i].lieu);
								lieu_select.insertAdjacentHTML('beforeend',"<option value='"+lieuJson[i].lieu+"'>"+lieuJson[i].lieu+"</option>");
							}
						}
					 }
							< ?php
						$queryLieu = "SELECT * FROM lieu";
						$resultLieu = mysqli_query($con,$queryLieu) or die(mysqli_error()."[".$queryLieu."]");
						while ($row = mysqli_fetch_assoc($resultLieu))
						{ 
							?>
									lieuJson.push(< ?php echo '{"ville":"'.$row["LIBELLEVILLE"].'","lieu":"'.$row["LIBELLELIEU"].'"}' ?>);
									< ?php
						}		
						?>	 
					 window.addEventListener("pageshow",function(){
						chargementLieu(document.querySelector("#ville").value);
					 },false);
				  </script-->
			</body>
			</html>
			<?php 
				}else{
				echo ' 
			<META http-equiv="refresh" content="0.6; URL=index.php"> <center style="color:red">Accés Non Autorisé!!  Si la page d\'accueil ne se charge pas dans une seconde cliquez <a href="index.php">ICI</a></center>';
				  exit();
			} 
			
			?>
