//Galeria
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});

//Scroll Page
$('a.scroll_section').on('click',function (e) {
    // e.preventDefault();
    var target = this.hash,
    $target = $(target);

   $('html, body').stop().animate({
     'scrollTop': $target.offset().top-90
    }, 2500, 'swing', function () {
     window.location.hash = target;
    });
});