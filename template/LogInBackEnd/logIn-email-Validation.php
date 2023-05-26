<?php
$mySQL = require __DIR__ . "/database.php";

$isAvailable = false; // Default value

$sql = sprintf("SELECT * FROM user_data WHERE email='%s'", $mySQL->real_escape_string($_GET["email"]));
$result = $mySQL->query($sql);

if ($result) {
    $isAvailable = $result->num_rows === 0;
}

if( $isAvailable === false){
    $isAvailable = true;
}
else if( $isAvailable === True){
    $isAvailable = false;
}

header("Content-type: application/json");

echo json_encode(["available" => $isAvailable]);
?>