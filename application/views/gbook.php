<h2 class="tit_center"><?php echo $prds['pname'];?>的留言板</h2>
<?php echo form_open_multipart('addgbook','class=form-horizontal name=test') ?>
<div class="form-control">
	<ul class="ul_tit">
		<li>我是：</li>
		<li id="tall">我想說：</li>
		<li class="kimg"><img src="<?php echo site_url();?>/keycik"/></li>
	</ul>
	<ul class="ul_cont">
		<li>
			<input type="text" name="gname" class="form-control" />
			<input name="pid" type="hidden" value="<?php echo $prds['pid'];?>" />
		</li>
		<li><textarea name="gcontent" class="form-control" rows="3"></textarea></li>
		<li><input type="text" name="chck" class="form-control" /></li>
		<li><button class="btn" type="submit">留言</button></li>
	</ul>
	<div class="clear"></div>
</div>
</form>

<?php foreach($query->result_array() as $row):?>
	<ul class="form-control gview">
		<li><?php echo $row['gname'];?> 在 <?php echo $row['gtime'];?> 說:</li>
		<li><?php echo $row['gcontent'];?></li>
	</ul>
<?php endforeach; ?>