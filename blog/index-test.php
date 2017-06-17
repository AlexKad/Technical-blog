<?php
    $xml=simplexml_load_file("content.xml") or die("Error: Cannot create object");
    $page = [];
    for($i=0; $i<5 && $i< count($xml);$i++){
		$page[$i] = $xml->article[$i];
		$page[$i] -> link = 'article.php?id='.$page[$i]['id'];
    }    
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">    
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="A professional blog of Aleksandra Orlova - an experienced independent web developer. Notes about javascript, html, css and related ares.">
	<meta name="keywords" content="web developer; javascript; html; css; jQuery; PHP">	
	<link rel="shortcut icon" href="../assets/custom/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../assets/custom/favicon.ico" type="image/x-icon">
	<title>Aleksandra. Web Development</title>
	
	<link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/vendors/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/vendors/fontawesome/css/bootstrap-social.css">
	<link rel="stylesheet" href="../assets/custom/css/blog.min.css?v=1">		
</head>
<body>
	<header class="header">
		<nav class="navbar" role="navigator">
			<div class="container-fluid">			
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="../index.html">About me</a></li>
					<li><a href="index.html">Blog</a></li>
				</ul>
			</div>							
		</nav>		

		<div class="container text-center">
			<h1>All about Web</h1>
			<h4 class="typing">Javascript, HTML, CSS</h4>			
		</div>	
	</header>
	<section class="main container">
		<?php if(count($page)  == 0) : ?>
			<p>Sorry, articles can't be loaded now. Please check this blog later.</p>
		<?php endif;?>
        <?php foreach ( $page as $item ) : ?>
        <div class="article">
			<a href="<?php print $item->link ?>" class="article-header">
				<?=$item[0]->title?></a>			
			<p><?=$item[0]->description?>
				<a href="<?php print $item->link ?>" class="more">Read more  &gt;&gt;</a>
			</p>				
		</div>
        <?php endforeach; ?>
	</section>	
	<footer class="footer">
		<p>Copyright © 2017<script>if( (new Date()).getFullYear() != 2017) document.write(' - '+ (new Date()).getFullYear() )</script> Aleksandra Orlova</p>
		<p>akad.alex@gmail.com</p>
	</footer>
</body>
</html>