// Smooth scrolling function
function smoothScroll(targetId) {
    const targetElement = document.getElementById(targetId);
    if (targetElement) {
      const targetOffset = targetElement.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;
      const scrollToPosition = targetOffset + window.pageYOffset - (windowHeight / 10);
      window.scrollTo({
        top: scrollToPosition,
        behavior: 'smooth'
      });
    }
  }
  

  // Event listeners for smooth scrolling
  document.addEventListener('DOMContentLoaded', function() {
    const homeLink = document.querySelector('.homeHover a');
    homeLink.addEventListener('click', function(event) {
      event.preventDefault();
      smoothScroll('home_area');
    });

    const aboutLink = document.querySelector('.aboutHover a');
    aboutLink.addEventListener('click', function(event) {
      event.preventDefault();
      smoothScroll('about_area');
    });

    const catalogLink = document.querySelector('.catalogeHover a');
    catalogLink.addEventListener('click', function(event) {
      event.preventDefault();
      smoothScroll('catalog_area');
    });
  });