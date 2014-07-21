
<?php foreach ($prds as $prds_item){ ?>
		<div class="main">
	    	<a href="<?php echo site_url().'/'.$prds_item['pid'];?>" title="<?php echo $prds_item['pname'] ?>"><img src="<?php echo base_url();?>image/<?php echo $prds_item['pimg'] ?>" alt="<?php echo $prds_item['pname'] ?>" /></a>
			<p class="name"><a href="<?php echo site_url().'/'.$prds_item['pid'];?>" title="<?php echo $prds_item['pname'] ?>"><?php echo $prds_item['pname'] ?></a></p>
	    	<p class="des"><?php echo $prds_item['pinfo'] ?></p>
	    	<p class="price"><?php echo '超值價：$'.$prds_item['pprice'] ?></p>
    	</div>
<?php	} ?>
