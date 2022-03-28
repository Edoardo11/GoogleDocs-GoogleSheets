<?php
header("Access-Control-Allow-Origin: *"); 
session_start();
if(isset($_SESSION["a"])){
	echo "Con sessione";
    session_destroy();
} else {
	echo "Senza sessione";
	$_SESSION["a"]=true;
}
?>