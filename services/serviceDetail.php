<head>
	<script src="js/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/getData.js"></script>
    <link rel="stylesheet" href="css/serviceDetail/serviceDetail.css">
</head>

<?php
require "loadingScreen/loading.html";
require "header/header.php";
require "header/underHeader.php";
if(!isset($_GET['service']))
{
	require "./header/to404.php";
	
}
$blockClasses = array("");
for($i=0;$i<count($titles);$i++)
	$blockClasses[$i] = "lightBlacktxt";
$index = array_search($url, $allServices);
$blockClasses[$index] = "blueWhitetxt";
$bottomServices = "We encourage you to visit our library for sample reports.";
if($url == $titles[0])
{
	$intro = "Accounting is the language of business. We provide our clients with the below";
	$detailService = array(
		array("Financial Statements",
			  "Financial Analysis",
			  "Performance Measurement",
			  "Internal Control",
			  "Budgeting"),
		array("We prepare stand alone Financial Statements and Consolidated ones on monthly basis compatible with IFRS.",
		      "Analyzing Financial Statements , Vertical and Horizontal analysis, monitoring trends.<br/>
			  In order to maximize the value of the corporation and take advantage of the firm's strengths and correct its weaknesses, we provide
			  Ratio analysis (Liquidity, Asset management, Debt management, Profitability), Compare to benchmark ratios, and suggest accordingly.",
			  "Financial KPIs with policies to enhance and improve financial indicators.",
			  "Designing solid internal control structure , Flow of documents between departments, and segregation of duties.",
			  "Preparing and monitored budgets with Variance analysis interpretations,
			  notify and advice top management for risks and better practice.")
	);
}
else if($url == $titles[1])
{
	$intro = "It is important for the business to know where is standing and where to be in future. We provide our clients with the below";
	$detailService = array(
		array("Financial Planning and Modeling",
			  "Risk Management & Capital Restructuring",
			  "Dividend Policies"),
		array("Projecting Financial Statements, presenting and discussing with stakeholders. Realistic Vs Robust modeling, 
		     Forecasting Revenues, EBIT, Working capital, Financing, Cash Flows, CAPEX, Projecting income statement,
			 Balance sheet & Cash flow statement.",
			 "Operational risk related to sales trends, variable costs, fixed costs.<br/>Calculating degree of operating & financial leverage.  Breakeven point & analysis.<br/>Determining the 
			 optimal capital structure and minimum WACC (optimal % of a mix between debt and equity).<br/>Assessing Business risk and Financial risk.",
			 "Establishing the Dividend policy of the business, setting the target payout ratio for a period of 5 years based on 
			 anticipated free cash flows.")
	);
}
else if($url == $titles[2])
{
	$intro = "Investment in CAPEX is critical and need high investment. We provide our clients with the below";
	$detailService = array(
		array("Capital Budgeting and Feasibility Studies",
	          "Scenario and Sensitivity Analysis"),
		array("Conducting Feasibility studies and Capital Budgeting that includes estimating operating cash flows and project valuations like 
		      (NPV, IRR , MIRR, Payback Periods, Discounted Payback).",
		      "Producing feasibility studies with different scenarios that will be build to our financial model.
			  Determining sensitivity of NPV and IRR when changing factors like discount factor and projected sales volume.")
	);
}
else if($url == $titles[3])
{
	$intro = "It is essential to value companies when to raise capital, acquire new companies, or sell the business. We provide our clients with the below";
	$detailService = array(
		array("Business Valuation"),
		array("We use several useful approaches applied worldwide when it is applicable as
		      Market Approach, Comparable companies, Precedent transactions, DCF (Discounted Cash Flow Approach), Cost Approach.<br/>Estimating Equity value and Enterprise value.")
	);
}
else if($url == $titles[4])
{
	$intro = "Corporations need to expand business, either by new products, or new regions, or by acquisition, we provide our clients with the below";
	$detailService = array(
		array("Market and Equity Research",
	          "External and Internal Analysis",
			  "Current strategies and Strategic alternatives"),
		array("Economic indicators and analysis, Industry analysis, Market and Competitive positioning.",
		      "Five competitive forces, PEST analysis, SWOT analysis, Resources and Capabilities, Differentiation and Cost.",
			  "Building alternative strategies based on each level like (Corporate, Business, Functional).")
	);
}

else if($url == $titles[5])
{
	$intro = "Finance is a broad science, one cannot determine all needed, we can create solution materials for every special purpose.";
	$detailService = array(
		array("Dashboard and Data Visualization",
	          "PowerPoint and Pitch Books",
			  "Scenario and Sensitivity Analysis"),
		array("Presenting financial numbers in graphs and dashboards for prompt evaluation, understanding and decision making.",
		      "PowerPoint layout, Useful functions, sections, structure, organization and timeline. Slides, formatting, and alignment.",
			  "All our studies are subject to different scenarios, and sensitivity, that will be build and controlled by a click in our financial model.
			  Choose your scenario automatically in the financial model like (consensus, Bull, Bear), or (normal, upside, downside),
			  then measure  your risks, and evaluate the appropriate scenario that you are convinced with.")
	);
}
?>
<div id="serviceDetailsContainer">
<div id="serviceDetails">
	<div id="otherServices">
	<?php
		for($i=0;$i<count($titles);$i++)
		{
			echo'<a href="services.php?service='.urlencode($titles[$i]).'">
					<div class="serviceBlock blueColorHover '.$blockClasses[$i].'"><p class="robotRegular unSelectable">'.$titles[$i].'</p></div>
				</a>';
		}
	?>
	</div>
	<div id="currentService">
		<div id="currentServiceImage">
			<img src="assets/images/<?php echo $img[$index];?>"/>
		</div>
		<div id="currentServiceInfo">
			<h1 class="robotBlack underLine txtBlack txtMed unSelectable">
				<?php echo $titles[$index]; ?>
			</h1>
			<p class="robotLight txtBlack txtSmall intro unSelectable">
				<?php echo $intro;?>
			</p>
			<ul class="noStyle">
				<?php
				for($i=0;$i<count($detailService[0]);$i++)
					echo "<li class='robotBold txtBlack txtMedSecondary unSelectable'>".$detailService[0][$i]."</li>
						  <span class='robotLight txtweakBlack txtSmall unSelectable'>".$detailService[1][$i]."</span>";
					echo "<a href='library.php' class='robotLight txtSmall bottomServices underLineAnimation
					unSelectable'>".$bottomServices."</a>";
				?>
			</ul>
		</div>
	</div>
</div>
</div>
<?php
require "footer/footer.php";
?>