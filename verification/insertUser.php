<?php
session_start();
if(isset($_POST['email']) && isset($_SESSION['Admin']))
{
	 require "../sqlObjects/user.php";
	 $email = $_POST['email'];
	 $res = addUser($email,1,date("Y-m-d"));
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