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

$playerID = $_POST["playerID"];
$sqlGetInventory = "SELECT * FROM useritems WHERE playerID = '" . $playerID . "';";
$playerInventory = $conn->query($sqlGetInventory);

$inventoryString = "";
if($result->num_rows > 0){
    while($item = $playerInventory->fetch_assoc()){
        $inventoryString = $inventoryString . $item["id"] . "," . $item["name"] . "/";
    }
    die($inventoryString);
}else{
    die("Specified user has no items.");
}
?>