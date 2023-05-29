// const profileUploadInput = document.getElementById('profile-upload');
// const profileImage = document.getElementById('profile-img');

// profileUploadInput.addEventListener('change', function (event) {
//     const file = event.target.files[0];
//     const reader = new FileReader();

//     reader.addEventListener('load', function () {
//         profileImage.src = reader.result;
//     });

//     if (file) {
//         reader.readAsDataURL(file);
//     }
// });


// Get the file input and label elements
const profileUpload = document.getElementById('profile-upload');
const uploadLabel = document.getElementById('upload-label');

// Listen for file input changes
profileUpload.addEventListener('change', function () {
    if (this.files && this.files[0]) {
        // A file is selected, show the uploaded image
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('profile-img').src = e.target.result;
            // Hide the upload label
            uploadLabel.classList.add('hide');
        };
        reader.readAsDataURL(this.files[0]);
    }
});

// Listen for clicks on the profile picture to trigger file input click
document.getElementById('profile-img').addEventListener('click', function () {
    profileUpload.click();
});
