<script>
$(document).ready(function() {
	load_slide_img();
});
function load_slide_img(){
	$.ajax({
		url:'/mall/getslide/',
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
			html += "<div class='active item'>";
		}else{
			html += "<div class='item'>";
		}
		var j = i + 1;
		html += "<h2><img  src='"+data[i]['product_img']+"'></h2>";
		html += "<div class='carousel-caption'>";
		html += "<h3>"+data[i]['product_name']+"</h3>";
		html += "<p>slide"+j+"</p>";
		html += "</div>";
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
				padding-top:10px;
				font-size:52px;
				font-family: "trebuchet ms", sans-serif;
			}
			.item{
				background:#fff;
				text-align: center;
				height: 300px !important;
			}
			.carousel{
				margin-top: 20px;
			}
			.bs-example{
				margin: 20px;
			}
			.carousel-indicators .active{
				background: black;
			}
			.carousel-indicators li{
				background: #ccc;	
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
			</style>

			
			<div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
				
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-top="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-top="1"></li>
					<li data-target="#myCarousel" data-slide-top="2"></li>
				</ol>
				<!-- items start -->
				<div class="carousel-inner" id="carousel-inner">
					<!--<div class="active item">
						<h2>Slide 1</h2>
						<div class="carousel-caption">
							<h3>First</h3>
							<p>slide1</p>
						</div>
					</div>
					<div class="item">
						<h2>Slide 2</h2>
						<div class="carousel-caption">
							<h3>Second</h3>
							<p>slide2</p>
						</div>
					</div>
					<div class="item">
						<h2>Slide 3</h2>
						<div class="carousel-caption">
							<h3>Third</h3>
							<p>slide3</p>
						</div>
					</div>-->

					
				</div>
				<!-- items end -->
				<a class="carousel-control left" href="#myCarousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>
				<a class="carousel-control right" href="#myCarousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				</a>
				
			</div>
	</div>
</div>
