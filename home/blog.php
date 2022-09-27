<head>
    <link rel="stylesheet" href="css/home/blog.css">
</head>
<?php
require "blog/getBlogs.php";
?>

<div id="Blog">
    <h3 id="ourBlog" class="robotBold center txtBlue txtSmall unSelectable">Latest Articles</h3>
    <h1 class="title robotBlack center txtBlack underLineLeft txtMed unSelectable">Our Blog</h1>
    <div id="allArticles">
 <?php       
for($i=0;$i<count($titlesBlog);$i++)
{ echo'
    <div class="blogParent">
	<a href=blog.php?blog='.urlencode($titlesBlog[$i]).'>
    <div class="blog windowsHover">
        <div class="blogImg dropWindows">
            <img src="assets/blog/'.$imgBlog[$i].'" width=100% />
        </div>
        <div class="blogDescription">
            <p class="robotLight dateProd txtSmallSecondary"><img src="assets/icons/calendar.png"/><span class="txtBlue">'.$date[$i].'</span></p>
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
<div class="arrow">
        <img src="assets/icons/arrow.png" class="right next"/>
        <img src="assets/icons/arrow.png" class="left prev"/>
     </div>
</div>


<script>
    var cc = 0;
    $("#Blog .next").click(function(){
        var w = window.innerWidth;
        if(cc!=1 && w<=600)
        {
        var elem = document.getElementsByClassName("blogParent")[0];
        var scroll = elem.clientWidth;
       $('#allArticles').animate( { scrollLeft: '+='+scroll }, 500);
        cc+=1;
        }
        else
        return 0;

        });
        $("#Blog .prev").click(function(){
            if(cc!=0)
        {
        var elem = document.getElementsByClassName("blogParent")[0];
        var scroll = elem.clientWidth;
       $('#allArticles').animate( { scrollLeft: '-='+scroll }, 500);
        cc-=1;
        }
        else
        return 0;
        });
</script>