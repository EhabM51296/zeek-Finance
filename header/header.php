<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/animation.css">
    <link rel="stylesheet" href="css/header/header.css">
</head>
<?php
require "subscribe/subscribeBox.php";
require "subscribe/subscribeSuccess.php";
require "subscribe/subscribeMessage.php";
require "subscribe/operationSuccess.php";
require "subscribe/operationFailed.php";
require "subscribe/unsubscribe.php";
require "subscribe/downloadMdl.php";
require "subscribe/verifyUser.php";
require "accessPages/accessAllowed.php";
require "services/getServices.php";
require "blog/getBlogs.php";
$links = array(0 => '', 1 => 'about-Us', 2 => 'services', 3 => 'blog', 4 => 'library', 5 => 'contact-Us');
$CurPageURLs = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 
$urls = explode("/",$CurPageURLs)[1];
$urls = explode(".",$urls)[0];
$index = array_search($urls, $links);
$underLine = array("hoverUnderLineH","hoverUnderLineH","hoverUnderLineH","hoverUnderLineH","hoverUnderLineH","hoverUnderLineH");
$underLine[$index] = "underLineH";
?>
<!-- Header -->
<div id="header" class="headerBg">
    <!-- ------------------------------------------contact section ------------------------->
    <div id="contactSection">
        <div id="leftSide-Contact">
            <div id="gpsImage">
                <p class="robotRegular"><img src="assets/icons/gps.png" /><span>Beirut City, Lebanon</span></p>
            </div>
            <div id="mailImage">
                <p class="robotRegular"><img src="assets/icons/mail.png" />
				<a href="mailto:info@zeekfinance.com" class="blueColorHover" target="_blank"><span>info@zeekfinance.com</span></a></p>
            </div>
        </div>
        <div id="rightSide-Contact">
            <div class="rightIcons center">
                <a href="https://www.facebook.com/profile.php?id=100069853695207" target="_blank"><p><img src="assets/icons/facebook.png" /></p></a>
            </div>
            <div class="rightIcons center">
                <a href="" target="_blank"><p><img src="assets/icons/twitter.png" /></p></a>
            </div>
            <div class="rightIcons center">
               <a href="https://www.linkedin.com/company/zeek-finance/about/" target="_blank"><p><img src="assets/icons/linkedin.png" /></p></a>
            </div>
            <div class="rightIcons center">
                <p class="robotRegular"><img src="assets/icons/whatsapp.png" />
				<a href="https://api.whatsapp.com/send?phone=(+961)03951507" target="_blank"
				class="blueColorHover"><span>(+961) 03-951507</span></a></p>
            </div>
        </div>
    </div>
    <!------------------------------------------ items section-------------------------- -->
    <div id="itemSection" class="headerBg">
        <div id="showItems">
            <img src="assets/icons/humburger.png" id="btnHumb" />
        </div>
        <div id="logo">
		<a href="/">
            <img src="assets/logo/logo.png" id="logoDesk" />
            <img src="assets/logo/logoM.png" id="logoMob" />
		</a>
        </div>
        <div id="itemsContainer" class="leftslide robotMedium">
            <div id="hideItems">
                <p id="close" class="txtBlue">X</p>
            </div>
            <div id="logo2">
                <img src="assets/logo/logoM.png" />
            </div>
            <div class="item center">
                <p class="noBg home unSelectable"><a class="<?php echo $underLine[0];?> blueColorHover" href="/">Home</a></p>
            </div>
            <div class="item center">
                <p class="noBg unSelectable"><a class="<?php echo $underLine[1];?> blueColorHover" href="about-Us.php">About Us</a></p>
            </div>
            <div class="item center drop">
                <p class="noBg unSelectable"><a class="<?php echo $underLine[2];?> blueColorHover" href="services.php">Services</a></p>
                <div style="color:white;z-index: 9999;" class="dropDownList">
                <?php
                for($i=0;$i<count($titles);$i++)
                {echo '
                    <p class="unSelectable"><a href=services.php?service='.urlencode($titles[$i]).' class="robotMedium black blackColorHover">'.$titles[$i].'</a></p>';
                }
                ?>
                </div>
            </div>
            <div class="item center">
                <p class="noBg unSelectable"><a class="<?php echo $underLine[3];?> blueColorHover" href="blog.php">Blog</a></p>
            </div>
            <div class="item center">
                <p class="noBg unSelectable"><a class="<?php echo $underLine[4];?> blueColorHover" href="library.php">Library</a></p>
            </div>
            <div class="item center">
                <p class="unSelectable"><a class="<?php echo $underLine[5];?> special blueColorHover blackBgColorHover" href="contact-Us.php">Contact Us</a></p>
            </div>
        </div>
    </div>
</div>
<!-- end of header -->
<!-------------------------------------------------------------------script ---------------------------------------------->
<script>
    $(document).ready(function () {
		function unfixedHeader()
		{
			$("#itemSection").removeClass("fixedHeader");	
			$("#itemSection p.noBg a").removeClass("txtBlack");
			$("#logoDesk").attr("src","assets/logo/logo.png");
		}
		function fixedHeader(){
				var scroll = $(window).scrollTop();
				var height = $("#header").height() + 50;
				if(scroll>height)
				{	$("#itemSection p.noBg a").addClass("txtBlack");
					$("#logoDesk").attr("src","assets/logo/logoM.png");
					$("#itemSection").addClass("fixedHeader");
					
				}
				else
				{
						unfixedHeader();
				}
			
		}
        $("#btnHumb").click(function () {
            $("#itemsContainer").css("display", "block");
            $("body").css("overflow", "hidden");

        });

        $("#close").click(function () {
            $("#itemsContainer").animate({ left: '-100%' }, "slow");
            setTimeout(function () {
                $("#itemsContainer").animate({ left: '0' }, "fast");
                $("#itemsContainer").css("display", "none");
                $("body").css("overflow-y", "scroll");
            }, 500);


        });

        window.onresize = function () {
            var w = window.innerWidth;
            if (w >= 601) {
                if ($("#itemsContainer").css("display") == "none") {
                    $("#itemsContainer").css("display", "block");
                    $("body").css("overflow-y", "scroll");
                }
                else if ($("body").css("overflow-y", "hidden"))
                    $("body").css("overflow-y", "scroll");
					fixedHeader();
            }
            else {
				 if ($("#itemsContainer").css("display") == "block")
				 {
					 $("#itemsContainer").css("display","none");
					  $("body").css("overflow-y", "scroll");
					 
				 }
				 unfixedHeader();

            }
        }
		
			$(window).scroll(function () {
				 var w = window.innerWidth;
            if (w >= 601) {
				fixedHeader();
			}
				});
			});


</script>