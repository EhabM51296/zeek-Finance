<?php
// $allowed = array("","index.php","about-Us.php","services.php","contact-Us.php");
$CurPageURLs = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 
$urls = explode("/",$CurPageURLs);
if(count($urls)>=4)
{
header("location:http://localhost/zeekFinance/404Error.php");
die;
}
?>