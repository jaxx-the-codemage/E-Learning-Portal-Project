<?php

function connect(){
	$server = "localhost:3306";
	$username = "root";
	$password = "JaxonIzCute:3";
	$dbname = "eportal";

	$connection = mysqli_connect($server,$username,$password,$dbname);
	return $connection;
}
?>