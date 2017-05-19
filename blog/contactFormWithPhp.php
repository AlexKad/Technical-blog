<?php
$page_description='A professional blog of Aleksandra Orlova - an experienced independent web developer. Notes about SMTP authentication with PHP mail. Creating simple contact us form with HTML, jQuery and PHP.';
$page_keywords='web developer; javascript; html; css; jQuery; PHP; SMTP; mail; contact form';
include('templates/header.php');
?>

<section class="main container">
		<div class="article">
			<h2>Contact form with PHP mail() and SMTP authentication</h2>
			<p>When you developing web sites in most cases you facing up with necessity to create 'contact us' form. No matter if it is a simple landing page for a small business, portfolio web site or a huge web platform, everyone wants to communicate, leave a feedback, ask question or whatever. Whereas some popular CMS platforms provide developers with different mailing addons, you might need something simple with possibility to customize it. Here is my simple 'contact us' form with HTML and PHP.</p>

			<p>First of all let's create simple HTML form:</p>
			<iframe width="100%" height="300px" src="https://jsfiddle.net/alex_o/uwdqxLx1/3/embedded/html,css,result/" allowfullscreen="allowfullscreen" frameborder="0"></iframe>

			<p>How can you send email messages directly from script? The best way is by using php <code>mail()</code> function. Signature is pretty simple: <code>mail(to, subject, message, headers, parameters);</code>. But the problem here is that php <code>mail()</code> by default doesn't support SMTP authentication, required by many mail servers today. Luckely there is free <a href="http://pear.php.net/package/Mail" target="_blank">PEAR Mail</a> package in PHP4 and later versions, that will allow us to work with SMTP authentication.</p>
			<pre><code>&lt;?php
	require_once "Mail.php";

	// read values from user inputs	 				 
	$from = Trim(stripslashes($_POST['email'])); 	
	$name = Trim(stripslashes($_POST['name'])); 
	$message = Trim(stripslashes($_POST['message']));

	// set your email address and subject. Make body from values above
	$to = "alex &lt;akad.alex@gmail.com&gt;";
	$subject = "New Message from website!";
	$body = "Name: ".$name."\n"."Message: ".$message;
	 
	// Set your smtp server, and login/password for authentification
	$host = "cpanel.freehosting.com";
	$username = "mailaccount@aleksandraweb.com";
	$password = "here_is_your_password";
	 
	//create headers 
	$headers = array ('From' =&gt; $from,
	   		  'To' =&gt; $to,
	   		  'Subject' =&gt; $subject);
	//set smptp connection
	$smtp = Mail::factory('smtp',
	   array ('host' =&gt; $host,
	     'auth' =&gt; true,
	     'username' =&gt; $username,
	     'password' =&gt; $password));

	//send mail
	$mail = $smtp-&gt;send($to, $headers, $body);
	 
	//handling response and possible errors 
	if (PEAR::isError($mail)) {
	   echo("&lt;p&gt;" . $mail-&gt;getMessage() . "&lt;/p&gt;");
	 } else {
	   echo("&lt;p&gt;Message successfully sent!&lt;/p&gt;");
	}
?&gt;</code></pre>
			<p>In the tag <code>form</code> in our html, I've added <code>action='contact.php'</code> and <code>method='post'</code>. So when user click 'Send' button inside form it will trigger 'submit' event on form, which will send data to contact.php . Inside php we will parse data, create headers and body for message, set smtp authentication and finally send email. <i>(Notice that action='contact.php' wouldn't work in jsFiddle!)</i></p>

			<p>This solution works pretty good, but there are couple of things, that I don't like here. First of all, sending a message might take time and there is nothing that will indicate our user that message is in processing. Another disturbing thing is that after submitting form, our page reloads. It in unnecessary, especially in case of landing page or SPA.</p>

			<p>So, I've decided to add jQuery and handle submit event for the form before sending data to php. That allows me to use <code>event.preventDefault()</code> to stop reloading page after submition, and add <code>loading</code> class while message is sending.</p>
			<iframe src="https://jsfiddle.net/alex_o/uwdqxLx1/5/embedded" width="100%" height="450px" frameborder="0"></iframe>

			<p>Also I've added 2 divs. One for showing details of sending message, another one is for loading mask. Here I added mask with header 'loading...' but you can use gif animation like <a href="http://ajaxload.info/" target="_blank">this</a>.</p>

			<p>The full version of contact form with all files you can find <a href="https://github.com/AlexKad/Layout-Templates/tree/master/ContactFormPHP" target="_blank">here</a>.</p>
		</div>

		<div id="disqus_thread"></div>
		<script>		
		var disqus_config = function () {
			this.page.url = 'http://aleksandraweb.com/blog/contactFormWithPhp.html';
			this.page.identifier = 'article_contactFormPHP';
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