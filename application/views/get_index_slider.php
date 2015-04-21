<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>jQuery Hover Carousel Plugin Demo</title>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<style>
body {
background: #fff;
}
.carousel {
display: block;
position: relative;
-webkit-transform: translateZ(0);
/*  for demo only */
width: 55%;
min-width: 550px;
margin: 50px auto;
font-size: 0;
background: #fff;
padding: 8px;
/*border-radius: 6px;
-webkit-box-shadow: 0 4px 10px #000;
box-shadow: 0 4px 10px #000;*/
/********************/
height: 200px;
-webkit-overflow-scrolling: touch;/* for tablets */
}
.touch .carousel {
overflow: auto;
}
.carousel:before, .carousel:after {
content: '';
opacity: 0;
position: absolute;
top: 0;
bottom: 0;
z-index: 2;
width: 50px;
text-align: center;
font-size: 80px;
line-height: 190px;
font-family: arial;
color: #555;
font-weight: bold;
pointer-events: none;
-webkit-transition: 0.2s ease-out;
transition: 0.2s ease-out;
}
.carousel:before {
content: '\2039';
left: 0;
text-indent: -80px;
-webkit-box-shadow: 50px 0 20px -20px #fff inset;
box-shadow: 50px 0 20px -20px #fff inset;
}
.carousel:after {
content: '\203A';
right: 0;
text-indent: 50px;
-webkit-box-shadow: -50px 0 20px -20px #fff inset;
box-shadow: -50px 0 20px -20px #fff inset;
}
.carousel.right:after, .carousel.left:before {
opacity: 1;
}
.carousel.right:after {
right: 8px;
text-indent: 70px;
}
.carousel.left:before {
left: 8px;
text-indent: -120px;
}
.carousel > a {
position: absolute;
margin: 0;
top: 0;
bottom: 0;
color: #CCC;
font-size: 1.5em;
-webkit-transition: 0.1s;
transition: 0.1s;
}
.carousel > a:hover {
color: #FFF;
}
.carousel > a.prev {
left: -20px;
}
.carousel > a.next {
right: -20px;
}
.carousel > .indicator {
pointer-events: none;
position: absolute;
z-index: 4;
bottom: 0;
left: 0;
background: #aaaaaa;
height: 4px;
border-radius: 10px;
opacity: 0;
-webkit-transition: opacity 0.2s, bottom 0.2s;
transition: opacity 0.2s, bottom 0.2s;
}
.carousel:hover > .indicator {
opacity: 1;
bottom: -10px;
}
.carousel > .wrap {
overflow: hidden;
border-radius: 5px;
}
.carousel > .wrap > ul {
list-style: none;
white-space: nowrap;
height: 200px;
}
.carousel > .wrap > ul > li {
display: inline-block;
vertical-align: middle;
height: 100%;
margin: 0 0 0 5px;
position: relative;
overflow: hidden;
-webkit-transition: 0.25s ease-out;
transition: 0.25s ease-out;
}
.carousel > .wrap > ul > li:first-child {
margin: 0;
}
.carousel > .wrap > ul > li > img {
display: block;
height: 100%;
margin: auto;
vertical-align: bottom;
position: relative;
z-index: 1;
-webkit-transition: 1s ease;
transition: 1s ease;
}
</style>
</head>

<body>
<div class="carousel right" style="width:95%;margin-top:0px;margin-bottom:0px;">
<div class="indicator"></div>
<div class="wrap" >
<ul>
<?php foreach ($slider_data as $key => $value) {
	# code...
	echo "<li><a href='/amazon/view/$value[product_no]' target='_parent'><img src='$value[product_img]'  /></a></li>";
}
?>

</ul>
</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="/js/jquery.hoverCarousel.js"></script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>
