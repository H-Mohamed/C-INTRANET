<!-- This script created by : munaf aqeel mahdi | iraq-babil -->
<!DOCTYPE html>
   <html>
        	<head> 
                <link rel="stylesheet" href="../css/home.css"> 
                <link rel="stylesheet" href="../css/font-awesome.min.css"> 
                 <style>
                            *{
                                 color:black;
                                 font-size:20px;text-shadow: 0px 0px 1px #e8e8e8!important;
                                }
                            .upload_section{
                                background: #fff;
                                padding: 0 50px;
                            }
                            .upload_box{
                            border-radius: 3px;
                                max-width: 800px;
                                box-shadow:1px 1px 10px 2px rgba(0,0,0,.3);
                                margin: auto;
                                padding: 0px 5px;
                                margin-bottom: 0px;
                            }
                            .upload_btn{
                                background: #d81a38;
                                color: #fff;
                                padding: 5px 20px 5px 20px;
                                border: 3px solid #fff;
                                border-radius: 2px;
                                cursor: pointer;
                                transition: background 0.5s;
                                border-radius:30px;
                            }
                            .upload_btn:hover{
                                border: 1px solid #d81a38;
                                background: #fff;
                                color: #d81a38;
                                box-shadow: 0px 2px 10px 5px #ababab;
                            }
                            a{
                                text-decoration:none;
                                color: #FFFFFF;
                                cursor: pointer;
                            }
                            a:hover{
                                color: #c5c5c5;
                            }
                            .fa, .fa-cloud-download{
                                color: #d81a38;
                            }
                            .upload_feild{
                                color: #d81a38;
                                background: #EEE;
                                padding: 5px;
                                width: 500px;
                                min-width: 170px;
                                border-radius: 2px;
                                cursor: pointer;
                                border: 3px solid #ffffff;
                                transition: box-shadow 0.5s;
                            }
                            .upload_feild:hover{
                                color: white; 
                                    box-shadow: inset 0px 50px 0px #d81a38;
                            }
                            .msg_error{
                            margin-top: 15px;
                            max-width: 800px;
                            padding: 15px;
                            background: rgba(244, 67, 54, 0.69);
                            color: white;
                            border-radius: 5px;
                            }
                            .msg_success{
                            margin-top: 15px;
                            max-width: 800px;
                            padding: 15px;
                            background: #4CAF50;
                            color: white;
                            border-radius: 5px;
                            }
                            .msg_success p a,.msg_error p a{
                            color: #999;
                            text-decoration: none;
                            }
                            .msg_success p a:hover,.msg_success p a:focus.msg_error p a:hover,.msg_error p a:focus{
                            color: #555;
                            text-decoration: none;
                            }
                            input[type=text],input[type=file],textarea, SELECT { 
                                max-width:900px;
                                min-width:500px; 
                                padding: 12px 20px;
                                margin: 8px 10px;
                                display: inline-block;
                                border: 1px solid #ccc;
                                border-radius: 4px;
                                box-sizing: border-box;
                            }
                 </style>
                <meta charset="UTF-8" />
                <title>Ajouter Un Document | Bibilothèque CCIS SM.</title>  
        	    <script src="js/jquery.min.js"></script>
                <script src="js/jquery.form.min.js"></script>
                <script language="JavaScript" src="js/javascript.js"></script>
                <link rel="stylesheet" href="css/bootstrap.css"> 
            </head>
        <body> 
           <?php  
            include("includes/functions.php");
            if(!isset($_GET["noheader"])) { 
            include('header.php');} 
            
           ?>
            <center> 
            	    <div class="upload_section" id="upload_f_section">
            	    	<form action="includes/up_func.php" id="uploadForm" method="post" enctype="multipart/form-data">
            	     <h1 style="color: #1e81d0;text-shadow: 5px 5px 1px #e8e8e8;">
                  	<div class="upload_box">
                    <table style=""> 
                        <tr><td colspan="2" >
                        <h3><i class="fa fa-book" aria-label="kkszdkopqzpd"> Ajouter un document</i></h3> </td>
                        <tr><td>TYPE</td>   
                                 <td style="padding:10px">
                                   <SELECT name="TYPE">  
                                        <?php  printi_column_to_options("TYPE","SELECT TYPE FROM `bibliotheque_type`",false); ?>
                                    </select>
                                 </td> 
                        <tr><td>  THEME   </td>      
                                 <td style="padding:10px">
                                   <SELECT name="THEME" id="THEMES" onchange="theme_seletion(this)">  
                                        <?php  printi_column_to_options("THEME","SELECT THEME FROM `bibliotheque_theme`",false); ?>
                                    </select>
                                 </td> 
                        <tr><td>  SOUS_THEME </td>   
                                 <td style="padding:10px">
                                   <SELECT name="SOUS_THEME" id="STHEMES">   
                                    </select>
                                 </td> 
                        <tr><td>  Titre   </td>     <td >  <input  name="Titre" type="text"/> </td> 
                        <tr><td>  Description</td>  <td style="padding:10px">  <textarea name="Description"> </textarea></td> 
                        <tr><td></td><td></td> 
                        <tr><td>  Mots clés <h6>Séparez par &nbsp;: &nbsp;" &nbsp;" &nbsp; ou &nbsp;" &nbsp;; &nbsp;"</h6>  </td>     <td >  <input  name="Titre" type="text"/> </td> 
                        <tr><td></td><td></td> 
                	    <tr><td>PV ou Rapport <h6>Formats (pdf,docx)</h6></td><td><input class="upload_feild" type="file" name="fileToUpload"/></td> 
                        <tr><td>Images <h6>Facultatives</h6></td><td><input class="upload_feild" type="file" name="ImagesToUpload[]"  id="imagesToUpload" multiple/></td> 
                        <tr><td colspan="2" id="selectedFiles"></td> 
                        <tr><td>  </td>
                    </table>
                    <input class="upload_btn" type="submit" value="Téléverser" name="uploadFile" >
                    <script>
                        $('.fa-cloud-download').on('click', function() { $('#fileupload').click();return false;});
                        </script><p>
                
                   <p id="uploading" style="display:none;">
                        <span style="padding: 7px 15px;background: #fff;border-radius: 3px;color: #2196f3;"
                         id="uploadingTXT">En cours...</span></p>	
                	</div>
                    </form>
                    <div id="uploaded_result">
                    </div>    
            	    </div>
            </center>
                <script>
                    var selDiv = "";
                    document.addEventListener("DOMContentLoaded", init, false);

                    function init() {
                        document.querySelector('#imagesToUpload').addEventListener('change', handleFileSelect, false);
                        selDiv = document.querySelector("#selectedFiles");
                    }

                    function handleFileSelect(e) {

                        if(!e.target.files) return;
                        
                        var files = e.target.files;
                        var filenames= [];
                        var count=0;
                        for(var i=0; i<files.length; i++) {
                            var f = files[i]; 
                            count++; 
                            if(filenames.in)filenames.push(f.name);
                            selDiv.innerHTML += "<h6 style='with:20px;display:inline'>"+f.name + "</h6><br>"; 
                            
                        }

                    }
                    </script>
             <script>  
                   theme_seletion(document.getElementById("THEMES"));
                   function theme_seletion(theme){
                      var xhttp=new XMLHttpRequest();
                      xhttp.open("GET","ajax.php?Theme="+theme.value,false);
                      xhttp.send(); 
                      //alert(xhttp.responseText);
                      document.getElementById("STHEMES").innerHTML=xhttp.responseText; 
                   }
             </script>
            <script>
                    $(document).ready(function(){
                    $("#uploadForm").on('submit',function(e){
                    e.preventDefault();
                    $(this).ajaxSubmit({
                    beforeSend:function(){
                    $("#uploadingTXT").html("Wait..");
                    $("#uploading").show();
                    $(".upload_btn").hide();
                    },
                    uploadProgress:function(event,position,total,percentCompelete){
                    $("#uploadingTXT").html("uploading... [ "+percentCompelete+"% ]");
                    },
                    success:function(data){
                    $("#uploadingTXT").html("Done");
                    $("#uploading").hide();
                    $(".upload_btn").show();
                    $("#uploaded_result").html(data);
                    }});
                    });
                    });
                </script>
        </body>
    </html>