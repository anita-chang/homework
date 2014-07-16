<h2>新增產品</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('create') ?>

	<label for="pname">產品名稱</label> 
	<input type="input" name="pname" /><br />

	<label for="pinfo">產品簡介</label>
	<textarea name="pinfo"></textarea><br />

	<label for="pdes">產品說明</label>
	<textarea name="pdes"></textarea><br />

	<label for="pprice">產品價格</label> 
	<input type="input" name="pprice" /><br />

	<input type="submit" name="submit" value="增加新產品" /> 

</form>