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

//Get item data from database.
$itemID = $_POST["itemID"];
$sqlGetItem = "SELECT * FROM items WHERE id = '" . $itemID . "';";
$item = $conn->query($sqlGetItem);

//Turn item data to string to be used.
$itemData = "";
if($item->num_rows > 0){
    $item = $item->fetch_assoc();
    $itemData = $itemData . $item["name"] . "," . $item["type"] . "," . $item["speed"] . "," . $item["strength"] . "," . $item["range"] . "," . $item["rarity"]; //Add more fields here: $item["{database column}"];
    die($itemData);
}else{
    die("Item not found.")//Item with that ID doesn't exist.
}
?>
