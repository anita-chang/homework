<div class="product_one">
	<div class="pimg"><img src="<?php echo base_url();?>image/<?php echo $prds['pimg'] ?>" alt="<?php echo $prds['pname'] ?>" /></div>
	<div class="detail">
		<p class="name">產品名稱：<?php echo $prds['pname'] ?></p>
		<p class="info">產品簡介：<?php echo $prds['pinfo'] ?></p>
		<p class="price">超值價：<?php echo $prds['pprice'] ?></p>
	</div>
	<div class="clear"></div>
	<p class="des"><?php echo $prds['pdes'] ?></p>
	<p class="del"><a href="<?php echo site_url().'/update_get/'.$prds['pid'];?>">修改<?php echo $prds['pname'] ?></a></p>
	<p class="del"><a href="<?php echo site_url().'/delete/'.$prds['pid'];?>">刪除<?php echo $prds['pname'] ?></a></p>
</div>
