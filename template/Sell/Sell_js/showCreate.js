function toggleSection(activeLink, section) {
    const links = document.querySelectorAll('.artist-navBar a');
    links.forEach(function (link) {
        link.classList.remove('active');
    });
    if (activeLink && activeLink.classList) {
        activeLink.classList.add('active');
    }
    console.log("bc");
    const sections = document.querySelectorAll('.section');
    sections.forEach(function (section) {
        section.style.display = 'none';
    });
    if (section && section.style) {
        section.style.display = 'block';
    }
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
        toggleSection(createLink, createSection); // Pass the element itself as activeLink
        console.log("Eriiiiiiiiiaaaaaaa");
    });

    artworksLink.addEventListener('click', function (event) {
        event.preventDefault();
        toggleSection(artworksLink, artworksSection); // Pass the element itself as activeLink
        console.log("ErA");
    });

    profitLink.addEventListener('click', function (event) {
        event.preventDefault();
        toggleSection(profitLink, profitSection); // Pass the element itself as activeLink
        console.log("ErAAAA");
    });

    logoutLink.addEventListener('click', function (event) {
        event.preventDefault();
        toggleSection(this, logoutSection); // Pass the element itself as activeLink
    });
});


