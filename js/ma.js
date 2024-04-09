$(document).ready(function() {
    // Animation de défilement vers le haut
    $('.go-top').click(function() {
        $('html, body').animate({ scrollTop: 0 }, 'slow');
        return false;
    });

    // Affichage/masquage du footer
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('.go-top').fadeIn();
        } else {
            $('.go-top').fadeOut();
        }
    });
});