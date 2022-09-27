<head>
    <link rel="stylesheet" href="css/home/services.css">
</head>
<?php
require "services/getServices.php"
?>

<div id="services">
    <h3 id="ideas" class="robotBold center txtBlue txtSmall unSelectable">Unique Ideas</h3>
    <h1 class="title robotBlack center txtBlack underLineLeft txtMed unSelectable">Our Services</h1>
    <div id="allServices">
 <?php       
for($i=0;$i<count($titles);$i++)
{ echo'
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
<div class="arrow">
        <img src="assets/icons/arrow.png" class="right next"/>
        <img src="assets/icons/arrow.png" class="left prev"/>
     </div>
</div>


<script>
    var c = 0;
    $("#services .next").click(function(){
        var w = window.innerWidth;
        if((c!=3 && w>=601) || (c!=5 && w<=600))
        {
        var elem = document.getElementsByClassName("serviceParent")[0];
        var scroll = elem.clientWidth;
       $('#allServices').animate( { scrollLeft: '+='+scroll }, 500);
        c+=1;
        }
        else
        return 0;

        });
        $("#services .prev").click(function(){
            if(c!=0)
        {
        var elem = document.getElementsByClassName("serviceParent")[0];
        var scroll = elem.clientWidth;
       $('#allServices').animate( { scrollLeft: '-='+scroll }, 500);
        c-=1;
        }
        else
        return 0;
        });
</script>