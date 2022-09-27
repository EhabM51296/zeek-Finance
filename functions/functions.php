<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
// decryptin and encryption
function encrypt($id)
{   $encryption_arr = array("DhLpT","BeHkN","AdGjM","CgOqV","ZfIlP","YcJlQ","WzEiK","XmRnS","FbUoa","rstuv");
$encid="";
	$id=$id*253+21;
	 $array  = array_map('intval', str_split($id));
	foreach($array as $val){
	$encid=$encid."".$encryption_arr[$val];
	}
	return $encid;
}

function decrypt($id)
{$encryption_arr = array("DhLpT","BeHkN","AdGjM","CgOqV","ZfIlP","YcJlQ","WzEiK","XmRnS","FbUoa","rstuv");
$x="";
$id=str_split($id);
$encid="";
$i=0;   
foreach($id as $val)
{$x=$x."".$val;
$i=$i+1;
if($i==5)
{$encid=$encid."".array_search($x,$encryption_arr);	
$i=0;
$x="";
}
}
	$id=($encid-21)/253;
	return $id;	
}

function check_characters($string){
	$result=false;
	$invalid_array = array('=',"\'",'"','`','<','>','[',']',';',"/",'*');
	$i=0;
	for($i=0;$i<count($invalid_array);$i++)
	{
	if(strpos($string,$invalid_array[$i])!==false)
		{$result = true;
		 break;
			
		}
	}
	if(strpos($string,"\\")!==false)
	{
		$result = true;
	}
	return $result;
}

function validate($email) {
    return preg_match("/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/", $email);    
}

function sendVerfEmail($email,$verif)
{   
		$mail = new PHPMailer(true);

// 		$mail->isSMTP();
		$mail->Host = 'bce.idm.net.lb';//'smtp-mail.outlook.com';
// 		$mail->SMTPAuth = true;
		$mail->Username = 'info@zeekfinance.com';
		$mail->Password = '^7g%3w!Q';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;
		$mail->setFrom('info@zeekfinance.com','ZEEK Finance');
		$mail->addAddress($email);
		$mail->isHTML(true);
		$mail->Subject = 'Welcome to zeekFinance, please click on the link to verify your email';
		$mail->AddEmbeddedImage('logo.png', 'logo_2u');
		$bodyContent = '<table cellpadding="15" cellspacing="0" width="100%" align="center" border="0" bgcolor="#0F1C2F" style="color:white;">
	        <tr>
		        <th><img alt="PHPMailer" src="cid:logo_2u" width=80%></th>
		    </tr>
		   <tr>
		   <th>
		<h1>Verify Your Email address</h1>
		   </th>
		   </tr>
		   <tr>
		<td>Please confirm that you want to subscribe to ZeekFinance. Once it\'s done you will be able to view our reports and
		receive our emails. Click the button below to verify your email</td>
		</tr>
		<tr>
		<th>
		<a href=https://www.zeekfinance.com/?email='.$email.'&code='.$verif.' style="color:white;text-decoration:none;text-align:center;padding:10px 5px;background-color:rgb(39, 130, 249);border-radius:5px;">verify your email</a></th>
		</tr>
		<tr>
		<td>Or copy the below link and paste it in your browser</td>
	    </tr>
	    <tr>
		<th><a href=https://www.zeekfinance.com/?email='.$email.'&code='.$verif.' style="color:white;
		text-decoration:none;">
		https://www.zeekfinance.com/?email='.$email.'&code='.$verif.'</a></th>
		</tr></table>';
		$bodyContent.="<h3>Thank You</h3>
                        <h3>ZEEK Finance Team</h3>";
		$mail->Body = $bodyContent;
		if($mail->send())
		echo false;
		else
		echo "failed";
		
}
function clientMsg($name,$email,$phone,$msg)
{
   	    $mail = new PHPMailer(true);
		$mail->Host = 'bce.idm.net.lb';//'smtp-mail.outlook.com';
		$mail->Username = 'info@zeekfinance.com';
		$mail->Password = '^7g%3w!Q';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;
		$mail->setFrom('info@zeekfinance.com','ZEEK Finance');
		$mail->addAddress("info@zeekfinance.com");
		$mail->isHTML(true);
		$mail->Subject = 'Email from client';
		$bodyContent = '<p>From: '.$name.'</p>';
        $bodyContent .= '<p>Email: '.$email.'</p>';
        $bodyContent .= '<p>Phone Number: '.$phone.'</p>';
        $bodyContent .= '<p>Message: '.$msg.'</p>';
		$mail->Body = $bodyContent;
		if($mail->send())
		echo true;
		else
		echo "failed";

}

