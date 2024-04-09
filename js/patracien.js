$(document).ready(function() {
    // Smooth scrolling
    $('.main-li a, .go-top').on('click', function(event) {
        if (this.hash !== '') {
            event.preventDefault();
            const hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800);
        }
    });

    // Bouton "Haut de page"
    $('.go-top').click(function() {
        $('html, body').animate({
                scrollTop: 0
            },
            800
        )
    })

    // Afficher/Masquer bouton "Haut de page"
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.go-top').fadeIn()
        } else {
            $('.go-top').fadeOut()
        }
    })

});