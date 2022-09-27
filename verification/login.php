<?php
session_start();
    if(isset($_POST['admin']) && isset($_POST['pass']))
    {   require "../sqlObjects/adminUser.php";
        $adminTest = $_POST['admin'];
        $pass =  $_POST['pass'];
		$admin = findAdmin();
        if(($admin[1] == $adminTest || $admin[2] == $adminTest) && password_verify($pass, $admin[3]))
        {   $_SESSION['Admin'] = "verified";
            echo "success";

        }
        else
        echo "wrong credentials";
    }
	else
	{
		require "../header/to404.php";
	}
?>