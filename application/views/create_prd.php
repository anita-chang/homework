<h2>新增產品</h2>
<?php echo form_open_multipart('create') ?>
	<ul>
		<li><p>產品名稱：</p><input type="input" name="pname" /><?php echo form_error('pname');?></li>
		<li><p>產品簡介：</p><textarea name="pinfo"></textarea></li>
		<li><p>產品美圖：</p><input type="file" name="pimg" accept="image/*" /><?php echo form_error('pimg');?></li>
		<li><p>產品說明：</p><textarea name="pdes"></textarea></li>
		<li><p>產品價格：</p><input type="input" name="pprice" /><?php echo form_error('pprice');?></li>
	</ul>
	<div class="sub_create">
		<input type="submit" name="submit" value="增加新產品" /> 
	</div>
</form>