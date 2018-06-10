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
        <?php if(is_array($tblist)): $i = 0; $__LIST__ = $tblist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tb): $mod = ($i % 2 );++$i;?><div id='chart<?php echo ($tb[id]); ?>'></div><?php endforeach; endif; else: echo "" ;endif; ?>
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
	</div>
</body>
<script src='__PUBLIC__/plugins/jquery/jquery.min.js'></script>
<!-- <script src='__PUBLIC__/plugins/highcharts/jquery-1.8.3.min.js'></script> -->
<script src='__PUBLIC__/plugins/bootstrap/js/bootstrap.min.js'></script>
<script src="__PUBLIC__/plugins/underscore/underscore-min.js"></script>
<!-- <script src='__PUBLIC__/plugins/highcharts/jquery-1.8.3.min.js'></script> -->
<!-- <script src="__PUBLIC__/plugins/highcharts/highcharts.js"></script> -->
<script src="https://code.highcharts.com/highcharts.src.js"></script>
<script src="__PUBLIC__/plugins/highcharts/exporting.js"></script>
<script src="__PUBLIC__/plugins/highcharts/highcharts-zh_CN.js"></script>
<script>
$(function() {   	
    var data = null;
    var tables = null;
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

    function fmtDate(obj){
        var date =  new Date(obj*1000);
        var y = date.getFullYear();
        var m = date.getMonth()+1;
        m = m < 10 ? ('0' + m) : m;  
        var d = date.getDate();
        d = d < 10 ? ('0' + d) : d; 
        return y + '-' + m + '-' + d;
    }

    Highcharts.dateFormat('%Y-%m-%d');
    
    $.ajax({
        url:"<?php echo U('getDate');?>",
        type:'get',
        success:function(result){
            data = result.data;
            tables = result.tables;
            tables.forEach(function(table){
                var chartData = [];
                var chartCol = [];
                var chartColId = [];
                var series = [];
                data.forEach(function(val){
                    if(val.id === table.id) {
                        chartData.push(val);
                        chartCol.push(val.name);
                        chartColId.push(val.cid);
                    }
                });
                chartColName = _.uniq(chartCol);
                chartColId = _.uniq(chartColId);
                chartColId.forEach(function(col,colIndex){
                    var itemData = [];
                    chartData.forEach(function(itemDataItem){
                        if(itemDataItem.cid === col){
                            var temp = [
                                parseFloat(itemDataItem.time)*1000,
                                parseFloat(itemDataItem.value)
                            ];
                            itemData.push(temp);                            
                        }
                    })
                    var chartItem = {
                        name: chartColName[colIndex],
                        data: itemData
                    }
                    series.push(chartItem);
                })

                var chart1 = Highcharts.chart('chart'+table.id, {
                    chart: {
                        type: 'spline'
                    },
                    title: {
                        text: table.tablename
                    },
                    subtitle: {
                        text: null
                    },
                    xAxis: {
                        title: {
                            text: null
                        },
                        type: "datetime",
                        // dateTimeLabelFormats: {
                        //     day: '%b/%e',
                        //     month: '%b',
                        //     // week: '%b/%e',
                        //     year: '%y',
                        // },
                        labels: {
                                format: '{value: %Y%m%d}'
                                // align: 'right',
                                // rotation: -30
                        }
                    },
                    yAxis: {
                        title: {
                            text: null
                        },
                        min: 0
                    },
                    tooltip: {
                        split: true
                    },
                    plotOptions: {
                        spline: {
                            marker: {
                                enabled: true
                            }
                        }
                    },
                    series: series
                });
            })
        }
    })    
});
</script>
</html>