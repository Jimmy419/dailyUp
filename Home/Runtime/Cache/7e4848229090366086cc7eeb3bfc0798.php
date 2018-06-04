<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>asdf</title>
    <link href='__PUBLIC__/plugins/font-awesome/css/font-awesome.min.css' rel="stylesheet" type="text/css" />
    <link href='__PUBLIC__/plugins/bootstrap/css/bootstrap.min.css' rel="stylesheet" type="text/css" />
    <link href="../Public/css/index.css" rel="stylesheet" type="text/css" />
</head>
<body class="indexPage">
	<div class="header">
		<div><?php echo (session('username')); ?> [&nbsp;<a href="javascript:void(0)" onclick="logout()" id="logoutLink" class="left-font01">退出</a>&nbsp;]</div>
        <div><a href="<?php echo U('Columns/index');?>">类目</a></div>
        <div><a href="<?php echo U('Tables/index');?>">我的表</a></div>
        <div><a href="<?php echo U('Map/index');?>">表映射</a></div>
        <div><a href="<?php echo U('Upload/index');?>">上传数据</a></div>
	</div>
	<div class="content">
        <!-- <div>我的分类</div>
        <table class="table table-bordered table-hover">
            <thead>
                <th>id</th>
                <th>class</th>
                <th>Column Name</th>
            </thead>
            <tbody>
                <?php if(is_array($colums)): $i = 0; $__LIST__ = $colums;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$col): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($col[id]); ?></td>
                        <td><?php echo ($col[mclass]); ?></td>
                        <td><?php echo ($col[name]); ?></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>   -->
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
        <!-- <div>我的数据</div>
        <table class="table table-bordered table-hover">
            <thead>
                <th>id</th>
                <th>column id</th>
                <th>notes</th>
                <th>value</th>
                <th>时间</th>
                <th>填写时间</th>
            </thead>
            <tbody>
                <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($data[id]); ?></td>
                        <td><?php echo ($data[cid]); ?></td>
                        <td><?php echo ($data[notes]); ?></td>
                        <td><?php echo ($data[value]); ?></td>
                        <td><?php echo ($data[time]); ?></td>
                        <td><?php echo ($data[ctime]); ?></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table> -->


	</div>
</body>
<script src='__PUBLIC__/plugins/jquery/jquery.min.js'></script>
<script src='__PUBLIC__/plugins/bootstrap/js/bootstrap.min.js'></script>
<script>
    $(function() {   	
    	$("#logoutLink").click(function(){
            $.ajax({
                url:"<?php echo U('Login/logout');?>",
                type:'get',
                success:function(result){
                    if(result.status){
                        window.location.href="<?php echo U('Login/index');?>"; 
                    }else{
                        alert("Logout failed!");
                    }
                }
            })      		
    	})
    });
</script>
</html>