
<?php foreach ($prds as $prds_item){ 
	if ($prds_item['pid'] < 5) { ?>
		<div class="main">
	    	<p class="name"><a href="<?php echo site_url().'/'.$prds_item['pid'];?>" title="<?php echo $prds_item['pname'] ?>"><?php echo $prds_item['pname'] ?></a></p>
	    	<p class="des"><?php echo $prds_item['pdes'] ?></p>
	    	<p class="price"><?php echo '$'.$prds_item['pprice'] ?></p>
    	</div>
<?php	}
} ?>
<div class="clear"></div>
<div class="more"><a href="<?php echo site_url() ;?>/view_all" title="">more...</a></div>