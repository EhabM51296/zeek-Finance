<head>
    <link rel="stylesheet" href="css/header/underHeader.css">
</head>

<?php
$previousPages = array("Home");
$previousLinks = array("/");
$CurPageURL = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 
$url = explode("/",$CurPageURL)[1];
$url = explode(".",$url)[0];
$url = str_replace("-"," ",$url);
if(($url=="services" && isset($_GET['service'])))
{	$previousPages[1] = $url;
	$previousLinks[1] = $url.".php";
	$url = $_GET['service'];
}
else if($url=="blog" && isset($_GET['blog']))
{
	$previousPages[1] = $url;
	$previousLinks[1] = $url.".php";
	$url = $_GET['blog'];
}

?>
<div id="underHeader" class="bgColorDarkBlue txtWhite">
	<div class="underHeaderTitle">
		<h1 class="robotMedium center txtMedSecondary unSelectable"><?php echo $url;?></h1>
		<p class="robotLight txtSmallSecondary unSelectable">
		<?php
		for($i=0;$i<count($previousPages);$i++)
		{
			echo'<a href="'.$previousLinks[$i].'" class="txtBlue">'.$previousPages[$i].'</a> <span class="to"> > </span>';
		}
		 echo $url;?> 
		</p>
	</div>
	<img src="assets/images/underHeader.jpg" width=100%/>
</div>
