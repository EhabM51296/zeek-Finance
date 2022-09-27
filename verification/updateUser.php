<?php
session_start();
if(isset($_POST['email']) && isset($_SESSION['Admin']) && isset($_POST['oldEmail']))
{
	 require "../sqlObjects/user.php";
	 $email = $_POST['email'];
	 $emailOld = $_POST['oldEmail'];
	 $res = updateUser($emailOld,$email);
	 if($res==true)
		echo "success";
	 else
		echo "failed"; 
}
else
{
	require "../header/to404.php";
}
?>