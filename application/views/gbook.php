<h2 class="tit_center"><?php echo $prds['pname'];?>的留言板</h2>
<?php echo form_open_multipart('addgbook','class=form-horizontal id=form-control') ?>
<div class="form-control">
	<ul class="ul_tit">
		<li>*我是：</li>
		<li id="tall">*我想說：</li>
	</ul>
	<ul class="ul_cont">
		<li>
			<input type="text" name="gname" class="form-control required" /><?php echo form_error('gname');?>
			<input name="pid" type="hidden" value="<?php echo $prds['pid'];?>" />
		</li>
		<li><textarea name="gcontent" class="form-control required" rows="3"></textarea><?php echo form_error('gcontent');?></li>
		<li><button class="btn" type="submit" id="submit">留言</button><button class="btn" type="reset">我要重寫</button></li>
	</ul>
	<div class="clear"></div>
</div>
</form>
<script type="text/javascript">
$(function(){
	$("#form-control").validate();
});
</script>

<?php foreach($query as $row):?>
	<ul class="form-control gview">
		<li><?php echo $row['gname'];?> 在 <?php echo $row['gtime'];?> 說:</li>
		<li><?php echo $row['gcontent'];?></li>
	</ul>
<?php endforeach; ?>