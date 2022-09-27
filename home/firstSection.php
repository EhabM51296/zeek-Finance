
<head>
    
    <link rel="stylesheet" href="css/home/firstSection.css">
</head>
<?php
$bigTitles = array("Welcome To Zeek Finance", "Professional Ethics", "Reliability","Relevant","Affordable");
$smallTitles = array("World-Class Financial Analysts",
"We respect profession ethics, fairness, and transparency in all our interactions",
"We provide solid and reliable financial information, that will be base for management business decision making",
"Financial Information worthless if not provided in the suitable time, We commit to conduct in the proper time",
"As World Class Financial Analysts, our mission is to create value to our clients, We provide affordable Solutions");
$images = array("WorldClass.jpg","ethics.jpg","realibility.jpg","relevant.jpg","affordable.jpg");
?>
<div id="firstSection" class="bgColorBlack">
<?php
    for($i=0;$i<count($bigTitles);$i++)
    { echo '<div class="changable fade unSelectable">
                <div class="titleImage txtWhite">
                    <h1 class="robotBlack unSelectable">'.$bigTitles[$i].'</h1>
                    <p class="robotMedium unSelectable">'.$smallTitles[$i].'</p>
                    <a href="services.php" class="unSelectable"><button>Learn More</button></a>
                </div>
                <img src=assets/images/'.$images[$i].' width=100%/>
            </div>';
    }
    echo '<div class="arrow">
       <img src="assets/icons/arrow.png" class="right next"/>
       <img src="assets/icons/arrow.png" class="left prev"/>
    </div>';
    ?>
</div>

<!-- -----------------------------------------------------------------------script---------------------------------------------------------->
<script>
    $(document).ready(function(){
        var counter = 0;
        function displayChangable(){
            $(".changable").css("display","none");
            document.getElementsByClassName("changable")[counter].style.display = "block";
            document.getElementsByClassName("titleImage")[counter].style.visibility = "visible";
        }
        displayChangable();
        $("#firstSection .next").click(function(){
            if(counter == 4)
            counter = 0;
            else
            counter +=1;
            displayChangable();
        });
        $("#firstSection .prev").click(function(){
            if(counter == 0)
            counter = 4;
            else
            counter -=1;
            displayChangable();
        });
        setInterval(function(){$("#firstSection .next").click();  }, 5000);
    });
</script>