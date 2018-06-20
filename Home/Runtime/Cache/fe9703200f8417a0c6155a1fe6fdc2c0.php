<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
    <link href='__PUBLIC__/plugins/bootstrap/css/bootstrap.min.css' rel="stylesheet" type="text/css" /><link href="__PUBLIC__/css/components/content.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/components/frame.css" rel="stylesheet" type="text/css" />
    <link href="../Public/css/login.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="loginPage">
		<div class="login_container">
			<h3 class="text-center">Login</h3>
			<form role="form" onsubmit="return false" id="loginForm">
			  <div class="form-group">
			    <label>Username</label>
			    <input type="text" class="form-control" id="loginName" placeholder="请输入名称">
			  </div>
			  <div class="form-group">
			    <label >Password</label>
			    <input type="password" class="form-control" id="loginPass" placeholder="Please input your password">
			  </div>
			  <div class="form-group">
			    <label >Verfy code</label>
			    <img src="<?php echo U('verify');?>" style='cursor:pointer' onclick='this.src="<?php echo U('verify');?>/"+Math.random()' />
			    <input type="text" class="form-control" id="verifyCode">
			  </div>
			  <button type="submit" class="btn btn-default form-control">Login</button>
			</form>
		</div>
	</div>
	<input type="hidden" id="login_check" value="<?php echo U('check');?>">
	<input type="hidden" id="login_index" value="<?php echo U('Index/index');?>">
</body>
<script src='__PUBLIC__/plugins/jquery/jquery.min.js'></script>
<script src="../Public/js/login.index.js"></script>
</html>