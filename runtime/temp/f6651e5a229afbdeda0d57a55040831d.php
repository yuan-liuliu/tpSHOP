<?php /*a:1:{s:78:"F:\phpStudy\PHPTutorial\WWW\mouth5\tp5\application\zuoye\view\staff\index.html";i:1559047134;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script type="text/javascript" src="/static/jquery-3.3.1.js"></script>
</head>
<body>
	<form action="" method="get">
		<select name="d_id">
			<option value="0">请选择</option>
			<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
			<option value="<?php echo htmlentities($v['d_id']); ?>" <?php if($v['d_id']==$d_id): ?>selected<?php endif; ?>><?php echo htmlentities($v['d_name']); ?></option>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</select>
		<select name="s_sex">
			<option value="0">请选择</option>
			<option value="1"<?php if($s_sex==1): ?>selected<?php endif; ?>>男</option>
			<option value="2"<?php if($s_sex==2): ?>selected<?php endif; ?>>女</option>
		</select>
		<select name="s_education">
			<option value="0">请选择</option>
			<option value="1" <?php if($s_education==1): ?>selected<?php endif; ?>>中专</option>
			<option value="2" <?php if($s_education==2): ?>selected<?php endif; ?>>大专</option>
		</select>
		<input type="submit" value="搜索">
	</form>
	<table border="1">
		<tr>
			<th>ID</th>
			<th>员工账号</th>
			<th>所属部门</th>
			<th>出生日期</th>
			<th>学历</th>
			<th>性别</th>
			<th>姓名</th>
		</tr>
		<?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
		<tr s_id="<?php echo htmlentities($v['s_id']); ?>">
			<td><?php echo htmlentities($v['s_id']); ?></td>
			<td field="s_email">
				<span class="span"><?php echo htmlentities($v['s_email']); ?></span>
				<input type="text" value="<?php echo htmlentities($v['s_email']); ?>" class="ipt">
			</td>
			<td><?php echo htmlentities($v['Department']['d_name']); ?></td>
			<td><?php echo htmlentities($v['s_birth']); ?></td>
			<td><?php echo htmlentities($v['s_education']); ?></td>
			<td><?php echo htmlentities($v['s_sex']); ?></td>
			<td><?php echo htmlentities($v['s_name']); ?></td>
		</tr>
		<?php endforeach; endif; else: echo "" ;endif; ?>
		<tr>
			<td colspan="7"><?php echo $info; ?></td>
		</tr>
	</table>
	<script type="text/javascript">
		$(function(){
			$('.ipt').hide();
			$(document).on('click','.span',function(){
				$(this).hide();
				$(this).next('input').show();
			});

			$(document).on('blur','.ipt',function(){
				var _this = $(this);
				var s_id = _this.parents('tr').attr('s_id');
				var field = _this.parent('td').attr('field');
				var value = _this.val();
				$.post(
					"<?php echo url('jdjg'); ?>",
					{s_id:s_id,field:field,value:value},
					function(msg){
						if(msg.code==2){
							alert(msg.font);
						}else{
							_this.hide();
							_this.prev('span').text(value).show();
						}
					}
				);
			});
		})
	</script>
</body>
</html>