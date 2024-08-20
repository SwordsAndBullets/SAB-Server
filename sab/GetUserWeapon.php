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

//ID of entry in table
$userWeaponID = $_POST["userWeaponID"];

//SQL
$sql = "SELECT * FROM useritems WHERE id = '" . $userWeaponID . "';";
$result = $conn->query($sql);

//Return the weapon data in correct format for unity
$data = "";
if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $data += $row["itemid"] + "/";
    $data += $row[""]
}

?>