const navbar = document.querySelector('.navbar');

function navbarShadow() {
    if (window.scrollY > 10) {
        navbar.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.25)';
    } else {
        navbar.style.boxShadow = 'none';
    }
}

document.addEventListener('scroll', navbarShadow);