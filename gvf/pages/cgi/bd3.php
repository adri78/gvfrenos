<?php
	$local=1;
if($local==1){
	$u="root";
	$c="";
	$db="fer1";

}else{
	$u="root";
	$c="";
	$db="fer1";

}


/* ************************************** */
$mysqli = mysqli_connect('localhost', $u,$c, $db);
$mysqli->set_charset("utf8");

//$conexion=$mysqli;

?>