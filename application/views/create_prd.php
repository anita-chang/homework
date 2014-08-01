<h2 class="tit_center">新增產品</h2>
<?php echo form_open_multipart('create','id=form-control') ?>
	<ul class="ul_tit">
		<li>*產品名稱：</li>
		<li>產品簡介：</li>
		<li>*產品美圖：</li>
		<li id="tall">產品說明：</li>
		<li>*產品價格：</li>
	</ul>
	<ul class="ul_cont">
		<li><input type="input" name="pname" class="form-control required" /><?php echo form_error('pname');?></li>
		<li><input type="input" name="pinfo" class="form-control" /></li>
		<li><input type="file" name="pimg" accept="image/*" class="form-control required" /><?php echo form_error('pimg');?></li>
		<li><textarea name="pdes" class="form-control" rows="3"></textarea></li>
		<li><input type="input" name="pprice" class="form-control required digits" /><?php echo form_error('pprice');?></li>
		<li><button class="btn" type="submit">增加新產品</button><button class="btn" type="reset">我要重寫</button></li>
	</ul>
	<div class="clear"></div>
</form>
<script type="text/javascript">
$(function(){
	$("#form-control").validate();
});
</script>