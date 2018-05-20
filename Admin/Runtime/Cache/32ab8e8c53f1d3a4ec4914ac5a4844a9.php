<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>项目管理系统 by www.nongfuit.com</title>
    <link href="../Public/css/css.css" rel="stylesheet" type="text/css" />
    <link href="../Public/css/admin.css" rel="stylesheet" type="text/css" />
    <script src='__PUBLIC__/js/jquery.min.js'></script>
</head>
<script>
$(function() {
    $('.aclick').toggle(
        function() {
            id = this.id;
            $("#subtree" + id).fadeIn(100);
        },
        function() {
            id = this.id;
            $("#subtree" + id).fadeOut(100);
        }

    );

    $(".toggle-parent").click(function(){
    	$(this).next(".toggle-son").toggle();
    })
});
</script>

<body>
    <table width="198" border="0" cellpadding="0" cellspacing="0" class="left-table01">
        <tr>
            <TD>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="207" height="55" background="../Public/images/nav01.gif">
                            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="25%" rowspan="2"><img src="../Public/images/ico02.gif" width="35" height="35" /></td>
                                    <td width="75%" height="22" class="left-font01">您好，<span class="left-font02"><?php echo $_SESSION['username'] ?></span></td>
                                </tr>
                                <tr>
                                    <td height="22" class="left-font01">
                                        [&nbsp;<a href="<<?php echo U('Login/logout');?>>" target="_top" class="left-font01">退出</a>&nbsp;]</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!--  任务管理    -->
                <div>
                	<div class="toggle-parent left-table03">
                		用户管理
                	</div>
                	<ul class="toggle-son">
	                	<li><a>查看用户</a></li>
	                	<li><a>修改用户</a></li>
	                	<li><a>增加用户</a></li>              		
                	</ul>
                </div>
                <table width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
                    <tr>
                        <td height="29">
                            <table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="8%"><img name="img8" id="img8" src="../Public/images/ico04.gif" width="8" height="11" /></td>
                                    <td width="92%">
                                        <a href="javascript:" id='1' target="mainFrame" class="left-font03 aclick">用户管理</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table id="subtree1" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="left-table02">
                    <tr>
                        <td width="9%" height="20"><img id="xiaotu20" src="../Public/images/ico05.gif" width="8" height="12" /></td>
                        <td width="91%"><a href="<<?php echo U('User/index');?>>" target="mainFrame" class="left-font03">查看用户</a></td>
                    </tr>
                    <tr>
                        <td width="9%" height="20"><img id="xiaotu20" src="../Public/images/ico05.gif" width="8" height="12" /></td>
                        <td width="91%"><a href="<<?php echo U('User/add');?>>" target="mainFrame" class="left-font03">添加用户</a></td>
                    </tr>
                </table>
                <!--  分类管理    -->
                <table width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
                    <tr>
                        <td height="29">
                            <table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="8%"><img name="img8" id="img8" src="../Public/images/ico04.gif" width="8" height="11" /></td>
                                    <td width="92%">
                                        <a href="javascript:" target="mainFrame" class="left-font03 aclick" id='2'>分类管理</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table id="subtree2" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="left-table02">
                    <tr>
                        <td width="9%" height="20"><img id="xiaotu20" src="../Public/images/ico05.gif" width="8" height="12" /></td>
                        <td width="91%"><a href="../shopclass/index.php" target="mainFrame" class="left-font03">查看分类</a></td>
                    </tr>
                    <tr>
                        <td width="9%" height="20"><img id="xiaotu20" src="../Public/images/ico05.gif" width="8" height="12" /></td>
                        <td width="91%"><a href="../shopclass/add.php" target="mainFrame" class="left-font03">添加分类</a></td>
                    </tr>
                </table>
                <!--  品牌管理    -->
                <table width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
                    <tr>
                        <td height="29">
                            <table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="8%"><img name="img8" id="img8" src="../Public/images/ico04.gif" width="8" height="11" /></td>
                                    <td width="92%">
                                        <a href="javascript:" target="mainFrame" class="left-font03 aclick" id='3'>品牌管理</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table id="subtree3" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="left-table02">
                    <tr>
                        <td width="9%" height="20"><img id="xiaotu20" src="../Public/images/ico05.gif" width="8" height="12" /></td>
                        <td width="91%"><a href="../brand/index.php" target="mainFrame" class="left-font03">查看品牌</a></td>
                    </tr>
                    <tr>
                        <td width="9%" height="20"><img id="xiaotu20" src="../Public/images/ico05.gif" width="8" height="12" /></td>
                        <td width="91%"><a href="../brand/add.php" target="mainFrame" class="left-font03">添加品牌</a></td>
                    </tr>
                </table>
                <!--  商品管理    -->
                <table width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
                    <tr>
                        <td height="29">
                            <table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="8%"><img name="img8" id="img8" src="../Public/images/ico04.gif" width="8" height="11" /></td>
                                    <td width="92%">
                                        <a href="javascript:" target="mainFrame" class="left-font03 aclick" id='4'>商品管理</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table id="subtree4" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="left-table02">
                    <tr>
                        <td width="9%" height="20"><img id="xiaotu20" src="../Public/images/ico05.gif" width="8" height="12" /></td>
                        <td width="91%"><a href="../shop/index.php" target="mainFrame" class="left-font03">查看商品</a></td>
                    </tr>
                    <tr>
                        <td width="9%" height="20"><img id="xiaotu20" src="../Public/images/ico05.gif" width="8" height="12" /></td>
                        <td width="91%"><a href="<<?php echo U('Shop/add');?>>" target="mainFrame" class="left-font03">添加商品</a></td>
                    </tr>
                </table>
                <!--  订单状态管理    -->
                <table width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
                    <tr>
                        <td height="29">
                            <table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="8%"><img name="img8" id="img8" src="../Public/images/ico04.gif" width="8" height="11" /></td>
                                    <td width="92%">
                                        <a href="javascript:" target="mainFrame" class="left-font03 aclick" id='5'>订单状态</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table id="subtree5" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="left-table02">
                    <tr>
                        <td width="9%" height="20"><img id="xiaotu20" src="../Public/images/ico05.gif" width="8" height="12" /></td>
                        <td width="91%"><a href="../orderstat/index.php" target="mainFrame" class="left-font03">查看订单状态</a></td>
                    </tr>
                    <tr>
                        <td width="9%" height="20"><img id="xiaotu20" src="../Public/images/ico05.gif" width="8" height="12" /></td>
                        <td width="91%"><a href="../orderstat/add.php" target="mainFrame" class="left-font03">添加订单状态</a></td>
                    </tr>
                </table>
                <!--  订单管理    -->
                <table width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
                    <tr>
                        <td height="29">
                            <table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="8%"><img name="img8" id="img8" src="../Public/images/ico04.gif" width="8" height="11" /></td>
                                    <td width="92%">
                                        <a href="javascript:" target="mainFrame" class="left-font03 aclick" id='6'>订单管理</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table id="subtree6" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="left-table02">
                    <tr>
                        <td width="9%" height="20"><img id="xiaotu20" src="../Public/images/ico05.gif" width="8" height="12" /></td>
                        <td width="91%"><a href="../orders/index.php" target="mainFrame" class="left-font03">查看订单</a></td>
                    </tr>
                </table>
            </TD>
        </tr>
    </table>
</body>

</html>