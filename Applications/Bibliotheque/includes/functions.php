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

function get_document($docid){  return Query_Array("select * from bibliotheque_document where IDDOC=$docid"); }
function get_Southeme($theme,$returning){   
    $result=
     mysql_query("select SOUS_THEME from bibliotheque_sous_theme where THEME=$theme")
     or die(mysql_error());
    if($returning)
    {
          $row=mysql_fetch_array($result);
        return $row;
    }
    else{
        if(mysqli_num_rows($result)>0){
            echo "<optgroup label='Sous thèmes'>";
            while($row = mysqli_fetch_assoc($result)){
              echo "<option value='".$row['SOUS_THEME']."'>".$row['SOUS_THEME']."</option>";
            }
           echo "</optgroup>";
    }
   }
 }

function getSous_theme($theme){
    $resultset = array();
    $query="SELECT * FROM bibliotheque_sous_theme where `THEME`='".$theme."'";
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
 function getTypes(){
  $resultset = array();
  $query="SELECT * FROM `bibliotheque_type`";
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
function get_docs_multi($keywords,$date,$theme,$soustheme,$type){

    $r = "select * from bibliotheque_document D";

    if($keywords!=''){
        $where_keywords = " AND D.KEYWORDS LIKE '%".$keywords."%' " ;
    } 
    if($type != '')
    {
      $join_type = "INNER JOIN bibliotheque_type T   ON D.typeId = lt.typeId ";
      $where_type = " AND o.type = '{$type}' ";
    }
    if($soustheme != '')
    {
      $join_soustheme = "INNER JOIN bibliotheque_soustheme st ON D.SOUS_THEME = st.SOUS_THEME ";
      $where_soustheme = "AND o.sousthemeId = '{$soustheme}' ";
    }
    if($theme != '' && $soustheme != '')
    {
      $join_theme = "INNER JOIN bibliotheque_theme th ON st.THEME = th.THEME ";
      $where_theme = "AND th.THEME = '{$theme}' ";
    } 
    $result=mysql_query("select SOUS_THEME from bibliotheque_sous_theme where THEME=$theme") or die(mysql_error());
    $row=mysql_fetch_array($result);
    return $row; 
 }
function printi_column_to_options($optgoup,$query,$returning){   
    $con= mysqli_connect("localhost","root","","ccis_bibliotheque") ;  
    $col = mysqli_query($con,$query)  ;
    if ( $col !== false ) { 
         while ( $row =  mysqli_fetch_assoc($col) ) { 
          echo "<option value='".$row[$optgoup]."'>".$row[$optgoup]."</option>";
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