<?php
session_start();
     if(isset($_GET['libraryFile']) && isset($_SESSION['subscription']))
     { 
        $libraryFile = $_GET['libraryFile'];				
		$filename = '../YcJlQCgOqVYcJlQ/'.$libraryFile;
	//	$filename = 'https://www.zeekfinance.com/YcJlQCgOqVYcJlQ/'.$libraryFile;
		$fileinfo = pathinfo($filename);
		$sendname = $fileinfo['filename'] . '.' . strtolower($fileinfo['extension']);
		header('Content-Type: application/pdf');
		header("Content-Disposition: attachment; filename=\"$sendname\"");
		header('Content-Length: ' . filesize($filename));
		//file_get_contents($filename);
		readfile($filename);
	    exit;
     }
     else
     {
        require "../header/to404.php";
     }
?>