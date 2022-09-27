<?php
session_start();
?>
<head>

	<script src="js/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/getData.js"></script>
</head>
<?php
require "loadingScreen/loading.html";
require "header/header.php";
require "header/underHeader.php";
require "contactUs/info.php";
require "contactUs/sendMail.php";
?>

<?php
require "footer/footer.php";
?>