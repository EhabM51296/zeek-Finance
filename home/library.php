<head>
    <link rel="stylesheet" href="css/home/library.css">
</head>
<?php
$libraryTitle = array("Market & Equity Research Sample Report",
					  "Valuation Study Sample Report",
                      "Risk Management & Capital Restructuring Sample Report",
                      "Financial Statements Analysis Sample Report",
                      "Business Plan Sample Report",
                      "Feasibility Study Sample Report");
$libraryImg = array("MarketAndEquity.png",
	         "valuationStudy.png",
             "riskManagement.png",
             "financialStatement.png",
             "businessPlan.png",
             "feasibilityStudy.png");
$libraryFiles = array("MarketAndEquityResearch.pdf","ValuationStudy.pdf","RiskManagement.pdf","FinancialStatement.pdf","BusinessPlan.pdf","FeasibilityStudy.pdf");
?>

<div id="Library">
    <h3 id="ourLibrary" class="robotBold center txtBlue txtSmall unSelectable">Sample Reports</h3>
    <h1 class="title robotBlack center txtBlack underLineLeft txtMed unSelectable">Our Library</h1>
    <div id="allLibraries">
    <?php       
for($i=0;$i<count($libraryTitle);$i++)
{ echo'
    <div class="LibraryParent" id="'.$libraryFiles[$i].'">
    <div class="Library">
        <div class="LibraryImg">
            <img src="assets/graphs/'.$libraryImg[$i].'" width=100% />
        </div>
        <div class="LibraryDescription">
            <h1 class="robotBlack underLine txtBlack txtMedSecondary unSelectable">'.$libraryTitle[$i].'</h1>
        </div>
        <div class="readMore">
            <p class="robotLight underLineFull txtBlue txtSmall unSelectable">View Report</p>
        </div>
    </div>
</div>';
}
?>
</div>
<div class="arrow">
        <img src="assets/icons/arrow.png" class="right next"/>
        <img src="assets/icons/arrow.png" class="left prev"/>
     </div>
</div>


<script>
    var cLibrary = 0;
    $("#Library .next").click(function(){
        var w = window.innerWidth;
        if((cLibrary!=3 && w>=601) || (cLibrary!=5 && w<=600))
        {
        var elem = document.getElementsByClassName("LibraryParent")[0];
        var scroll = elem.clientWidth;
       $('#allLibraries').animate( { scrollLeft: '+='+scroll }, 500);
        cLibrary+=1;
        }
        else
        return 0;

        });
        $("#Library .prev").click(function(){
            if(cLibrary!=0)
        {
        var elem = document.getElementsByClassName("LibraryParent")[0];
        var scroll = elem.clientWidth;
       $('#allLibraries').animate( { scrollLeft: '-='+scroll }, 500);
        cLibrary-=1;
        }
        else
        return 0;
        });
</script>