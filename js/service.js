$(document).ready(function() {
    $('.service, .medecin-info').each(function(index) {
        $(this)
            .delay(200 * index)
            .animate({
                    opacity: 1,
                    transform: 'translateY(0)'
                },
                800
            )
    })

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
})