function emailForClients($emails,$msg,$title){
        $success = 0;
        $mail = new PHPMailer(true);
		$mail->Host = 'bce.idm.net.lb';//'smtp-mail.outlook.com';
		$mail->Username = 'info@zeekfinance.com';
		$mail->Password = '^7g%3w!Q';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;
		$mail->setFrom('info@zeekfinance.com','ZEEK Finance');
		$mail->addReplyTo('info@zeekfinance.com','ZEEK Finance');
		$mail->isHTML(true);
		$mail->Subject = $title;
		$mail->AddEmbeddedImage('../assets/logo/logo.png', 'logo_2u');
    	$fixedContent = '<table cellpadding="2" cellspacing="0" width="100%" align="center" border="0" bgcolor="#0F1C2F" style="color:white;">
    	<tr>
        	<th>
             <img alt="zeekFinanceLogo" src="cid:logo_2u" width=80%>
            </th>
         </tr>
         <tr>
            <td style="font-size:20px;">'.$title.'</td>
         </tr>
         <tr>
		    <td>'.$msg.'</td>
		</tr>';
		for($i=1;$i<count($emails);$i++) {
		    $userInfo = explode(" ",$emails[$i]);
		    $email = $userInfo[0];
		    $unSubCode = encrypt($userInfo[1]);
			$bodyContent = $fixedContent.'
			<tr>
			    <td>
			         <b>Thank You</b>    
			    </td>
			</tr>
			<tr>
			    <td>
			          <b>ZEEK Finance Team</b>  
			    </td>
			</tr>
				<tr>
			    <td>
			          
                        <a href="https://zeekfinance.com/contact-Us.php">Contact Us</a>
                        /
                        <a href=https://www.zeekfinance.com/?email='.$email.'&unSubCode='.$unSubCode.'>Unsubscribe</a>
                          
			    </td>
			</tr>
		</table>';
		$mail->Body = $bodyContent;
        // $mail->AddAddress($email);
        $mail->AddBCC($email,'Person');
        // $mail->AddCC($email, 'Person One');
        if($mail->send())
        $success = 1;
        else
        {
            $success = 0;
            break;
        }
       $mail->ClearBCCs(); // <---you need this line.
}
if($success==1)
{  $bodyContent = $fixedContent;
    	$mail->Body = $bodyContent;
        $mail->AddAddress("info@zeekfinance.com");
        $mail->send();
echo "<h1>your message has been sent!!</h1>
        <a href='https://www.zeekfinance.com/admin.php'><button>Go back</button></a>";
}
else
{
echo "<h1>failed to send message</h1>
      <a href='https://www.zeekfinance.com/admin.php'><button>Go back</button></a>";
}
}
function emailForClientsAttached($emails,$msg,$title,$file_name){
        $success = 0;
        $mail = new PHPMailer(true);
		$mail->Host = 'bce.idm.net.lb';//'smtp-mail.outlook.com';
		$mail->Username = 'info@zeekfinance.com';
		$mail->Password = '^7g%3w!Q';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;
		$mail->setFrom('info@zeekfinance.com','ZEEK Finance');
		$mail->addReplyTo('info@zeekfinance.com','ZEEK Finance');
		$mail->isHTML(true);
		$mail->Subject = $title;
		$mail->AddEmbeddedImage('../assets/logo/logo.png', 'logo_2u');
		$fixedContent = '<table cellpadding="2" cellspacing="0" width="100%" align="center" border="0" bgcolor="#0F1C2F" style="color:white;">
    	<tr>
        	<th>
             <img alt="zeekFinanceLogo" src="cid:logo_2u" width=80%>
            </th>
         </tr>
         <tr>
            <td style="font-size:20px;">'.$title.'</td>
         </tr>
         <tr>
		    <td>'.$msg.'</td>
		</tr>';
		for($i=0;$i<count($file_name);$i++)
		{
	        $mail->AddAttachment("uploads/".$file_name[$i]);
		}
		for($i=1;$i<count($emails);$i++) {
	        $userInfo = explode(" ",$emails[$i]);
		    $email = $userInfo[0];
		    $unSubCode = encrypt($userInfo[1]);
			$bodyContent = $fixedContent.'
				<tr>
			    <td>
			         <b>Thank You</b>    
			    </td>
			</tr>
			<tr>
			    <td>
			          <b>ZEEK Finance Team</b>  
			    </td>
			</tr>
				<tr>
			    <td>
			          
                        <a href="https://zeekfinance.com/contact-Us.php">Contact Us</a>
                        /
                        <a href=https://www.zeekfinance.com/?email='.$email.'&unSubCode='.$unSubCode.'>Unsubscribe</a>
                          
			    </td>
			</tr>
		</table>';
		$mail->Body = $bodyContent;
        // $mail->AddAddress($email);
         $mail->AddBCC($email,'Person');
        if($mail->send())
        $success = 1;
        else
        {
            $success = 0;
            break;
        }
          $mail->ClearBCCs(); // <---you need this line.
}
if($success==1)
{       $bodyContent = $fixedContent;
    	$mail->Body = $bodyContent;
        $mail->AddAddress("info@zeekfinance.com");
        $mail->send();
echo "<h1>your message has been sent!!</h1>
        <a href='https://www.zeekfinance.com/admin.php'><button>Go back</button></a>";
}
else
{
echo "<h1>failed to send message</h1>
      <a href='https://www.zeekfinance.com/admin.php'><button>Go back</button></a>";
}
	for($i=0;$i<count($file_name);$i++)
		{
	        unlink("uploads/".$file_name[$i]);
		}
}
