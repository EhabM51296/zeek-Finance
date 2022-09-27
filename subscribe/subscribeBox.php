<head>
    <link rel="stylesheet" href="css/subscribe/subscribeBox.css">
</head>

<div id="subscribeMdl" class="mdl">
    <div id="subscribeBox" class="bgColorDarkBlue subscribeBox">
        <div id="closeSubscriptionContainer" class="absolute">
             <p id="closeSubscription" class="txtWhite txtMedSecondary robotMedium blueColorHover">X</p>
        </div>
        <div id="subscribeLogo" class="subscribeLogo">
            <img src="assets/logo/logo.png" width=100%/>
        </div>
        <div id="subscribeSection">
           <p class="robotMedium txtSmallSecondary txtWhite">Subscribe to view our reports!!</p>
            <form id="subscribeForm" method=get target="_blank" action="verification/downloadPdf.php">
              <div class="flexInputs">
			    <p id="invalidInfo" class="robotLight txtSmall txtRed unSelectable">Please enter a valid email!!</p>
                <input type=email placeholder="Email" class="txtSmall" id="subscribeText" oninput="replace_forbidden(this.id)"
				name="email" class="subscribeText">
				<input type="hidden" id="pdfName" name="libraryFile">
                <button type="button" class="txtSmall subscribeButton subscribeText invalidInfo" id="subscribeButton">Subscribe</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="js/subscribeBox.js"></script>