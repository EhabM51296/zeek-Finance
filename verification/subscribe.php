<?php
session_start();
require "../functions/functions.php";
if(isset($_POST['email']))
 {	   
        require 'PHPMailer/Exception.php';
		require 'PHPMailer/PHPMailer.php';
		require 'PHPMailer/SMTP.php';
		require "../sqlObjects/user.php";
	if(check_characters($_POST['email']) || !validate($_POST['email']))
	{
		require "../header/to404.php";
	}
	$email = $_POST['email'];
	$exists = find_userByEmail($email);
	if(!$exists)
	{
		$code1=rand(10000,50000);
		$code2=rand(1,9);
		$verif=$code1*$code2;
		$subsDate=date("Y-m-d");
		$AddRes = addUser($email,$verif,$subsDate);
		if($AddRes==true)
		{	
			sendVerfEmail($email,$verif);
			echo "sent";
		}
		else //incase user not added something went wrong
			echo "failed";
	}
	else
	{
		if($exists[2] == 1)
		{
			$_SESSION['subscription'] = "subscribedtoZeekUsers"; 
			echo true;
		}
		else
		{
			$code1=rand(10000,50000);
			$code2=rand(1,9);
			$verif=$code1*$code2;
			$subsDate=date("Y-m-d");
			$resub = resubscribe($email,$verif,$subsDate);
			if($resub)
			{	echo "sent";
				sendVerfEmail($email,$verif);
			}
			else
				echo "failed";
		}
		
		
	}
}
else
{
	require "../header/to404.php";
}

?>