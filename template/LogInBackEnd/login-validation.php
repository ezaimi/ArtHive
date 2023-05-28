<?php
    $isAvailable = false;
$mySqli = require __DIR__ . "/database.php";

$sql = sprintf("SELECT * FROM user_data WHERE email = '%s'", $mySqli->real_escape_string($_GET["email"]));
$result = $mySqli->query($sql);

// print_r($result);



$user = $result->fetch_assoc();
print_r($user);
print_r($_GET["password"]);
if($user){
    if(password_verify($_GET["password"], $user["password"])){
        $isAvailable = true;
        header ("Content-type: application/json");
        echo json_encode(["available" => $isAvailable]);
      exit;
    }
}