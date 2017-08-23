<?php
	error_reporting(0); //for debugging use 'E_ALL'
	$keywords = '';
 	if($xml=simplexml_load_file("content.xml") ){
 		$id = $_GET['id']; // parse query param from url
		$src ='';
		$article = $xml->xpath("//article[@id='".$id."']")[0];
		if($article){
		 	$title = $article->title;
		 	$keywords = $article->keywords;
		 	$src = $article->src;
		}
 	}else{
 		//error handling
 	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta name="description" content="<?php echo $page_description; ?>"> -->
	<meta name="keywords" content="<?php echo $keywords; ?>">
	<link rel="shortcut icon" href="../assets/custom/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../../assets/custom/favicon.ico" type="image/x-icon">

	<title>Aleksandra. Web Development</title>
	<link rel="stylesheet" href="../../assets/vendors/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/vendors/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../assets/vendors/fontawesome/css/bootstrap-social.css">
	<link rel="stylesheet" href="../../assets/custom/css/blog.css">

</head>
<body>
	<header class="header">
		<nav class="navbar fixed-top" role="navigator">
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="../index.html">About me</a></li>
					<li><a href="index">Blog</a></li>
				</ul>
		</nav>

		<div class="container text-center blog-header">
			<h1>All about Web</h1>
			<h4 class="typing">Javascript, HTML, CSS</h4>
		</div>
	</header>

	<?php
		if($article){
		  include('articles/'.$src);
		}
		else echo '<section class="main container">
			<h3>This article is not found</h3>
			</section>';
	 ?>

	<div class="btn-top" id="back-to-top">
		<a href="#"><span class="fa fa-chevron-up" title="Click to return on the top page"></span></a>
	</div>

	<footer class="footer">
		<p>Copyright © 2017<script>if( (new Date()).getFullYear() != 2017) document.write(' - '+ (new Date()).getFullYear() )</script> Aleksandra Orlova</p>
		<p>akad.alex@gmail.com</p>
	</footer>
	<script src="../../assets/vendors/jQuery/jquery-3.1.1.min.js"></script>
	<script src="../../assets/custom/js/blog.min.js"></script>
</body>
</html>
