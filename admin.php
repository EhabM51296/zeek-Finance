<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
<script src="js/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/getData.js"></script>
</head>
<style></style>
<body>
    <?php 	
		  require "loadingScreen/loading.html";
	      require "header/header.php";
         
		 ?>
</body>
<?php
if(isset($_SESSION['Admin']))
{
    require "admin/clientsInfo.php";
}
else
    require "admin/adminInfo.php";
?>
<?php
 require "footer/footer.php";
 ?>
 