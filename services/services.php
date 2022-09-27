<head>
	<script src="js/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/getData.js"></script>
    <link rel="stylesheet" href="css/services/services.css">
</head>
<?php
require "loadingScreen/loading.html";
require "header/header.php";
require "header/underHeader.php";
?>
<body>
<div id="allServices">
<?php       
for($i=0;$i<count($titles);$i++)
{ 
echo'
    <div class="serviceParent">
	<a href=services.php?service='.urlencode($titles[$i]).'>
    <div class="service windowsHover">
        <div class="serviceImg dropWindows">
            <img src=assets/images/'.$img[$i].' width=100% />
        </div>
        <div class="serviceDescription">
            <h1 class="robotBlack underLine txtBlack txtMedSecondary unSelectable">'.$titles[$i].'</h1>
            <p class="robotLight desc txtweakBlack txtSmall unSelectable">'.$desc[$i].'</p>
        </div>
        <div class="readMore">
            <p class="robotLight underLineFull txtBlue txtSmall unSelectable">Read More</p>
        </div>
    </div>
	</a>
</div>';
}
?>
</div>
<?php
require "footer/footer.php";
?>
</body>
