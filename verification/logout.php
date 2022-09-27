<?php
session_start();
    if(isset($_POST['sess']))
    {  
			session_destroy();
            echo "success";
    }
	else
	{
		require "../header/to404.php";
	}
?>