<h2>新增產品</h2>
<div class="error">
	<?php echo validation_errors(); ?>
</div>
<?php echo form_open_multipart('create') ?>
	<ul>
		<li>產品名稱：<input type="input" name="pname" /></li>
		<li>產品簡介：<textarea name="pinfo"></textarea></li>
		<li>產品圖片：<input type="file" name="pimg"></li>
		<li>產品說明：<textarea name="pdes"></textarea></li>
		<li>產品價格：<input type="input" name="pprice" /></li>
	</ul>
	<div class="">
		<input type="submit" name="submit" value="增加新產品" /> 
	</div>
</form>