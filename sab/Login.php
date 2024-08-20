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
$sql = "SELECT password FROM users WHERE name = '" . $loginUsername . "';";
$result = $conn->query($sql);

//Check if login details match
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        if($row["password"] == $loginPassword){
            die("Login Success!");
        }else{
            die("Check Login.");
        }
    }
}else{
    die("Check Login.");
}

?>