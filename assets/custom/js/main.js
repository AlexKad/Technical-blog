
 $('a.slide').on('click', function(e) {
 	e.preventDefault();
 	var hash = this.hash;
 	$('.active').removeClass('active');

 	$('html, body').animate({ scrollTop: $(hash).offset().top }, 500,
 			 function(){ $(hash).addClass('active'); });
 });

 function activateScrollSection(){
 	const scrollPos = window.scrollY;
 	const sections = document.querySelectorAll('section');
	$('.active').removeClass('active');

 	sections.forEach(section => {
 		if(section.offsetTop <= scrollPos + window.innerHeight/1.3){
 			$(section).addClass('active');
 		}
 		else{
 			$(section).removeClass('active');
 		}
 	});
 	
 }


 window.addEventListener('scroll', activateScrollSection)