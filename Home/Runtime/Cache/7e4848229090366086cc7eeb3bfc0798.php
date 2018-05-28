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
	</div>
	<div class="content">
		<table class="table table-bordered table-hover">
			<thead>
				<th>name</th>
				<th>subname</th>
				<th>Need calculation</th>
			</thead>
			<tbody>
	            <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr>
	                    <td><?php echo ($row[name]); ?></td>
	                    <td><?php echo ($row[subname]); ?></td>
	                    <td><?php echo ($row[calc]); ?></td>
	                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
	</div>
</body>
<script src='__PUBLIC__/plugins/jquery/jquery.min.js'></script>
<script src='__PUBLIC__/plugins/bootstrap/js/bootstrap.min.js'></script>
<script>
    $(function() {
        // $.ajax({
        //     url:"<?php echo U('index');?>/id/<?php echo (session('uid')); ?>",
        //     type:'get',
        //     success:function(result){
        //         if(result.status){
        //             // window.location.href="<?php echo U('Login/index');?>"; 

        //         }else{
        //             alert("Get data failed!");
        //         }
        //     }
        // })     	

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