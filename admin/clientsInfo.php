
<?php
require "sqlObjects/user.php";
$res = findVerifiedUsers();
?>
<head>
	 <link rel="stylesheet" href="css/admin/clientsInfo.css">
	 <link rel="stylesheet" href="css/subscribe/subscribeBox.css">
</head>
<?php
echo"
<div class='actionsContainer'>
<button type='button' id='logout' name='logout'>Logout</button>
<button type='button' id='insertUser' name='insertUser'>insert a new user</button>
</div>
<center>
<table border=1 class='txtSmallSecondary' style='max-width:100%;'>
	<caption><h1 class='txtMed robotMedium'>Clients' Info</h1></caption>
	<form method=post action=''>
	<tr>
	    <th>Select All <input type='checkbox' name='selectAll' id='selectAll' class=respChkBox></th>
	    <th><button id='sendToSelected' name='' class='txtSmallSecondary' type=button>Send email to selected clients</button></th> 
	</tr>
    <tr>
        <th>Select Clients</th>
        <th>Email</th>
        <th>Subscription Date</th>
		<th>Action</th>
		<th>Action</th>
    </tr>
";
if($res!=false)
{
    while($row = $res->fetch_assoc())
    {
        echo"
        <tr class='infoRow'>
            <th><input type='checkbox' name='email[]' id='email_".$row["Email"]."' value='".$row["Email"]." ".$row["id"]."' 
            class='checkSingle txtSmallSecondary respChkBox'></th><th>".$row["Email"]."</th>
            <th>".$row["SubsDate"]."</th>
			<th><button type='button' id='update' name='update' class='actionBtn txtSmallSecondary btnUpdate'>Update</button></th>
			<th><button type='button' id='delete' name='delete' class='actionBtn btnDelete txtSmallSecondary'>Delete</button></th>
        </tr>
            ";
    }
}
echo"</form></table></center>";
?>
<!--update modal shown when update button pressed-->

<div id="updateMdl" class="mdl">
    <div id="updateBox" class="bgColorDarkBlue subscribeBox">
        <div id="closeSubscriptionContainer" class="absolute">
             <p id="closeUpdate" class="txtWhite txtMedSecondary robotMedium blueColorHover">X</p>
        </div>
        <div id="subscribeSection">
           <p class="robotMedium txtSmallSecondary txtWhite">Update email for: <input type=text name="oldEmail" 
		   id="oldEmail" value="" readonly>
		   </p>
              <div class="flexInputs">
			    <p id="invalidInfo" class="robotLight txtSmall txtRed unSelectable invalidEmail">Please enter a valid email!!</p>
                <input type=email placeholder="New email" class="txtSmall" id="updateText" oninput="replace_forbidden(this.id)"
				name="email" class="updateText">
                <button type="button" class="txtSmall" id="updateButton">Update</button>
            </div>
        </div>
    </div>
</div>
<!--insert modal shown when insert button clicked-->

<div id="insertMdl" class="mdl">
    <div id="insertBox" class="bgColorDarkBlue subscribeBox">
        <div id="closeSubscriptionContainer" class="absolute">
             <p id="closeInsert" class="txtWhite txtMedSecondary robotMedium blueColorHover">X</p>
        </div>
        <div id="insertSection">
           <p class="robotMedium txtSmallSecondary txtWhite">Insert a new user:</p>
              <div class="flexInputs">
			    <p id="invalidInfo" class="robotLight txtSmall txtRed unSelectable invalidEmail">Please enter a valid email!!</p>
                <input type=email placeholder="Email" class="txtSmall insertText" id="insertText" oninput="replace_forbidden(this.id)"
				name="email">
                <button type="button" class="txtSmall" id="insertButton">Insert</button>
            </div>
        </div>
    </div>
</div>
<!--send email modal shown when send to selected button clicked-->

<div id="sendMailMdl" class="mdl">
    <div id="sendMailBox" class="bgColorDarkBlue subscribeBox" style="margin-top:0;">
        <div id="closeSubscriptionContainer" class="absolute" style="z-index:1;">
             <p id="closeSend" class="txtWhite txtMedSecondary robotMedium blueColorHover">X</p>
        </div>
        <div id="sendSection">
           <p class="robotMedium txtSmallSecondary txtWhite">Send email to selected client(s):</p>
              <div class="">
			    <p id="invalidInfo" class="robotLight txtSmall txtRed unSelectable invalidEmail" style="top:0;z-index:0;">Please write your title and message!!</p>
			    <form action="verification/sendMsg.php" method="post" enctype="multipart/form-data" id="messageForm">
			        <div id="emailTitleContainer">
			            <input type=text placeholder="Title" id="emailTitle" class="txtSmall insertText" name="emailTitle">
			        </div>
			    <div>
                <textarea placeholder="Message" class="txtSmall" id="messageText" name="messageText" class="insertText"></textarea>
                </div>
                <div id="fileContainer">
                  <p class="txtWhite txtSmall robotLight">Attach a file: <input type=file class="txtSmall" name="upload[]" multiple></p>
                </div>
                <div>
                <button type="button" class="txtSmall" id="sendMsgButton">Send</button>
                </div>
                <input type=hidden name="selected" id="CC">
                </form>
            </div>
        </div>
    </div>
</div>

<script src="js/admin.js"></script>