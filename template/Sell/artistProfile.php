<?php
   session_start();
if(isset($_SESSION["user_id"])){
    $mySqli = require __DIR__ . "../../LogInBackEnd/database.php";
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

<body>
    <div class="artistProfile-rectangle"></div>
    <div class="artistProfile-circle"></div>

    <div class="profile-pic-container">
        <div class="profile-pic">
            <!-- Display the uploaded profile picture here -->
            <img id="profile-img" src="path/to/default-image.jpg" alt=".">
        </div>
        <input type="file" id="profile-upload" accept="image/*">
        <label for="profile-upload" id="upload-label"><i class="fas fa-upload"><span class="icon">
                    <img src="uploadLogo-removebg-preview.png" alt="Icon Image">
                </span></i></label>
    </div>
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

   



    <!--JS files here-->
    <script src="./artist_profileJS.js"></script>
    <script src="./saveName.js"></script>
    <script src="./updateName.js"></script>

</body>

</html>