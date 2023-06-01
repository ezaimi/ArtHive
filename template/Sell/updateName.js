// Wait for the document to load
document.addEventListener("DOMContentLoaded", function () {
    // Get the necessary elements
    var editProfileBtn = document.getElementById("edit-profile-btn");
    var nameContainer = document.getElementById("nameContainer");
    var nameInput = document.getElementById("nameInput");
    var saveProfileBtn = document.getElementById("save-profile-btn");
    var artistName = document.getElementById("artistName");

    // Add click event listener to the Edit Profile button
    editProfileBtn.addEventListener("click", function () {
        // Hide the artist name and show the name input field
        artistName.style.display = "none";
        nameContainer.style.display = "block";
        nameInput.value = artistName.textContent.trim();
    });

    // Add click event listener to the Save button
    saveProfileBtn.addEventListener("click", function () {
        // Retrieve the updated name
        var updatedName = nameInput.value.trim();

        // Perform form validation if necessary

        // Send an AJAX request to update the name in the database
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_name.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                // Handle the response from the server
                var response = xhr.responseText;
                if (response === "success") {
                    // Update the artist name on the page
                    artistName.textContent = updatedName;
                    // Hide the name input field and show the artist name
                    artistName.style.display = "block";
                    nameContainer.style.display = "none";
                } else {
                    // Handle error case
                    console.log("Error: " + response);
                }
            }
        };
        xhr.send("name=" + encodeURIComponent(updatedName));
    });
});
