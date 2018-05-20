<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>项目管理系统 by www.nongfuit.com</title>
    <link href='__PUBLIC__/plugins/font-awesome/css/font-awesome.min.css' rel="stylesheet" type="text/css" />
    <link href='__PUBLIC__/plugins/bootstrap/css/bootstrap.min.css' rel="stylesheet" type="text/css" />
    <link href="../Public/css/css.css" rel="stylesheet" type="text/css" />
    <link href="../Public/css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>查看用户</h3>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <th>ID</th>
                    <th>用户名</th>
                    <th colspan="2" class="text-center">Management</th>
                </thead>
                <tbody>
                    <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($row[id]); ?></td>
                            <td><?php echo ($row[name]); ?></td>
                            <td class="text-center"><a href="<?php echo U('edit');?>/id/<?php echo ($row[id]); ?>">Edit</a></td>
                            <td class="text-center"><a href="<?php echo U('delete');?>/id/<?php echo ($row[id]); ?>">Delete</a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                </tbody>
            </table>
        </div>
    </div>
</body>
<script src='__PUBLIC__/plugins/jquery/jquery.min.js'></script>
<script src='__PUBLIC__/plugins/bootstrap/js/bootstrap.min.js'></script>
<script>
    $(function() {

    });
</script>
</html>