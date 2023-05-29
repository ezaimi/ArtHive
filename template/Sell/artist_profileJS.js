const profileUploadInput = document.getElementById('profile-upload');
const profileImage = document.getElementById('profile-img');

profileUploadInput.addEventListener('change', function (event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.addEventListener('load', function () {
        profileImage.src = reader.result;
    });

    if (file) {
        reader.readAsDataURL(file);
    }
});
