<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
    <link href='__PUBLIC__/plugins/bootstrap/css/bootstrap.min.css' rel="stylesheet" type="text/css" />
<link href='__PUBLIC__/plugins/bootstrap/css/bootstrap-grid.min.css' rel="stylesheet" type="text/css" /><link href="__PUBLIC__/plugins/datepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" /><link href='__PUBLIC__/plugins/font-awesome/css/font-awesome.min.css' rel="stylesheet" type="text/css" /><link href="__PUBLIC__/css/content.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/components/frame.css" rel="stylesheet" type="text/css" />
    
    <link href="__PUBLIC__/css/components/index.css" rel="stylesheet" type="text/css" />

</head>
<body>
    <div class="frame">
		
			<div class="frame_header a-d-flex">
	<div class="a_dropdown">
		<div class="a_dropdown_value"><?php echo ($_SESSION['utb']['tablename']); ?></div>
		<ul class="a_dropdown_box">
			<?php foreach ($_SESSION['utbs'] as $utb) { echo "<li class='a_dropdown_list' tid='".$utb[id]."'>$utb[tablename]</li>"; } ?>
		</ul>
	</div>
	<div class="a-flex-stretch a-d-flex">
		<div class="<?php echo ($_SESSION['tabidx'] == 1?'active':''); ?>"><a href="<?php echo U('Index/index');?>">图表</a></div>
		<div class="<?php echo ($_SESSION['tabidx'] == 2?'active':''); ?>"><a href="<?php echo U('Data/index');?>">我的数据</a></div>
	    <!-- <div><a href="<?php echo U('Columns/index');?>">类目</a></div>
	    <div><a href="<?php echo U('Tables/index');?>">我的表</a></div>
	    <div><a href="<?php echo U('Map/index');?>">表映射</a></div>
	    <div><a href="<?php echo U('Upload/index');?>">上传数据</a></div> -->		
	</div>
    <div class="a-text-white a-flex-auto logout_box"><?php echo (session('username')); ?> [&nbsp;<a href="javascript:void(0)" class="a-text-white logout">退出</a>&nbsp;]</div>
	<div class="dropdown a-flex-auto settings_box">
	  <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    <i class="fa fa-cog fa-lg" ></i>
	  </button>
	  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		<a href="<?php echo U('Tables/index');?>">Tables</a>
		<a href="<?php echo U('Columns/index');?>">Columns</a>
		<a href="<?php echo U('Map/index');?>">Tables Columns Mapping</a>
		<a href="<?php echo U('Subtable/index');?>">Subtables</a>
		<a href="<?php echo U('Subcolumns/index');?>">Subtable columns</a>
		<a href="<?php echo U('Upload/index');?>">Upload data</a>
	  </div>
	</div>
    <input type="hidden" value="<?php echo U('Login/index');?>" id="loginLink">
    <input type="hidden" value="<?php echo U('Common/logout');?>" id="logoutLink">
    <input type="hidden" value="<?php echo U('Common/setSesstionTb');?>" id="setSesstionTb">
    <input type="hidden" value="<?php echo U('Index/index');?>" id="indexIndex">
</div>
		
        <div class="frame_content">
			
    <div class="row chart-box">
    </div>
    <div class="for_sub_chart"></div>
    <input type="hidden" id="getDateLink" value="<?php echo U('getDate');?>">

        </div> 
        
        	<div class="frame_footer">Copy-right</div>
        
    </div>
</body>
<script src='__PUBLIC__/plugins/jquery/jquery.min.js'></script><script src='__PUBLIC__/plugins/tether/tether.min.js'></script>
<script src='__PUBLIC__/plugins/bootstrap/js/bootstrap.min.js'></script><script src='__PUBLIC__/plugins/datepicker/js/bootstrap-datetimepicker.min.js'></script><script src="__PUBLIC__/plugins/highcharts/highcharts.js"></script><script src="__PUBLIC__/plugins/underscore/underscore-min.js"></script><script src="../Public/js/common.js"></script>

    <script type="text/javascript" src="../Public/js/index.index.js"></script>

</html>