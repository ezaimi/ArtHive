// const createBar = document.querySelector('.createBar');
// const createSection = document.querySelector('.create-container');

// createBar.addEventListener('click', function () {
//     if (createSection.style.display === 'none') {
//         createSection.style.display = 'block';
//     } else {
//         createSection.style.display = 'none';
//     }
// });




// function toggleArtworks() {
//     console.log("ok");
//     var blur = document.getElementById('blur');
//     blur.classList.toggle('active');

//     /*popup-i*/
//     var popup = document.getElementById('popup');
//     popup.classList.toggle('active');
// }


// document.addEventListener('DOMContentLoaded', function () {
//     const artworksLink = document.getElementById('artworksLink');
//     const createLink = document.getElementById('createLink');
//     const createSection = document.querySelector('.create-container');

//     artworksLink.classList.add('active'); // Display Artworks link by default
//     createSection.style.display = 'none'; // Hide create-container by default

//     createLink.addEventListener('click', function (event) {
//         event.preventDefault(); // Prevent default link behavior
//         artworksLink.classList.remove('active'); // Remove active class from Artworks link
//         createLink.classList.add('active'); // Add active class to Create link
//         createSection.style.display = 'block'; // Display create-container
//     });

//     artworksLink.addEventListener('click', function (event) {
//         event.preventDefault(); // Prevent default link behavior
//         artworksLink.classList.add('active'); // Add active class to Artworks link
//         createLink.classList.remove('active'); // Remove active class from Create link
//         createSection.style.display = 'none'; // Hide create-container
//     });
// });

function toggleSection(activeLink, section) {
    const links = document.querySelectorAll('.artist-navBar a');
    links.forEach(function (link) {
        link.classList.remove('active');
    });
    activeLink.classList.add('active');

    const sections = document.querySelectorAll('.section');
    sections.forEach(function (section) {
        section.style.display = 'none';
    });
    section.style.display = 'block';
}

document.addEventListener('DOMContentLoaded', function () {
    const artworksLink = document.getElementById('artworksLink');
    const createLink = document.getElementById('createLink');
    const profitLink = document.getElementById('profitLink');
    const logoutLink = document.getElementById('logoutLink');
    const createSection = document.getElementById('createSection');
    const artworksSection = document.getElementById('artworksSection');
    const profitSection = document.getElementById('profitSection');
    const logoutSection = document.getElementById('logoutSection');

    artworksLink.classList.add('active');
    createSection.style.display = 'none';
    profitSection.style.display = 'none';
    logoutSection.style.display = 'none';

    createLink.addEventListener('click', function (event) {
        event.preventDefault();
        toggleSection(createLink, createSection);
    });

    artworksLink.addEventListener('click', function (event) {
        event.preventDefault();
        toggleSection(artworksLink, artworksSection);
    });

    profitLink.addEventListener('click', function (event) {
        event.preventDefault();
        toggleSection(profitLink, profitSection);
    });

    logoutLink.addEventListener('click', function (event) {
        event.preventDefault();
        toggleSection(logoutLink, logoutSection);
    });
});
