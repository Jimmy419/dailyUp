<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>项目管理系统 by www.nongfuit.com</title>
    <link href='__PUBLIC__/plugins/font-awesome/css/font-awesome.min.css' rel="stylesheet" type="text/css" />
    <link href='__PUBLIC__/plugins/bootstrap/css/bootstrap.min.css' rel="stylesheet" type="text/css" />
    <link href="../Public/css/css.css" rel="stylesheet" type="text/css" />
    <link href="../Public/css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body id="addUserPage">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>添加用户</h3>
        </div>
        <div class="panel-body">
            <form action="<?php echo U('insert');?>" method='post'>
                <label class="form-label">Username</label>
                <input class="form-control" name="name" />
                <label class="form-label">Password</label>
                <input class="form-control" name="password" type="password" />
                <button class="button btn-primary form-control" type="submit" style="margin-top:20px;">Submit</button>
            </form>
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