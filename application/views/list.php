<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
	<script src="http://code.jquery.com/jquery-1.11.2.min.js" type="text/javascript"></script>
	<script src="/js/jquery.bpopup.min.js" type="text/javascript"></script>
	
	<script>
		function addBoard()
		{
			/*
			$.ajax({
				url:'/board/write',
				dataType:'json',
				type:'POST',
				data:{'msg':$('#msg').val()},
				cache: false,
				async: false,
				success:function(result){
					if(result['result']==true){
						$('#result').html(result['msg']);
					}
				}
			});
			.done(function(html){

			});*/
			openMessage('writeBody');

		}
		function board_init(ids){
			$("#name").val('');
			$("#title").val('');
			$("#content").val('');
			$("#"+ids).bPopup().close();
		}

		function openMessage(ids)
		{
			$("#"+ids).bPopup();
		}
		function execSave(){

			if(!$.trim($("#name").val()))
			{
				alert("이름을 입력해주세요.");
				$("#name").focus();
				return false;
			}

			if($.trim($("#title").val()) == "")
			{
				alert("제목을 입력해주세요.");
				$("#title").focus();
				return false;
			}

			if($.trim($("#content").val()) == "")
			{
				alert("내용을 입력해주세요.");
				$("#content").focus();
				return false;
			}

			$.ajax({
				url:'/board/write',
				dataType:'json',
				type:'POST',
				data:{name : $.trim($("#name").val()), title : $.trim($("#title").val()), content : $.trim($("#content").val())},
				cache: false,
				async: false, //처리완료 후 다음께 실행됨
				success:function(result){
					if(result['result']==true){
						alert('ok');
						board_init('writeBody');
						location.reload();
					}else{
						alert('fail');
					}
				}
			});
			
			
		}
		function loadingList(idx){
			$.ajax({
				url:'/board/getlist/'+idx,
				dataType:'json',
				type:'GET',
				data:{ },
				cache: false,
				async: false, //처리완료 후 다음께 실행됨
				success:function(result){
					 //alert(result[0]['no']);
					//console.log(JSON.stringify(result));
					
					addList(result);
				}
			});
			

		}
		function view(idx){
			$.ajax({
				url:'/board/getView/'+idx,
				dataType:'json',
				type:'GET',
				data:{ },
				cache: false,
				async: false, //처리완료 후 다음께 실행됨
				success:function(result){
					 //alert(result[0]['no']);
					console.log(JSON.stringify(result));
					addView(result);
				}
			});

		}
		function addView(data){
			$("#viewname").html(data[0]['name']);
			$("#viewtitle").html(data[0]['title']);
			$("#viewcontent").html(data[0]['content']);
			openMessage('viewBody');
		}
		function addList(data){
			var more_cnt = data.more_count;
			var list = data.list;
			var latest_no = data.latest_no;
			var cnt = list.length;
			var html="";
			var page = data.no;
			var list_limit = data.list_limit;
			for(var i=0;i<cnt;i++){
			
				if(page>0){
					var j = i + (list_limit*page);
				}else{
					j=i+1;

				}

				html += "<a href='#' onclick=\"view('"+list[i]['no']+"');\"><div style='width:100%;border-top:1px solid #aaaaaa; height:30px;clear:both;color:#999999'>";
				html += "<span style='width:10%;float:left;text-align:center;lien-height:30px;'>";
				html += j;
				html += "</span>";
				html += "<span style='width:20%;float:left;text-align:center;lien-height:30px;'>";
				html += list[i]['name'];
				html += "</span>";
				html += "<span style='width:40%;float:left;text-align:center;lien-height:30px;'>";
				html +=  list[i]['title'];
				html += "</span>";
				html += "<span style='width:30%;float:left;text-align:center;lien-height:30px;'>";
				html += list[i]['adddate'];
				html += "</span></a>";

				html += "</div>";
			}
			if(more_cnt > 0)
			{

				more_html = "<div style=\"width:100%; padding-top:14px; text-align:center;\"><a href=\"#\" onclick=\"loadingList('"+latest_no+"'); return false;\"><strong>더보기 ("+more_cnt+")</strong></a></div>"


			} else {

				more_html = "";

			}

			

			//alert(html);
			$("#tableList").append(html);    
			$("#more_box").html(more_html);
		}
		$(document).ready(function() {
			loadingList(0);
		});
	</script>
</head>
<body>

<div id="container">
	<h1>게시판 만들기1</h1>

	<div id="body">
		<div id="tableBody" style="width:93%;margin:0px auto;">
			<div style="width:100%;border-top:1px solid #333333; height:30px;clear:both">
				<span style="width:10%;float:left;text-align:center;lien-height:30px;">
					No.
				</span>
				<span style="width:20%;float:left;text-align:center;lien-height:30px;">
					Name.
				</span>
				<span style="width:40%;float:left;text-align:center;lien-height:30px;">
					Subject.
				</span>
				<span style="width:30%;float:left;text-align:center;lien-height:30px;">
					Date.
				</span>

			</div>
			<div id="tableList">

			</div>
			<div id="more_box">

			</div>
			
			


		</div>
	</div>

	<div id="bottom">
		<div style="float:right;width:50%;text-align:right">
			<button onclick="javascript:addBoard();">글쓰기</button>
		</div>
	</div>
	<div id="viewBody" style="width:700px;height:500px;border:1px solid #333333;background-color:white;display:none;">
		<div style="width:80%;clear:both;height:30px;margin:0px auto;margin-top:20px;">
			<span style="width:30%;height:100%;line-height:30px">
				이름
			</span>

			<span style="width:70%;height:100%;line-height:30px" id="viewname">
				
			</span>
		</div>

		<div style="width:80%;clear:both;height:30px;margin:0px auto">
			<span style="width:30%;height:100%;line-height:30px">
				제목
			</span>

			<span style="width:70%;height:100%;line-height:30px"  id="viewtitle">
				
			</span>
		</div>

		<div style="width:80%;clear:both;height:270px;margin:0px auto">
			<span style="width:30%;height:30px;line-height:30px;vertical-align:top">
				내용
			</span>

			<span style="width:70%;height:100%"  id="viewcontent">
			</span>
		</div>

	</div>

	<div id="writeBody" style="width:700px;height:500px;border:1px solid #333333;background-color:white;display:none;">
		<div style="width:80%;clear:both;height:30px;margin:0px auto;margin-top:20px;">
			<span style="width:30%;height:100%;line-height:30px">
				이름
			</span>

			<span style="width:70%;height:100%;line-height:30px">
				<input type="text" id="name" name="name" required option="2" info="이름">
			</span>
		</div>

		<div style="width:80%;clear:both;height:30px;margin:0px auto">
			<span style="width:30%;height:100%;line-height:30px">
				제목
			</span>

			<span style="width:70%;height:100%;line-height:30px">
				<input type="text" id="title" name="title"  style="width:90%;height:100%" required option="2" info="제목" >
			</span>
		</div>

		<div style="width:80%;clear:both;height:270px;margin:0px auto">
			<span style="width:30%;height:30px;line-height:30px;vertical-align:top">
				내용
			</span>

			<span style="width:70%;height:100%">
				<textarea style="width:90%;height:100%" id="content" name="content"></textarea>
			</span>
		</div>

		<div style="width:80%;clear:both;height:30px;margin:0px auto;margin-top:50px;text-align:center">
			<button onclick="javascript:execSave();">등록하기</button>
		</div>


	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>