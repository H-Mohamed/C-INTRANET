<?php   
function runQuery($query) {
   mysqli_query($GLOBALS['con'],$query); 
 }
function Query_Array($query) {  
    $resultset = array();
    $result = mysqli_query($GLOBALS["con"],$query); 
    if (!$result) {
        echo 'MySQL Error: ' . mysqli_error($GLOBALS["con"]);
        exit;
    }else{
    while ($row = mysqli_fetch_assoc($result)) {
    $resultset[] = $row;
        }
       if(!empty($resultset))
       return $resultset;
    } 
  }

function get_pvr($id){  return Query_Array("select * from pvr where ID=$id"); }
function get_images($id){
    $resultset = array();
    $query="SELECT * FROM images where pvr where IDPVR=$id";
    $result = mysqli_query($GLOBALS["con"],$query); 
    if (!$result) {
        echo 'MySQL Error: ' . mysqli_error($GLOBALS["con"]);
        exit;
    }else{
    while ($row = mysqli_fetch_assoc($result)) {
    $resultset[] = $row;
        }
       if(!empty($resultset))
       return $resultset;
    } 
 }
  
function printi_column_to_options($column,$query,$returning,$db){   
    $con= mysqli_connect("localhost","root","",$db) ;  
    $col = mysqli_query($con,$query)  ;
    if ( $col !== false ) { 
         while ( $row =  mysqli_fetch_assoc($col) ) { 
          echo "<option value='".$row[$column]."'>".$row[$column]."</option>";
       } 
    }
    else echo "<option value=''>Syntax Error :D ".mysqli_error($GLOBALS['con'])." </option>";
      
 }
 function couper($string,$length) {
    $string = trim($string);
   $append="&hellip;";
     if(strlen($string) > $length) {
       $string = wordwrap($string, $length);
       $string = explode("\n", $string, 2);
       $string = $string[0] . $append;
     }
   
     return $string;
}

?>