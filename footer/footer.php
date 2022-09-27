<head>
    <link rel="stylesheet" href="css/footer/footer.css">
</head>
<div id="footer" class="bgColorDarkBlue txtWhite">
    <div id="footerFirst" class="footerBlock">
        <div id="FFLogo" class="innerBlock">
            <img src="assets/logo/logo.png" />
        </div>
        <div id="FFDescription" class="FooterDescription">
            <p class="robotLight unSelectable">
               We work with our clients as partners, together we develope
            clear, practical financial
            solutions, discover
            opportunities, and support
            or run those solutions to ensure real, and sustainable performance improvement.
            </p>
        </div>
        <div id="FFSocialMedia">
		 <a href="https://www.facebook.com/profile.php?id=100069853695207" target="_blank">
            <div class="FFSMedia blackBgColorHover">
                <img src="assets/icons/facebook.png" />
            </div>
			</a>
            <div class="FFSMedia blackBgColorHover">
                <img src="assets/icons/twitter.png" />
            </div>
			 <a href="https://www.linkedin.com/company/zeek-finance/about/" target="_blank">
				<div class="FFSMedia blackBgColorHover">
					<img src="assets/icons/linkedin.png" />
				</div>
			</a>
        </div>
    </div>
    <div id="footerSecond" class="footerBlock">
        <div id="FSTitle" class="FooterTitles">
            <h1 class="robotBold underLine unSelectable">Our Services</h1>
        </div>
        <div id="FSServices">
        <?php
            for($i=0;$i<count($titles);$i++)
            {   echo '<p class="robotMedium unSelectable"><img src="assets/icons/arrowFooter.png"/> <a href="services.php?service='.urlencode($titles[$i]).'"
			class="blueColorHover unSelectable">'.$titles[$i].'</a></p>';
            }
           ?>
        </div>
    </div>
    <div id="footerThird" class="footerBlock">
        <div id="FTTitle" class="FooterTitles">
            <h1 class="robotBold underLine unSelectable">Latest Posts</h1>
        </div>
        <div id="FTPosts">
		<?php
			for($i=0;$i<count($titlesBlog);$i++)
			{
				echo ' <div class="FLatestPost">
                <div class="FPostImg">
                    <img src="assets/blog/'.$imgBlog[$i].'" />
                </div>
                <div class="FPostDescription">
                    <a href="blog.php?blog='.urlencode($titlesBlog[$i]).'" class="robotMedium blueColorHover unSelectable">
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
    <div id="footerFourth" class="footerBlock">
        <div id="FFrthTitle" class="FooterTitles">
            <h1 class="robotBold underLine unSelectable">Subscribe Us</h1>
        </div>
        <div id="FFrthDescription" class="FooterDescription">
            <p class="robotLight unSelectable">
                We serve individuals, startups, small and medium enterprises, & Large Corporations, in Lebanon, Gulf, Middle East, Africa, and other markets.
            </p>
			<p class="robotLight unSelectable">
			Stay current with our latest Financial insights
			</p>
        </div>
        <div id="FFrthInput">
            <input type="email" placeholder="Email address" class="robotMedium" id="subscribeTextfooter">
            <button class="txtSmall subscribeButton subscribeTextfooter invalidInfoFooter">Sign Up</button>
			<p class="robotLight txtSmall txtRed unSelectable" id="invalidInfoFooter">Please enter a valid email!!</p>
        </div>
    </div>
</div>