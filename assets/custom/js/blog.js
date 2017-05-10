$('a.slide').on('click', function(e) {
 	e.preventDefault();
 	let hash = this.hash; 	

 	$('html, body').animate({ scrollTop: $(hash).offset().top }, 500);
 });

$(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
        $('#back-to-top').fadeIn();
    } else {
        $('#back-to-top').fadeOut();
    }
});        

$('#back-to-top').click(function (e) {
    $('#back-to-top').tooltip('hide');
    $('body,html').animate({ scrollTop: 0 }, 500);
    return false;
});
        