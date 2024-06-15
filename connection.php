<?php
$servername="localhost";
$username="root";
$password ="";
$database="2cafe";

$con = new mysqli($servername,$username,$password,$database);

if ($con->connect_error){
    die("connection failed");
}
?>
