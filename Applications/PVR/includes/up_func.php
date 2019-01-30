<?php 
include("db.php"); 
include("functions.php");   
$success=false;
// ===================== [ allowed types in array ] ==========================
    $types = array(
        "jpg",
        "aep",
        "iso",
        "bmp",
        "mp3",
        "mp4",
        "ico",
        "wma",
        "avi",
        "rpm",
        "deb",
        "txt",
        "rtf",
        "jpg",
        "rar",
        "zip",
        "png",
        "pdf",
        "jpeg",
        "gif",
        "psd",
        "wmv",
        "mp2",
        "xml",
        "7z",
        "tgz",
        "bz2",
        "torrent",
        "zipx",
        "gz",
        "xls",
        "dotx",
        "dcr",
        "mov",
        "pdb",
        "css",
        "msi",
        "exe",
        "run",
        "tar",
        "taz",
        "xlsx",
        "sql",
        "apk",
        "webm",
        "ini",
        "svg",
        "ram",
        "3gp");
    $covertypes = array(
        "jpg",
        "jpeg", 
        "png", 
    );    
// hide all php error reporting 
 error_reporting(E_ALL ^ E_NOTICE);
// ========================= [ TEST on DOC and its cover PHP code ] ============================
if(!empty($_FILES['CoverToUpload'])){
        // ========================= [ Cover PHP code ] ============================ 
            $coverName = $_FILES["CoverToUpload"]["name"];
            $coverLocation= $_FILES["CoverToUpload"]["name"]; 
            $coverTmpLoc = $_FILES["CoverToUpload"]["tmp_name"];
            $coverType = $_FILES["CoverToUpload"]["type"];
            $coverSize = $_FILES["CoverToUpload"]["size"]; 
            $coverErrorMsg = $_FILES["CoverToUpload"]["error"];
            $coverName = preg_replace('#[^a-z.0-9]#i', '', $fileName); 
            $splitted = explode(".", $fileName);
            $coverExt = end($splitted);
            $coverName = time().rand().".".$coverExt; 
            // if file size more than 2Gb
            if($coverSize > 222042880000) {
                echo "<p class='msg_error'>Your image must be less than 2GB of size.</p>"; 
                unlink($coverTmpLoc); 
                exit();
                // if file type or format not in allowed ftypes array
            }  else if (in_array($coverType, $covertypes)) {  
                echo "<p class='msg_error'>Veuillez téléverser une couverture valide (png) $coverExt!!</p>"; 
                unlink($fileTmpLoc);
                exit();
                // check if there is some error in uploading files 
            }else if ($coverErrorMsg == 1) {
                echo "<p class='msg_error'>An error occured while processing the image. Try again.</p>"; 
                exit();
            }
            // do uploading operation if there are no error happened
            $covermoveResult = move_uploaded_file($coverTmpLoc, "../img/$coverLocation");

        // ========================= [ file PHP code ] ============================ 
            $fileName = $_FILES["fileToUpload"]["name"];
            $fileTmpLoc = $_FILES["fileToUpload"]["tmp_name"];
            $fileType = $_FILES["fileToUpload"]["type"];
            $fileSize = $_FILES["fileToUpload"]["size"]; 
            $fileErrorMsg = $_FILES["fileToUpload"]["error"];
            $fileName = preg_replace('#[^a-z.0-9]#i', '', $fileName); 
            $splitted = explode(".", $fileName);
            $fileExt = end($splitted);
            $fileName = time().rand().".".$fileExt;  
                // if upload button clicked
                if (!$fileTmpLoc) {
                    echo "<p class='msg_error'>Veuillez selectioner un document puis rérssayez! </p>";
                    exit();
                    // if file size more than 2Gb
                } else if($fileSize > 222042880000) {
                    echo "<p class='msg_error'>Your image must be less than 2GB of size.</p>"; 
                    unlink($fileTmpLoc); 
                    exit();
                    // if file type or format not in allowed ftypes array
                } else if (in_array($fileType, $types)) {  
                    echo "<p class='msg_error'>File format not allowed!!</p>"; 
                    unlink($fileTmpLoc);
                    exit();
                    // check if there is some error in uploading files 
                } else if ($fileErrorMsg == 1) {
                    echo "<p class='msg_error'>An error occured while processing the file. Try again.</p>"; 
                    exit();
                }
                // do uploading operation if there are no error happened
                $filemoveResult = move_uploaded_file($fileTmpLoc, "../up/$fileName");
                
                if($filemoveResult && $covermoveResult) $success=true;
                else $success=false;

}else{  
        // ========================= [ file PHP code ] ============================
            $fileName = $_FILES["fileToUpload"]["name"];
            $fileTmpLoc = $_FILES["fileToUpload"]["tmp_name"];
            $fileType = $_FILES["fileToUpload"]["type"];
            $fileSize = $_FILES["fileToUpload"]["size"]; 
            $fileErrorMsg = $_FILES["fileToUpload"]["error"];
            $fileName = preg_replace('#[^a-z.0-9]#i', '', $fileName); 
            $splitted = explode(".", $fileName);
            $fileExt = end($splitted);
            $fileName = time().rand().".".$fileExt; 
            $coverlocation="";
                // if upload button clicked
                if (!$fileTmpLoc) {
                    echo "<p class='msg_error' style='color:#000'>Veuillez selectioner un document puis rérssayez </p>";
                    exit();
                    // if file size more than 2Gb
                } else if($fileSize > 222042880000) {
                    echo "<p class='msg_error'>Your image must be less than 2GB of size.</p>"; 
                    unlink($fileTmpLoc); 
                    exit();
                    // if file type or format not in allowed ftypes array
                } else if (in_array($fileType, $types)) {  
                    echo "<p class='msg_error'>File format not allowed!!</p>"; 
                    unlink($fileTmpLoc);
                    exit();
                    // check if there is some error in uploading files 
                } else if ($fileErrorMsg == 1) {
                    echo "<p class='msg_error'>An error occured while processing the image. Try again.</p>"; 
                    exit();
                }
                // do uploading operation if there are no error happened
                $moveResult = move_uploaded_file($fileTmpLoc, "../up/$fileName");
                if($moveResult) $success=true;
                else $success=false; 
 }
    // check if uploading success
