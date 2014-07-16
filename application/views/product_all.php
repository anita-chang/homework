
<?php foreach ($prds as $prds_item){ ?>
		<div class="all_main">
	    	<p class="name"><a href="<?php echo site_url().'/'.$prds_item['pid'];?>" title="<?php echo $prds_item['pname'] ?>"><?php echo $prds_item['pname'] ?></a></p>
	    	<p class="des"><?php echo $prds_item['pdes'] ?></p>
	    	<p class="price"><?php echo '$'.$prds_item['pprice'] ?></p>
    	</div>
<?php	} ?>
