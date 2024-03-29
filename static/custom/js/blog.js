$('a.slide').on('click', function(e) {
 	e.preventDefault();
 	var hash = this.hash;

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
    $('body,html').animate({ scrollTop: 0 }, 500);
    $('#back-to-top').fadeOut();
    return false;
});

$('.blog-header').click(function(e) {
	window.location = 'index';
});

$('.nav-block').on('click', function(e) {
  e.preventDefault();
  var hash = $(this).data('target');
  $('html, body').animate({ scrollTop: $(hash).offset().top }, 500);
});


function preview(element) {
   var newTab = window.open();
   var imgSrc = element.dataset.img;

   setTimeout(function () {
       newTab.document.body.innerHTML = `<img src='${imgSrc}' width='100%'>`;
   }, 0);
   return false;
}
