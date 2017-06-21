<?php
$page_description='A professional blog of Aleksandra Orlova - an experienced independent web developer. Notes about Sublime text editor and Emmet plugin. Increase your development speed with light and easy to use plugin!';
$page_keywords='web developer; sublime; emmet; zen coding; html;css; improve process';
include('templates/header.php');
?>

<section class="main container">
		<div class="article">
			<h2>Sublime and Emmet. Increase your development speed.</h2>
			<p>Today I'm going to tell few words about one of my favorite editors <a href="https://www.sublimetext.com/" target="_blank">Sublime text</a>. It's very light, easy to use, provides many interesting user settings like changing color schemes or fonts, and the most important - it has plenty of usefull plugins, that helps to improve the speed and quality of the development. </p>
			<p>The first thing you need to do after sublime text installation is to download and instal package manager. It is pretty easy to do by following <a href="https://packagecontrol.io/installation" target="_blank">these instructions</a>. This package manager will help you to find, install and monitor different plugins, like js minificators, less/sass compilers, bootstrap snippets, linting, formatting and many many other cool things. By the way you can write your own packages!</p>
			<p>My the most favorite one is Emmet (formal known as Zen coding). This thing saved me so much time! (so I have enough to write some articles &#9786;). So let me show how to install it and what it can do.</p>
			<ol>
				<li>To open package control click <code>Ctrl + Shift + P</code> or select <code>Preferences -> Package Control </code></li>
				<li>Find <code>Package Control: Install Package</code>. When you click on it new window appears.</li>
				<li>Type <code>Emmet</code> inside this window and click on the first top link.</li>
				<li>Restart Sublime and enjoy!</li>
			</ol>
			<div>
				<img src="assets/gifs/install_emmet.gif" alt="Install emmet" class='gif_source img-responsive'>		
			</div>
			<p>So what's cool about Emmet? It allows you to save time when you creating html and css files. You no longer needed to type long lines of code, creating opening and closing tags, copy/paste lorem text - Emmet will do it for you! Need to start new HTML5 document? No problem, just type <code>!</code> and press <code>Tab</code> and let the magic happen!</p>
			<div>
				<img src="assets/gifs/create_html5.gif" alt="Create html5 document with emmet" class='gif_source img-responsive'>		
			</div>
			<p>You can create elements with specific id <code>div#wrapper</code> and specific class <code>div.main</code>, you can create several items <code>li*3</code>, you can generate several items inside one <code>ul&gt;li*5</code> and you can generate lorem ipsum text with any amount of words you want <code>p&gt;lorem30</code>.</p>
			<div>
				<img src="assets/gifs/create_elements.gif" alt="Create html elements with emmet" class='gif_source img-responsive'>		
			</div>
			<p>If you want learn more about this powerfull plugin abbreviations, visit <a href="https://docs.emmet.io/abbreviations/syntax/">official emmet documentation</a>. Optimize your work to save more time for creating cool things!</p>
		<div id="disqus_thread"></div>
		<script>		
		var disqus_config = function () {
			this.page.url = 'http://aleksandraweb.com/blog/sublimeAndEmmet.php';
			this.page.identifier = 'article_sublimeAndEmmet';
		};
		(function() { // DON'T EDIT BELOW THIS LINE
		var d = document, s = d.createElement('script');
		s.src = 'https://blogtalk-1.disqus.com/embed.js';
		s.setAttribute('data-timestamp', +new Date());
		(d.head || d.body).appendChild(s);
		})();
		</script>
		<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>			
	</section>
<?php
include('templates/footer.html');
?>