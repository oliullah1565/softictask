<?php 

 /*--------------------------------------------------------------*/
 /* Function for Get Value from database  
 /*--------------------------------------------------------------*/
function get_fild_data($table,$id='',$fild,$sql=''){
	global $con;
	if($sql!=''){
	$sql = "SELECT ".$fild." AS rdata FROM ".$table." WHERE ".$sql." LIMIT 1";	
	}else{
	$sql = "SELECT ".$fild." AS rdata FROM ".$table." WHERE id='".$id."' LIMIT 1";	
	}
	$result=mysqli_query($con,$sql) or die(mysqli_error($con));
	$row=mysqli_fetch_array($result);
	if($row['rdata']>0 || !empty($row['rdata'])){
	return $row['rdata'];	
	}else{
	return 0;	
	}
}
 /*--------------------------------------------------------------*/
 /* Function for Generate Reffer Code  
 /*--------------------------------------------------------------*/
function generateRandomCode($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
 /*--------------------------------------------------------------*/
 /* Function for Remove escapes special
 /* characters in a string for use in an SQL statement
 /*--------------------------------------------------------------*/
 function escape($str){
    global $con;
    $escape = mysqli_real_escape_string($con,$str);
    return $escape;
  }
  
  /*--------------------------------------------------------------*/
  /* Function for Remove html characters
  /*--------------------------------------------------------------*/
  function remove_junk($str){
    $str = nl2br(ltrim($str));
    $str = htmlspecialchars(strip_tags($str, ENT_QUOTES));
    return $str;
  }

?>