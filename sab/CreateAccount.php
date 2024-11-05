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
$createUsername = $_POST["createUsername"];
$createPassword = $_POST["createPassword"];
$repeatPassword = $_POST["repeatPassword"];

//Validation
if($createPassword != $repeatPassword){
    die("Passwords must match.");
}
if(strlen($createUsername) < 3 || strlen($createPassword) < 3){
    die("Username and password must be at least 3 characters.");
}

//Check if user with username exists
$sqlCheckName = "SELECT name FROM users WHERE name = '" . $createUsername . "';";
$checkNameResult = $conn->query($sqlCheckName);
if($checkNameResult->num_rows > 0){
    die("User with that name already exists.");
}

//SQL for creating user
$sqlCreateUser = "INSERT INTO `users` (`name`, `password`, `date`, `xp`, `clanid`) VALUES ('".$createUsername."', '".$createPassword."', '".date("dmy")."', '0', '0');";
$creationResult = $conn->query($sqlCreateUser);

//Outputs
if($creationResult == 1){
    die("Account created.");
}else{
    die("Failed.");
}
?>