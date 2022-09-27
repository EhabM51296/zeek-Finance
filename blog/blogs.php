<head>
	<script src="js/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/getData.js"></script>
    <link rel="stylesheet" href="css/blog/blogs.css">
</head>
<?php
require "loadingScreen/loading.html";
require "header/header.php";
require "header/underHeader.php";
?>
<body>
<div id="allBlogs">
<?php       
for($i=0;$i<count($titlesBlog);$i++)
{ 
echo'
    <div class="blogParent">
	<a href=blog.php?blog='.urlencode($titlesBlog[$i]).'>
    <div class="blog windowsHover">
        <div class="blogImg dropWindows">
            <img src=assets/blog/'.$imgBlog[$i].' width=100% />
        </div>
        <div class="blogDescription">
            <h1 class="robotBlack underLine txtBlack txtMedSecondary unSelectable">'.$titlesBlog[$i].'</h1>
        </div>
        <div class="readMore">
            <p class="robotLight underLineFull txtBlue txtSmall unSelectable">Read More</p>
        </div>
    </div>
	</a>
</div>';
}
?>
</div>
<?php
require "footer/footer.php";
?>
</body>
