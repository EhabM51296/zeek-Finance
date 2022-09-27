<?php
session_start();
?>
<head>
<?php
require "SEO/seo.php";
?>
</head>
<?php
if(isset($_GET['service']))
{	$allServices = array("Accounting & Financial Analysis",
					"Financial Management",
					"Corporate Finance",
					"Business Valuation",
					"Strategic Planning",
					"Others");
	$service = $_GET['service'];
		if (in_array($service, $allServices))
		require "services/serviceDetail.php";
	else
	{
		require "./header/to404.php";
	}
}
else
	require "services/services.php";
?>