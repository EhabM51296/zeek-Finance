<head>
    <link rel="stylesheet" href="css/contactUs/sendMail.css">
</head>

<div id="sendMail">
    <div id="sendMailTitle">
    <p id="DropTitle" class="robotBold txtBlue txtSmall unSelectable">Drop Us A Line</p>
    <h1 id="SendTitle" class="robotBlack txtBlack underLine txtMed unSelectable">Send Your Message</h1>
    </div>  
    <div id="sendFormContainer">
        <form id="contactUsForm">
		  <div class="inputRelativeContainer">	
		  <p class="robotLight txtRed txtsmallSecondary alert0">Please enter your name</p>
            <input type="text" placeholder="Name (required)" class="robotLight formControl txtTinyBig required field" id="userName"
			name="userName">
		  </div>
		  <div class="inputRelativeContainer">
			 <p class="robotLight txtRed txtsmallSecondary alert1">Please enter a valid email</p>
            <input type="email" placeholder="Email (required)" class="robotLight formControl txtTinyBig required field" id="userEmail" name="userEmail">
		  </div>
		  <div class="inputRelativeContainer">
            <input type="text" placeholder="Phone (optional)" class="robotLight formControl txtTinyBig field" id="userPhone"
			name="userPhone">
		  </div>
		  <div class="inputRelativeContainer">
			<p class="robotLight txtRed txtsmallSecondary alert2">Please write your message</p>
            <textarea class="robotLight formControl txtTinyBig required field" placeholder="Your Message (required)" id="userMsg"name="userMsg"></textarea>
		  </div>	
            <button type="button" class="txtTinyBig" id="sendMsg" name="sendMsg">Send</button>
        </form>
    </div>
</div>

<script src="js/contactUs.js"></script>