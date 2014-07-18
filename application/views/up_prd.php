<h2>修改<?php echo $prds['pname'] ?>商品資訊</h2>
<div class="error">
	<?php echo validation_errors(); ?>
</div>
<?php echo form_open('update_edit') ?>
	<ul>
		<li>產品名稱：<input type="input" name="pname" value="<?php echo $prds['pname'] ?>" /></li>
		<li>產品簡介：<textarea name="pinfo"><?php echo $prds['pinfo'] ?></textarea></li>
		<li>產品說明：<textarea name="pdes"><?php echo $prds['pdes'] ?></textarea></li>
		<li>產品價格：<input type="input" name="pprice" value="<?php echo $prds['pprice'] ?>" /></li>
	</ul>
	<div class="">
		 <input type="hidden" name="pid" value="<?php echo $prds['pid'] ?>"/>
		<input type="submit" name="submit" value="update" />
		
	</div>

</form>
