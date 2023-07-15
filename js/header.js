/*JS permettant de mettre en gras la page sur laquelle l'utilisateur se trouve*/

    var currentLocation = window.location.href;
    var navLinks = document.querySelectorAll('.navbar a');

    for (var i = 0; i < navLinks.length; i++) {
        if (navLinks[i].href === currentLocation) {
            navLinks[i].classList.add('active');
        }
    }
