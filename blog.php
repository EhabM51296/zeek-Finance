<?php
session_start();
?>
<head>
<?php
require "SEO/seo.php";
?>
</head>
<?php
if(isset($_GET['blog']))
{	$allBlogs = array("Coronavirus Impact in a Summary",
					  "Budgeting Importance");
	$blog = $_GET['blog'];
		if (in_array($blog, $allBlogs))
		require "blog/blogDetail.php";
	else
	{
		require "./header/to404.php";
	}
}
else
	require "blog/blogs.php";
?>