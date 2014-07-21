<h2>修改<?php echo $prds['pname'] ?>商品資訊</h2>
<?php echo form_open_multipart('update_edit') ?>
	<ul>
		<li><p>產品名稱：</p><input type="input" name="pname" value="<?php echo $prds['pname'] ?>" /><?php echo form_error('pname');?></li>
		<li><p>產品簡介：</p><textarea name="pinfo"><?php echo $prds['pinfo'] ?></textarea></li>
		<li><p>產品美圖：</p><img src="<?php echo base_url();?>image/<?php echo $prds['pimg'] ?>" alt="<?php echo $prds['pname'] ?>" /></li>
		<li><input type="file" name="pimg" accept="image/*" class="up_img" ></li>
		<li><p>產品說明：</p><textarea name="pdes"><?php echo $prds['pdes'] ?></textarea></li>
		<li><p>產品價格：</p><input type="input" name="pprice" value="<?php echo $prds['pprice'] ?>" /><?php echo form_error('pprice');?></li>
	</ul>
	<div class="sub_create">
		 <input type="hidden" name="pid" value="<?php echo $prds['pid'] ?>"/>
		<input type="submit" name="submit" value="更新資料" />
		
	</div>
</form>
