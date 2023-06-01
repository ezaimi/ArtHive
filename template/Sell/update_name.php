<?php

$name = $_POST['name'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arthive_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// Assuming you have a table named "users" with columns "id" and "artist_name"
// Update the user's name in the database based on the logged-in user's ID
$sql = "UPDATE artist_table SET artist_name = '$name' WHERE artist_id = 1"; // Replace 'id' with the appropriate column name and the corresponding user ID

if ($conn->query($sql) === TRUE) {
  // Successful update
  echo "success";
} else {
  // Error updating record
  echo "Error updating record: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
