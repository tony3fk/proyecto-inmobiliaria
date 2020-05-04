 //scripts para el scroll de la página
    $(document).ready(function() {
        $('#bContact').click(function() {
            var destino = $(this.hash); //this.hash lee el atributo href de este
            $('html, body').animate({
                scrollTop: destino.offset().top
            }, 700); //Llega a su destino con el tiempo deseado
            return false;
        });
        $('#ir-arriba').click(function() {
            $('body, html').animate({
                scrollTop: '0px'
            }, 300);
        });

        $(window).scroll(function() {
            if ($(this).scrollTop() > 0) {
                $('#ir-arriba').slideDown(300);
            } else {
                $('#ir-arriba').slideUp(300);
            }
        });
    });