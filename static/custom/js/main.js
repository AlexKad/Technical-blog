
 $('a.slide').on('click', function(e) {
 	e.preventDefault();
 	var hash = this.hash;
 	$('.active').removeClass('active');

 	$('html, body').animate({ scrollTop: $(hash).offset().top }, 500,
 			 function(){ $(hash).addClass('active'); });
 });


function activateScrollSection(){
 if ($(this).scrollTop() > window.innerHeight/1.3) {
       $('#back-to-top').fadeIn();
   } else {
       $('#back-to-top').fadeOut();
   }

  $('#back-to-top').click(function (e) {
     $('body,html').stop(true,false).animate({ scrollTop: 0 }, window.innerHeight);
     $('#back-to-top').fadeOut();
     return false;
  });
}

window.addEventListener('scroll', activateScrollSection);


window.sr = ScrollReveal();
sr.reveal('.progress-value', {
  delay: 100,
  duration: 1000,
  origin: 'left',
  distance: '100%',
  easing: 'ease-out'
});

let step = {
  delay: 100,
  duration: 1000,
  distance: '100%',
  easing: 'ease-out'
};

sr.reveal('.step-1', {...step, origin: 'right'});
sr.reveal('.step-2', {...step, origin: 'left'});
sr.reveal('.step-3', {...step, origin: 'right'});
sr.reveal('.step-4', {...step, origin: 'left'});
sr.reveal('.step-5', {...step, origin: 'right'});


//register service worker for offline mode
//progressive enhancement: old browsers won't break
if('serviceWorker' in navigator) {
  navigator.serviceWorker
          .register('./custom/js/service-worker.js')
          .then(function() { console.log("Service Worker Registered"); });
}
