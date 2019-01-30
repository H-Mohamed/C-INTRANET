<?php
	if(isset($_POST["submit"])){
	header('Content-Type: text/html; charset=utf-8');
	$con = mysqli_connect("localhost","root","","agenda") ;
	//mysql_set_charset('utf8', $link);
	mysqli_set_charset($con,"utf8");
	// Check connection 
	if($con === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	 //LIBELLEDEPARTEMENT,LIBELLEVILLE,NATURE,LIBELLELIEU,DATEDEBUTEV,HEUREVENEMENT,TITREEVENEMENT,DATEFINEV,Comments
	if(isset($_POST["LIBELLEDEPARTEMENT"]))
	$LIBELLEDEPARTEMENT= mysqli_real_escape_string($con, $_POST['LIBELLEDEPARTEMENT']);
	if(isset($_POST["LIBELLEVILLE"]))
	$LIBELLEVILLE=mysqli_real_escape_string($con, $_POST['LIBELLEVILLE']);
	if(isset($_POST["LIBELLENATURE"]))
	$NATURE=mysqli_real_escape_string($con, $_POST['LIBELLENATURE']);
	if(isset($_POST["LIBELLELIEU"]))
	$LIBELLELIEU=mysqli_real_escape_string($con, $_POST['LIBELLELIEU']);
	if(isset($_POST["DATEDEBUTEV"]))
	$DATEDEBUTEV=mysqli_real_escape_string($con, $_POST['DATEDEBUTEV']);
	if(isset($_POST["HEUREVENEMENT"]))
	$HEUREVENEMENT=mysqli_real_escape_string($con, $_POST['HEUREVENEMENT']);
	if(isset($_POST["TITREEVENEMENT"]))
	$TITREEVENEMENT=mysqli_real_escape_string($con, $_POST['TITREEVENEMENT']);
	if(isset($_POST["DATEFINEV"]))
	$DATEFINEV=mysqli_real_escape_string($con, $_POST['DATEFINEV']);
	if(isset($_POST["COMMENTAIRE"]))
	$Comments=mysqli_real_escape_string($con, $_POST['COMMENTAIRE']); 
	//reccupêrer l'image si elle existe
		$state=1;
		//$destination=
		if(!($_FILES['image']['error'] > 0)){
			//$target = '~/images/';//.basename($_FILES['image']['name']);
			//echo basename($_FILES['image']['name']);
			//$image=$_FILES['image']['name'];
			$target_dir = "images/";
			$target_file = $target_dir . basename($_FILES["image"]["name"]);
			$uploadOk = 1;
			//echo $target_file ;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			$check = getimagesize($_FILES["image"]["tmp_name"]);
			if($check !== false) {
					//echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
			} else {
					echo "File is not an image.";
					$uploadOk = 0;
				}
			
			// Check if file already exists
			if (file_exists($target_file)) {
				echo "Sorry, file already exists.";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["image"]["size"] > 500000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
			if($uploadOk != 0){
			$sql = "INSERT INTO evenement (LIBELLEDEPARTEMENT,LIBELLEVILLE,LIBELLENATURE,LIBELLELIEU,DATEDEBUTEV,HEUREVENEMENT,TITREEVENEMENT,DATEFINEV,COMMENTAIRE,IMAGE) VALUES ('$LIBELLEDEPARTEMENT','$LIBELLEVILLE','$NATURE','$LIBELLELIEU',
			'$DATEDEBUTEV','$HEUREVENEMENT','$TITREEVENEMENT','$DATEFINEV','$Comments','$target_file')";
			//mysqli_query($con, $sql);
			}
			else{
				//image upload reset
			echo '<META http-equiv="refresh" content="0;URL=add-event.php?success=3"> ';
			exit();
				}
		}
		else{
			//echo "image not set";
			$sql = "INSERT INTO evenement (LIBELLEDEPARTEMENT,LIBELLEVILLE,LIBELLENATURE,LIBELLELIEU,DATEDEBUTEV,HEUREVENEMENT,TITREEVENEMENT,DATEFINEV,COMMENTAIRE,IMAGE) VALUES ('$LIBELLEDEPARTEMENT','$LIBELLEVILLE','$NATURE','$LIBELLELIEU','$DATEDEBUTEV','$HEUREVENEMENT','$TITREEVENEMENT','$DATEFINEV','$Comments',NULL)";
			//mysqli_query($con, $sql);
		}
		
		// attempt insert query execution
		$participants=$_POST["participants"];
		$chargeS=$_POST["chargeS"];
		if(mysqli_query($con, $sql)){
			 
				if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file))
				$state=1;
				else
				$state=0; 
			
			if($state==0){ 
					echo '<META http-equiv="refresh" content="0;URL=add-event.php?success=3"> ';
					exit();
			} else {
			$queryEvent = "SELECT * FROM evenement WHERE IDEVENEMENT=(select max(IDEVENEMENT) from evenement)";
			$resEvent = mysqli_query($con,$queryEvent) or die(mysqli_error($con)."[".$queryEvent."]");
			$row = mysqli_fetch_assoc($resEvent);
			$idevent= $row['IDEVENEMENT']; 
			// insert participant a la table affecter
				foreach($participants as $p)
				{
					if($chargeS!=$p){ 
					$affecterPart="INSERT INTO affecter (ROLE,MATRICULEEMPLOYE,LIBELLEDEPARTEMENT,IDEVENEMENT) VALUES('Participants','$p','$LIBELLEDEPARTEMENT','$idevent')";
					mysqli_query($con,$affecterPart) or die(mysqli_error());
					}
				}
			//insert chargédesuivi a la table affecter
			$affecterPart="INSERT INTO affecter (ROLE,MATRICULEEMPLOYE,LIBELLEDEPARTEMENT,IDEVENEMENT) VALUES('CHARGESUIVI','$chargeS','$LIBELLEDEPARTEMENT','$idevent')";
			mysqli_query($con,$affecterPart) or die(mysqli_error($con));
			echo '<META http-equiv="refresh" content="0;URL=add-event.php?success=1"> '; 
			}
		}else{ 
				echo '<META http-equiv="refresh" content="0;URL=add-event.php?success=0"> '; 
		}
		// close connection
		mysqli_close($con);	
	}
	else
	echo '<META http-equiv="refresh" content="0;URL=add-event.php?success=0"> ';
	?>
	
