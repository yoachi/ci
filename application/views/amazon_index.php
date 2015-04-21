<script>
$(document).ready(function() {
	load_slide_img();
});
function load_slide_img(){
	$.ajax({
		url:'/amazon/getslide/',
		dataType:'json',
		type:'GET',
		data:{ },
		cache: false,
		async: false, //처리완료 후 다음께 실행됨
		success:function(result){
			 //alert(result[0]['no']);
			//console.log(JSON.stringify(result));
			console.log(result);
			addslide(result);
		}
	});
}

function addslide(data){
	var cnt = data.length;
	
	var html='';
	for(var i=0;i<cnt;i++){
		if(i==0){
			html += "<div class='item active'>";
		}else{
			html += "<div class='item'>";
		}
		var j = i + 1;
		html += "<img  src='"+data[i]['product_img']+"' class='img-responsive img-full'>";
		html += "</div>";
	}
	$("#carousel-inner").html(html);
}
</script>
<div class="container">




	<div class="carousel">


		<style type="text/css">
		h2{
			margin:0;
			color:#666;
			padding-top:0px;
			font-size:52px;
			font-family: "trebuchet ms", sans-serif;
		}
		.item{
			background:#ddd;
			text-align: center;
			height: 288px !important;
		}
		.carousel{
			margin-top: 17px;
		}
		.bs-example{
			margin: 20px;
		}
		.carousel-control.left{
			background-image:linear-gradient(to right,rgba(0,0,0,0) 0,rgba(0,0,0,.0001) 100%);
		}
		.carousel-control.right{
			background-image:linear-gradient(to right,rgba(0,0,0,0) 0,rgba(0,0,0,.0001) 100%);
		}
		.glyphicon-chevron-left:before{
			color: #000;	
		}
		.glyphicon-chevron-right:before{
			color: #000;	
		}
		  .navbar-default .navbar-nav .open .dropdown-menu > li > a {
		   	color: #000;
		  }
		</style>
		<div class="col-lg-12 text-center">
			<div id="carousel-example-generic" class="carousel slide">
			<!-- Indicators -->
				<ol class="carousel-indicators hidden-xs">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" id="carousel-inner">
					<!--
					<div class="item active">
						<img class="img-responsive img-full" src="img/slide-1.jpg" alt="">
					</div>
					<div class="item">
						<img class="img-responsive img-full" src="img/slide-2.jpg" alt="">
					</div>
					<div class="item">
						<img class="img-responsive img-full" src="img/slide-3.jpg" alt="">
					</div>
					-->
				</div>

				<!-- Controls -->
				<!--
				<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
					<span class="icon-prev"></span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
					<span class="icon-next"></span>
				</a>
				-->
			</div>
		</div>
	</div>


</div>

<script type="text/javascript">
// iframe resize
function autoResize(i)
{
    var iframeHeight=
    (i).contentWindow.document.body.scrollHeight;
    (i).height=iframeHeight+20;
}
</script>

<div class="container">
	<div class="row">
		<div class="carousel">
			<div style="margin-left:95px;margin-right:15px;margin-top:30px;">
				<h3 style="display:inline">Movies Included with Prime Membership at No Additional Cost</h3>&nbsp;&nbsp;<h1 class="h1 small" style="display:inline">See more</h1>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="carousel">
		<div style="margin-left:15px;margin-right:15px;margin-top:15px;border-bottom:1px solid #eeeeee;">
			<!--<iframe id="ifrm1" name="ifrm1" onload="autoResize(this)" src="/info.php" style="width:100%;border:0px;"  scrolling="no"></iframe>-->
			<iframe id="ifrm1" name="ifrm1" onload="autoResize(this)" src="/amazon/getindexslider/movie" style="width:100%;border:0px;"  scrolling="no"></iframe>
		</div>
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="carousel">
			<div style="margin-left:95px;margin-right:15px;margin-top:30px;">
				<h3 style="display:inline">Related to Items You've Viewed</h3>&nbsp;&nbsp;<h1 class="h1 small" style="display:inline">See more</h1>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="carousel">
		<div style="margin-left:15px;margin-right:15px;margin-top:15px;border-bottom:1px solid #eeeeee;">
			<!--<iframe id="ifrm1" name="ifrm1" onload="autoResize(this)" src="/info.php" style="width:100%;border:0px;"  scrolling="no"></iframe>-->
			<iframe id="ifrm1" name="ifrm1" onload="autoResize(this)" src="/amazon/getindexslider/book" style="width:100%;border:0px;"  scrolling="no"></iframe>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="carousel">
			<div style="margin-left:95px;margin-right:15px;margin-top:30px;">
				<h3 style="display:inline">More Items to Consider</h3>&nbsp;&nbsp;<h1 class="h1 small" style="display:inline">See more</h1>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="carousel">
		<div style="margin-left:15px;margin-right:15px;margin-top:15px;border-bottom:1px solid #eeeeee;">
			<!--<iframe id="ifrm1" name="ifrm1" onload="autoResize(this)" src="/info.php" style="width:100%;border:0px;"  scrolling="no"></iframe>-->
			<iframe id="ifrm1" name="ifrm1" onload="autoResize(this)" src="/amazon/getindexslider/digital camera" style="width:100%;border:0px;"  scrolling="no"></iframe>
		</div>
	</div>
</div>

