<?php
session_start();
?>
<head>
<?php
require "SEO/seo.php";
?>
	<script src="js/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/getData.js"></script>
    <link rel="stylesheet" href="css/aboutUs/aboutUs.css">
</head>

<?php

require "loadingScreen/loading.html";
require "header/header.php";
require "header/underHeader.php";
require "home/aboutUs.html";
?>
<head>
<style>
#aboutUsViewMore{
    visibility: hidden;
}
</style>
</head>
<div id="Team">
    <p id="professionalTitle" class="robotBold txtBlue center txtSmall">PROFESSIONAL TEAM</p>
    <h1 id="experienceTitle" class="robotBlack txtBlack underLineLeft center txtMed">We are Analysts and Strategists</h1>
    <div id="teamGrid">
        <div class="member">
            <div class="memberDetails center">
            <h2 class="robotBold txtMedSecondary unSelectable">Ramzi Arnous
				<p class="txtBlack robotMedium txtTinyBig unSelectable">FMVA, CertIFR, CMSA, CertBV</p>
			</h2>
			<div class="memberJob">
            <p class="txtBlue robotMedium txtTinyBig unSelectable">Head Of Operations</p>
            <p class="txtBlue robotMedium txtTinyBig unSelectable">More than 25 years in Field 
            of Accounting and Financial Management, 
            with high Managerial positions in Local
            and multinational Companies.</p>
			</div>
           </div>
            <img src="assets/images/ramzi.jpg" loading="lazy"/>
        </div>
        <div class="member">
        <div class="memberDetails center">
        <h2 class="robotBold txtMedSecondary unSelectable">Bahij Hamadeh</h2>
		<div class="memberJob">
        <p class="txtBlue robotMedium txtTinyBig unSelectable">Business Development</p>
        <p class="txtBlue robotMedium txtTinyBig unSelectable">With more than 25 years experience in Banking and Financial Services Sector.
        </p>
		</div>
        </div>
            <img src="assets/images/baheej.jpg" loading="lazy"/>
        </div>
    </div>
</div>

<?php
require "footer/footer.php";
?>