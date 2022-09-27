<?php
session_start();
?>
<head>
    <link rel="stylesheet" href="css/404Error/404Error.css">
    <script src="js/jquery.min.js"></script>
</head>
<?php
require "header/header.php";
?>
<div id="Error" class="center">
    <h1 class="robotBold txtVlarge unSelectable">404 Not Found</h1>
    <p class="robotMedium txtMed unSelectable">The page you requested cannot be found.
    </p>
</div>

<?php
require "footer/footer.php";
?>