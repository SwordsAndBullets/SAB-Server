<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sab";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

//User details
$loginUsername = $_POST["loginUsername"];
$loginPassword = $_POST["loginPassword"];

//SQL
$sql = "INSERT INTO `users` (`name`, `password`, `date`, `xp`, `clanid`) VALUES ('".$loginUsername."', '".$loginPassword."', '".date("dmy")."', '0', '0');";
$result = $conn->query($sql);

if($result == 1){
    echo "Account created.";
}else{
    echo "Failed.";
}
?>