if ($success) { 
    $TYPE=$_POST['TYPE'];
    $THEME=$_POST['THEME'];
    $SOUS_THEME=$_POST['SOUS_THEME'];
    $NOMDOC=$_POST['Titre'];
    $CHEMIN='up/download?f_type='.$fileType.'&f_name='.$fileName;
    $DATEAJOUT=time(); 
    $Description= $_POST["Description"];
    
    //if image is not define the set default image
    if(empty($_FILES['CoverToUpload'])) { 
        $photo="img/ff.jpg"; 
    }else{
        $ext=explode("/",$coverExt);
        $photo='img/'.$coverLocation;
    }
    $KEYWORDS=$_POST["KEYWORDS"];
    try{
    $query="INSERT INTO `bibliotheque_document` (`IDDOC`,`TYPE`, `THEME`, `SOUS_THEME`, `NOMDOC`, `CHEMIN`, `DATEAJOUT`, `Description`,
     `Image`, `KEYWORDS`)  VALUES (NULL,'$TYPE', '$THEME', '$SOUS_THEME', '$NOMDOC', '$CHEMIN', CURRENT_TIMESTAMP, '$Description', '$photo', '$KEYWORDS')";
    runQuery($query);
     }
    catch (Exception $e){ 
        echo '>>>|'.$e->getMessage().'|<<<';
        exit;
     }
?>
    <div class='msg_success'>
    Fichier Bien Enregistré
    <p style='padding:15px;background:#fff;color:#999;border-radius:3px;'>
        <a href="<?php echo 'up/download?f_type='.$fileType.'&f_name='.$fileName; ?>">Cliquez ici pour télécharger ou click droit pour copier le lien </a></p>
    </div>

    <?php

// if uploading operation failed, echo this message
}else{
    echo "<p class='msg_error'>ERREUR: Fichier non téleversé. Réessayer plus tard ou contacter l'administrateur.</p>"; 
    exit();
}
 ?>