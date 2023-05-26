<?php
$mySQL = require __DIR__ . "/database.php";

$isAvailable = false; // Default value

$sql = sprintf("SELECT * FROM user_data WHERE email='%s'", $mySQL->real_escape_string($_GET["email"]));
$result = $mySQL->query($sql);
print_r($result);
if ($result) {
    $isAvailable = $result->num_rows === 0;
}

header("Content-type: application/json");

echo json_encode(["available" => $isAvailable]);
?>