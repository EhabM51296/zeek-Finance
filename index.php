<?php
session_start();
ob_start(); // needs to be added here
?>
<!DOCTYPE html>
<html>

<head>
<?php
require "SEO/seo.php";
?>
<script src="js/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/getData.js"></script>
</head>
<style></style>
<body id="mainBody">
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P6GLPVK"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <?php 
          
		  require "loadingScreen/loading.html";
	      require "header/header.php";
          require "home/firstSection.php";
		  require "home/aboutUs.html";
		  require "home/service.php";
		  require "home/blog.php";
		  require "home/library.php";
		 ?>
</body>
<?php
 require "footer/footer.php";
 ?>
 