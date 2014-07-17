<div class="product_one">
	<img src="" alt="<?php echo $prds['pname'] ?>" />
	<div class="detail">
		<p class="name"><?php echo $prds['pname'] ?></p>
		<p class="info"><?php echo $prds['pinfo'] ?></p>
		<p class="price"><?php echo '超值價：$'.$prds['pprice'] ?></p>
	</div>
	<div class="clear"></div>
	<p class="des"><?php echo $prds['pdes'] ?></p>
	<p class="del"><a href="<?php echo site_url().'/delete/'.$prds['pid'];?>">刪除<?php echo $prds['pname'] ?></a></p>
</div>
