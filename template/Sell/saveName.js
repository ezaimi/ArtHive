const nameInput = document.getElementById("nameInput");
const saveButton = document.getElementById("save-profile-btn");
const artistName = document.getElementById("artistName");

saveButton.addEventListener("click", () => {
    const name = nameInput.value;
    artistName.textContent = name;
});

const bioInput = document.getElementById("bioInput");
const bioText = document.getElementById("bioText");

saveButton.addEventListener("click", () => {
    const name = nameInput.value;
    artistName.textContent = name;
});



const editProfileBtn = document.getElementById('edit-profile-btn');
const saveProfileBtn = document.getElementById('save-profile-btn');
const nameContainer = document.getElementById('nameContainer');
const bioContainer = document.getElementById('bioContainer');



editProfileBtn.addEventListener('click', () => {
    artistName.style.display = 'none';
    bioText.style.display = 'none';
    editProfileBtn.style.display = 'none';

    nameContainer.style.display = 'block';
    bioContainer.style.display = 'block';
    saveProfileBtn.style.display = 'block';
});

saveProfileBtn.addEventListener('click', () => {
    const nameInput = document.getElementById('nameInput');
    const bioInput = document.getElementById('bioInput');

    artistName.textContent = nameInput.value;
    bioText.textContent = bioInput.value;

    nameContainer.style.display = 'none';
    bioContainer.style.display = 'none';
    saveProfileBtn.style.display = 'none';

    artistName.style.display = 'block';
    bioText.style.display = 'block';
    editProfileBtn.style.display = 'block';
});
