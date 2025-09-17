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
$username = $_POST["username"];
$password = $_POST["password"];

//Check Authority
$authorised = false;
$sql_checkAuth = "SELECT password FROM users WHERE name = '" . $username . "';";
$result = $conn->query($sql_checkAuth);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        if($row["password"] == $password){
            echo("private");
            $authorised = true;
        }else{
            echo("public");
        }
    }
}

//Get Data
$sql = "";
switch ($authorised){
    case true : $sql = "SELECT * FROM users WHERE name = '" . $username . "';"; break;
    case false : $sql = "SELECT name, date, xp, clanid FROM users WHERE name = '" . $username . "';"; break;
}
$result = $conn->query($sql);
if($result->num_rows > 0){
    echo("/");
    while($row = $result->fetch_assoc()){
        echo(implode("/", $row));
    }
}
?>