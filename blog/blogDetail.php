<head>
	<script src="js/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/getData.js"></script>
    <link rel="stylesheet" href="css/blogDetail/blogDetail.css">
</head>

<?php
require "loadingScreen/loading.html";
require "header/header.php";
require "header/underHeader.php";
if(!isset($_GET['blog']))
{
	require "./header/to404.php";
	
}
$index = array_search($url, $allBlogs);
if($url == $titlesBlog[0])
{
	$intro = "";
	$detailBlog = array("Corona virus have effect several businesses like remote working, consumer shopping behavior, global advertising spend, and essential industries like food, medical, travel, and transportation.<br/><br/>",
		      " A record 3.28 million Americans filed for unemployment benefits in the week ending March 21 as coronavirus-induced layoffs surge around the US. Even when the short-term effects end, the long-term economic impact will ripple for years.<br/><br/>",
			  "Most small businesses lack the cash reserves to weather a month-long interruption,  also the possibility of a \"startup depression\", wherein new companies don't enter the job market because of the pandemic.<br/><br/>",
			  "Hospitality and travel are two of the biggest industries impacted by COVID-19 thanks to travel cancellations, restaurant and bar closures, and low consumer confidence. Manufacturing and construction have largely held off on layoff decisions, but these industries could suffer the strain as consumer demand drops."
			  );
   // $linkImpact = "https://www.businessinsider.com/coronavirus-business-impact";
    $graphImg = array("coronaVirusFirstGraph.png","coronaVirusSecondGraph.png");
    $graphLink = "https://www.bbc.com/news/business-51706225";
}
else if($url == $titlesBlog[1])
{
	$intro = "";
	$detailBlog = array("Many people complain that they can't create a budget because they don't know exactly how much money they will earn in a given week. While it is true that workers earning an hourly wage or working on commission might not get the exact same dollar figure in each paycheck, the amount that you earn has much less to do with the basics of budgeting than the amount you spend. Instead of focusing on whether you earn enough each month, focus on your monthly spending. The question is simple: where does your money go?<br/><br/>",
              "Regardless of how much you earn or when you earn it, everybody has fixed expenses.<br/>
			  If your recurring expenses don't add up to the amount of your monthly income , your next step should be to save the receipts from every purchase that you make next month and use them as the basis for creating additional categories or adjusting the numbers in the existing categories. Mortgage payments or rent<br/>
			  Transportation (car rent, gasoline..)<br/>
			  Utilities bills<br/>
			  Food & Entertainment<br/>
			  Insurance Coverage and Healthcare<br/><br/>",
              "Now it's time to take the theoretical aspects of budgeting and apply them to your life. Take a look at your monthly income. How much are you bringing in on your worst month? Compare that number to the amount that you are spending. Ideally, the income is larger than the output. If so, it's time for a personal savings plan. In other words, don't spend everything you earn—save some for yourself. If you are spending more than you are earning, it's time to review your spending habits. When the expenditures are larger than the income, you have two choices: increase your income or cut expenses.<br/><br/>",
              "Strategies to increase your income include getting a new higher paying job, getting a second job. Strategies to cut your expenses include eliminating impulse buys, which are a major expense for most people, and cutting out planned but unnecessary expenses. The concept is quite simple—if it's not in your spending plan, don't buy it.",
              "A budget is really just a tool that can work to put your personal finances on the right track. Budgeting your money need not be seen as a chore. After all, accepting the limits of your income is the best way to take control of your spending, live within your means, and, ultimately, reach your financial goals.");
    //$linkImpact = "https://www.investopedia.com/articles/pf/06/budgeting.asp";
    $graphImg = array();
    $graphLink = "";
}
?>
<div id="blogDetailsContainer">
  <div id="blogDetails">
	<div id="currentBlog">
		<div id="currentBlogImage">
			<img src="assets/blog/<?php echo $imgBlog[$index];?>"/>
		</div>
		<div id="currentBlogInfo">
			<h1 class="robotBlack underLine txtBlack txtMed unSelectable">
				<?php echo $titlesBlog[$index]; ?>
			</h1>
            <p class="robotLight txtBlack txtSmall intro unSelectable">
				<?php echo $intro;?>
			</p>
			<ul class="noStyle">
				<?php
				for($i=0;$i<count($detailBlog);$i++)
					echo "<span class='robotLight txtweakBlack txtSmall unSelectable'>".$detailBlog[$i]."</span>";
				?>
                <?php
                /*echo "<a href='".$linkImpact."' class='robotLight txtBlue txtSmall bottomBlog underLineAnimation
                unSelectable' target='_blank'>src: ".$linkImpact."</a>";
				*/
                ?>
			</ul>
           
		</div>
	</div>
    <div id="rightSideBlog">
     <div id="otherBlogs">
        <div id="blogsBlock">
        <p class="robotBlack underLine txtBlack txtSmall unSelectable">Latest Posts</p>
    <?php
			for($i=0;$i<count($titlesBlog);$i++)
			{
				echo ' <div class="FLatestPost">
                <div class="FPostImg">
                    <img src="assets/blog/'.$imgBlog[$i].'" />
                </div>
                <div class="FPostDescription">
                    <a href="blog.php?blog='.urlencode($titlesBlog[$i]).'" class="robotMedium txtBlack blueColorHover unSelectable">
                        '.$titlesBlog[$i].'
                    </a>
                    <p class="robotLight txtBlue unSelectable">
                       '.$date[$i].' 
                    </p>
                </div>
            </div>';
			if($i<count($titlesBlog)-1)
				echo "<hr/>";
			}
		?>
     </div>
    </div>
    <?php
    if(count($graphImg)>0)
    {
        for($i=0;$i<count($graphImg);$i++)
        {echo '
            <div class="graphImg"><img src="assets/blog/'.$graphImg[$i].'" width=100%/></div>';
        }
    }
        ?>
        <div id="underGraphLink"> <?php
		if($graphLink!="")
		{
                echo "<a href='".$graphLink."' class='robotLight txtBlue bottomBlog underLineAnimation
                unSelectable' target='_blank'>src: ".$graphLink."</a>";
		}
                ?></div>
        </div>
</div>
        </div>
<?php
require "footer/footer.php";
?>