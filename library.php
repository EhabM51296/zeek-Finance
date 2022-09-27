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
    <link rel="stylesheet" href="css/library/library.css">
</head>
<?php
require "loadingScreen/loading.html";
// require "subscribe/subscribeBox.php";
// require "subscribe/subscribeSuccess.php";
// require "subscribe/subscribeMessage.php";
require "header/header.php";
require "header/underHeader.php";
?>
<?php
$titlesLibrary = array("Market & Equity Research Sample Report",
					  "Valuation Study Sample Report",
                      "Risk Management & Capital Restructuring Sample Report",
                      "Financial Statements Analysis Sample Report",
                      "Business Plan Sample Report",
                      "Feasibility Study Sample Report");
$imgLibrary = array("MarketAndEquity.png",
	         "valuationStudy.png",
             "riskManagement.png",
             "financialStatement.png",
             "businessPlan.png",
             "feasibilityStudy.png");
$libraryFiles = array("MarketAndEquityResearch.pdf","ValuationStudy.pdf","RiskManagement.pdf","FinancialStatement.pdf","BusinessPlan.pdf","FeasibilityStudy.pdf");
?>
<body>
<div id="allLibraries">
<?php       
for($i=0;$i<count($titlesLibrary);$i++)
{ 
echo'
    <div class="libraryParent" id="'.$libraryFiles[$i].'">
    <div class="library">
        <div class="libraryImg">
            <img src=assets/graphs/'.$imgLibrary[$i].' width=100% />
        </div>
        <div class="libraryDescription">
            <h1 class="robotBlack underLine txtBlack txtMedSecondary unSelectable">'.$titlesLibrary[$i].'</h1>
        </div>
        <div class="readMore">
            <p class="robotLight underLineFull txtBlue txtSmall unSelectable">View Report</p>
        </div>
    </div>
</div>';
}
?>
</div>
<?php
require "footer/footer.php";
?>
</body>
