<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "tourista_pk"; 

$conn=mysqli_connect($host,$username,$password, $database);
if(!$conn){
    die("Connection failed:" . mysqli_connect_error());
}


?>