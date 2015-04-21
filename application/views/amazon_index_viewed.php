<?php

?>


<div class="container">
	<div class="row">
		<div class="carousel">
			<div style="margin-left:0px;margin-right:0px;margin-top:80px;margin-bottom:20px;">
				<h3 style="display:inline"><?=$product_data[0]['product_name']?></h3>&nbsp;&nbsp;<h1 class="h1 small" style="display:inline">[<?=$product_data[0]['category_name']?>]</h1>
			</div>
			<div style="float:left;width:15%">
				<img src="<?=$product_data[0]['product_img']?>" width="100%">
			</div>
			<div style="float:left;width:80%;margin-left:30px;">
				<span>product name: <?=$product_data[0]['product_name']?></span>
				<hr size="1"></hr>
				<span>price: <?=$product_data[0]['product_price']?></span>
				<hr size="1"></hr>
				<span>category name: <?=$product_data[0]['category_name']?> >  <?=$product_data[0]['category_sub_name']?></span>
			</div>
		</div>
	</div>
</div>

