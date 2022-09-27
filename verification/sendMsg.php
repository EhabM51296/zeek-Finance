<?php
 require "../functions/functions.php";
 if(isset($_POST['msg']))
{	    require 'PHPMailer/Exception.php';
		require 'PHPMailer/PHPMailer.php';
		require 'PHPMailer/SMTP.php';
        $name=$_POST['name'];
        $email =$_POST['email'];
        $phone = $_POST['phone'];
        $msg = $_POST['msg'];
        clientMsg($name,$email,$phone,$msg);
}
else if(isset($_POST['selected']) && isset($_POST['messageText']) && isset($_POST['emailTitle']))
{       require 'PHPMailer/Exception.php';
		require 'PHPMailer/PHPMailer.php';
		require 'PHPMailer/SMTP.php';
        $emails=explode(",",$_POST['selected']);
        // $emails = $_POST['selected'];
        $title = $_POST['emailTitle'];
        $msg =nl2br($_POST['messageText']);
        if(is_uploaded_file($_FILES['upload']['tmp_name'][0]))
        {   $file_name = array();
             // Count total files
            $countfiles = count($_FILES['upload']['tmp_name']);
            // Looping all files
                for($i=0;$i<$countfiles;$i++){
                    $file_tmp  = $_FILES['upload']['tmp_name'][$i];
                    if(copy($file_tmp,"uploads/".$_FILES['upload']['name'][$i]))
                        {
                            $file_name[$i] = $_FILES['upload']['name'][$i];
                        }
                        else
                        {
                             echo "failed to send message, cannot copy file";
                             return 0;
                        }
            }
            emailForClientsAttached($emails,$msg,$title,$file_name);
        }
            else
             emailForClients($emails,$msg,$title);
        
}
else
{
    require "../header/to404.php";
}
?>