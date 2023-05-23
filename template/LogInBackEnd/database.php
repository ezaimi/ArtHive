<?php
$host="localhost";
$dbname="users";
$username="root";
$password = "";


$mySQL= new mysqli($host,$username,$password,$dbname);

if($mySQL->connect_error)
{
    die("Connect error: ".$mySQL->connect_error);
}

return $mySQL;
?>