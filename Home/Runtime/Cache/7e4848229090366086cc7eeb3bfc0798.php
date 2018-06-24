<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
    <link href='__PUBLIC__/plugins/bootstrap/css/bootstrap.min.css' rel="stylesheet" type="text/css" />
<link href='__PUBLIC__/plugins/bootstrap/css/bootstrap-grid.min.css' rel="stylesheet" type="text/css" /><link href="__PUBLIC__/css/content.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/components/frame.css" rel="stylesheet" type="text/css" />
    <link href="../Public/css/index.css" rel="stylesheet" type="text/css" />
    
    <link href="../Public/css/index.css" rel="stylesheet" type="text/css" />

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
	    <div><a href="<?php echo U('Columns/index');?>">类目</a></div>
	    <div><a href="<?php echo U('Tables/index');?>">我的表</a></div>
	    <div><a href="<?php echo U('Map/index');?>">表映射</a></div>
	    <div><a href="<?php echo U('Upload/index');?>">上传数据</a></div>		
	</div>
    <div class="a-text-white a-flex-auto logout_box"><?php echo (session('username')); ?> [&nbsp;<a href="javascript:void(0)" onclick="logout()" id="logoutLink" class="a-text-white">退出</a>&nbsp;]</div>
</div>
		
        <div class="frame_content">
			
    <div class="row">
        <?php if(is_array($tblist)): $i = 0; $__LIST__ = $tblist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tb): $mod = ($i % 2 );++$i;?><div class="col-sm-6" id='chart<?php echo ($tb[id]); ?>'></div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div class="for_sub_chart"></div>
    <div id="container"></div>
    <div>我的数据</div>
    <table class="table table-bordered table-hover">
        <thead>
            <th>id</th>
            <th>Table Name</th>
            <th>Class Id</th>
            <th>所属分类</th>
            <th>列名</th>
            <th>值</th>
            <th>备注</th>
            <th>时间</th>
            <th>填写时间</th>
            <th colspan="2">Setting</th>
        </thead>
        <tbody>
            <?php if(is_array($tables)): $i = 0; $__LIST__ = $tables;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$table): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($table[id]); ?></td>
                    <td><?php echo ($table[tablename]); ?></td>
                    <td><?php echo ($table[cid]); ?></td>
                    <td><?php echo ($table[mclass]); ?></td>
                    <td><?php echo ($table[name]); ?></td>
                    <td><?php echo ($table[value]); ?></td>
                    <td><?php echo ($table[notes]); ?></td>
                    <td><?php echo ($table[time]); ?></td>
                    <td><?php echo ($table[ctime]); ?></td>
                    <td><a href="<?php echo U('edit');?>/id/<?php echo ($table[dataId]); ?>/cid/<?php echo ($table[cid]); ?>">Edit</a></td>
                    <td><a href="<?php echo U('delete');?>/id/<?php echo ($table[dataId]); ?>">Delete</a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <div><a href="<?php echo U('add');?>" class="left-font01">添加数据</a></div>
    <input type="hidden" id="logoutLink" value="<?php echo U('Login/logout');?>">
    <input type="hidden" id="loginLink" value="<?php echo U('Login/index');?>">
    <input type="hidden" id="getDateLink" value="<?php echo U('getDate');?>">

        </div> 
        
        	<div class="frame_footer">Copy-right</div>
        
    </div>
</body>
<script src='__PUBLIC__/plugins/jquery/jquery.min.js'></script><script src='__PUBLIC__/plugins/bootstrap/js/bootstrap.min.js'></script><script src="__PUBLIC__/plugins/highcharts/highcharts.js"></script><script src="__PUBLIC__/plugins/underscore/underscore-min.js"></script>

    <script type="text/javascript" src="../Public/js/index.index.js"></script>

</html>