<?php

$mySQL = require __DIR__ . "/database.php";

$isAvailable = false; // Default value
print_r($_GET["email"]);
$sql = sprintf("SELECT * FROM user_data WHERE email='%s'", $mySQL->real_escape_string($_GET["email"]));
$result = $mySQL->query($sql);
$user = $result->fetch_assoc();


// echo ($user);

// if ($user) {
//     $password = $user["password"];
//     echo $password;
// } else {
//     echo "User not found.";
// }