<h2 class="tit_center"><?php echo $prds['pname'];?>的留言板</h2>
<form class="form-control" id="form-control" method="post">
	<ul class="ul_tit">
		<li>*我是：</li>
		<li id="tall">*我想說：</li>
	</ul>
	<ul class="ul_cont">
		<li>
			<input type="text" name="gname" id="gname" class="form-control" /><label class="required name">此欄為必填</label>
			<input name="pid" type="hidden" id="pid" value="<?php echo $prds['pid'];?>" />
		</li>
		<li><textarea name="gcontent" id="gcontent" class="form-control" rows="3"></textarea><label class="required gcontent">此欄為必填</label></li>
		<li><a class="btn" id="submit">留言</a><button class="btn" type="reset">我要重寫</button></li>
	</ul>
	<div class="clear"></div>
</form>
<script src="<?php echo base_url('js/gbook_ajax_save.js');?>"></script>
<div id="gbook_view"></div>
<?php foreach($query as $row):?>
	<ul class="form-control gview" id="gid<?php echo $row['gid'];?>">
		<li><?php echo $row['gname'];?> 在 <?php echo $row['gtime'];?> 說:</li>
		<li><?php echo $row['gcontent'];?><button class="btn del_g" onclick="del_g(<?php echo $row['gid'];?>)">刪除不當留言</button></li>
	</ul>
<?php endforeach; ?>