<?php
 session_start();
$SERVER="localhost";
$dbName ="broject";
$dbUser ="root";
$dbPassword = "";

$con =mysqli_connect($SERVER,$dbUser,$dbPassword,$dbName);
if(!$con){
    die('error' .mysqli_connect_error());
   
}