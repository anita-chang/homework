<h2 class="tit_center">修改<?php echo $prds['pname'] ?>商品資訊</h2>
<?php echo form_open_multipart('update_edit','id=form-control') ?>
	<ul class="ul_tit">
		<li>*產品名稱：</li>
		<li>產品簡介：</li>
		<li id="tall_img">產品美圖：</li>
		<li id="tall">產品說明：</li>
		<li>*產品價格：</li>
	</ul>
	<ul class="ul_cont">
		<li><input type="input" name="pname" value="<?php echo $prds['pname'] ?>" class="form-control required" /><?php echo form_error('pname');?></li>
		<li><input type="input" name="pinfo" class="form-control" value="<?php echo $prds['pinfo'] ?>" /></li>
		<li><img src="<?php echo base_url();?>image/<?php echo $prds['pimg'] ?>" alt="<?php echo $prds['pname'] ?>" /></li>
		<li><input type="file" name="pimg" accept="image/*" class="form-control" ></li>
		<li><textarea name="pdes" class="form-control" rows="3"><?php echo $prds['pdes'] ?></textarea></li>
		<li><input type="input" name="pprice" value="<?php echo $prds['pprice'] ?>" class="form-control required digits"/><?php echo form_error('pprice');?></li>
		<li>
			<input type="hidden" name="pid" value="<?php echo $prds['pid'] ?>"/>
			<button class="btn" type="submit">更新資料</button>
			<button class="btn" type="reset">重新來過</button>
		</li>
	</ul>
	<div class="clear"></div>

</form>
<script type="text/javascript">
$(function(){
	$("#form-control").validate();
});
</script>