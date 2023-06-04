<?php
session_start();

if (isset($_SESSION["user_id"])) {
    $mySqli = require __DIR__ . "../../LogInBackEnd/database.php";
    $sql = "SELECT * FROM artist_table WHERE artist_id = {$_SESSION["user_id"]}";
    $result = $mySqli->query($sql);

    $user = $result->fetch_assoc();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arthive_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$artistID = $user['artist_id'];

if (isset($_FILES['profile-upload'])) {
    $file = $_FILES['profile-upload'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];
    echo 'Era';
    if ($fileError === UPLOAD_ERR_OK) {
        // Define the secure directory to store profile pictures (outside of web root)
        $uploadDir = __DIR__ . '/profile-pics/';

        // Generate a unique filename
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileName = uniqid() . '.' . $extension;

        // Move the uploaded file to the secure directory
        $destination = $uploadDir . $fileName;
        echo 'Hello';
        if (move_uploaded_file($fileTmpName, $destination)) {
            // Update the artist_table with the new profile picture
            $sql = "UPDATE artist_table SET artist_profilepic = '$destination' WHERE artist_id = $artistID";
            echo $sql;

            if ($conn->query($sql) === TRUE) {

                // Successful update
                $_SESSION['profile_picture'] = $destination;
                echo "success";
            } else {
                // Error updating record
                echo "Error updating record: " . $conn->error;
            }
        } else {
            // Error moving the uploaded file
            echo "Error moving the uploaded file.";
        }
    } else {
        // Error uploading file
        echo "Error uploading file";
    }
}

// Close the database connection
$conn->close();
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Profile</title>

    <style type="text/css">
        @font-face {
            font-family: fontG;
            font-style: normal;
            font-weight: normal;
            src: url('GlacialIndifference-Regular.woff') format('woff');
        }

        @font-face {
            font-family: fontGBold;
            font-style: normal;
            font-weight: normal;
            src: url('GlacialIndifference-Bold.woff') format('woff');
        }
    </style>

    <!--CSS files here-->
    <link rel="stylesheet" href="./artist_profile.css" />
    <link rel="stylesheet" href="../Sell/Sell_css/create.css">


<body>
    <div class="artistProfile-rectangle"></div>
    <div class="artistProfile-circle"></div>

    <form id="profile-form" enctype="multipart/form-data">
    <div class="profile-pic-container">
        <div class="profile-pic">
            <!-- Display the uploaded profile picture here -->
            <img id="profile-img" src="" alt=".">
        </div>
        <input type="file" id="profile-upload" accept="image/*">
        <label for="profile-upload" id="upload-label"><i class="fas fa-upload"><span class="icon">
                    <img src="uploadLogo-removebg-preview.png" alt="Icon Image">
                </span></i></label>
    </div>
    </form>
    <div id="artistContainer">
        <div id="artistName"><?=$user["artist_name"] ?></div>
        <!-- <div id="artistSurname"></div> -->
    </div>
    <p id="bioText"><?=$user["artist_bio"] ?></p>
    <button id="edit-profile-btn">Edit Profile</button>

    <div id="nameContainer" style="display: none;">
        <input type="text" id="nameInput" placeholder="Name">
    </div>

    <div id="bioContainer" style="display: none;">
        <textarea id="bioInput" placeholder="Bio"></textarea>
    </div>

    <button id="save-profile-btn" style="display: none;">Save</button>

    <hr class="circle-line">


    <div class="artist-navBar">

        <div class="artworksBar"><a href="#artworksL">Artworks</a></div>


        <div class="createBar"><a href="#createL">Create</a></div>


        <div class="profitBar"><a href="#profitL">Profit</a></div>


        <div class="logoutBar"><a href="#logoutL">Log Out</a></div>


    </div>


    
    <div class="create-container" style="margin-left: 25em; height: 400px; margin-right: 5em; margin-top: -10em">
    <div class="inputs">
        <input type="text" placeholder="Title" name="sell-title" id="sell-title">
        <select name="sell-category" id="sell-category">
            <option value="" disabled selected>Category</option>
            <option value="painting">Painting</option>
            <option value="photography">Photography</option>
            <option value="sculpture">Sculpture</option>
            <option value="pottery">Pottery</option>
            <option value="quilling">Quilling</option>
        </select>
        <textarea placeholder="Description" name="sell-description" id="sell-description" rows="5"></textarea>
        <input type="text" placeholder="Price" name="sell_price" id="sell_price">
        <button id="sell_save-button">Save</button>
    </div>
    <div class="product-upload-photo">
        <img src="../Sell/Sell_image/upload-icon.png" id="profileImage" alt="Profile Picture">
        <input type="file" id="imageUpload" accept="image/*">
    </div>
    <p class="uploadImagePara">Upload Image</p>
</div>

   



    <!--JS files here-->
    <script src="./artist_profileJS.js"></script>
    <script src="./saveName.js"></script>
    <script src="./updateName.js"></script>
    <script src="../Sell/Sell_js/upload.js"></script>
</body>

</html>