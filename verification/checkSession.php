<?php
session_start();
    if(isset($_POST['libraryFile']))
	{
			if(isset($_SESSION['subscription']))
			{	echo $_POST['libraryFile'];
			}
			else
				echo "invalidSession";
	}
	else
	{
		require "../header/to404.php";
	}
?>