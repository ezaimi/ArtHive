<?php
   session_start();
if(isset($_SESSION["user_id"])){
    $mySqli = require __DIR__ . "/LogInBackEnd/database.php";
$sql = "SELECT * FROM artist_table WHERE artist_id = {$_SESSION["user_id"]}";
$result = $mySqli->query($sql);

$user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Hello <?=$user["artist_name"] ?></h1>
</body>
</html>