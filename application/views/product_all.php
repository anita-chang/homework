
<?php foreach ($prds as $prds_item){ ?>
		<div class="main">
			<div class="con_img"><a href="<?php echo site_url().'/'.$prds_item['pid'];?>" title="<?php echo $prds_item['pname'] ?>"><img src="<?php echo base_url();?>image/<?php echo $prds_item['pimg'] ?>" alt="<?php echo $prds_item['pname'] ?>" /></a></div>
			<p class="name"><a href="<?php echo site_url().'/'.$prds_item['pid'];?>" title="<?php echo $prds_item['pname'] ?>"><?php echo $prds_item['pname'] ?></a></p>
			<p class="des"><?php echo $prds_item['pinfo'] ?></p>
			<p class="price"><?php echo '超值價：$'.$prds_item['pprice'] ?></p>
			<p class="del"><a href="<?php echo site_url().'/update_get/'.$prds_item['pid'];?>">修改</a></p>
			<p class="del"><a href="<?php echo site_url().'/delete/'.$prds_item['pid'];?>" class="confirm">刪除</a></p>
		</div>
<?php	} ?>
<div class="clear"></div>
<div class="view_page">
	<?php echo $pagelist; ?>
</div>
	<script type="text/javascript">
	$(".confirm").confirm({
		text: "確定要刪除資料?",
		title: "警告視窗",
		confirmButton: "對，我要刪除",
		cancelButton: "不要好了",
		post: true
	});
	</script>