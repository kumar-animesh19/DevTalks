<?php
//Script to connect to the database
$severname = "localhost";
$username = "root";
$password = "";
$database = "DevTalks";

$conn = mysqli_connect($severname,$username,$password,$database);
if(!$conn){
    echo 'connection problem';
}
?>