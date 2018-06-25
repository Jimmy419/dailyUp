$(function() {   	
    var data = null;
    var tables = null;

    $.ajax({
        url:$("#getDateLink").val(),
        type:'get',
        success:function(result){
            console.log(result);
            var data = result.data;
            var columns = result.tablecols;
            var tables = result.tables;
            var table = result.table;
            var subtabs = result.subtables;
            // subCharts(tables,data,subtabs);
            drawCharts(table,columns,data);
        }
    })

    function drawCharts(table, columns, data){
        $(".chart-box").append("<div class='col-sm-6' id='chart"+table.id+"'></div>");
        var series = [];
        columns.forEach(function(col,colIndex){
            var itemData = [];
            data.forEach(function(dataItem){
                if(dataItem.cid === col.cid){
                    var temp = [
                        parseFloat(dataItem.time)*1000,
                        parseFloat(dataItem.value)
                    ];
                    itemData.push(temp);                            
                }
            })
            var chartItem = {
                name: col.name,
                data: itemData
            }
            series.push(chartItem);
        })

        Highcharts.chart('chart'+table.id, {
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
                labels: {
                    format: '{value: %Y%m%d}'
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
    }

    function clarrifySubCols(table,subtables){
        var tempSubTbs = _.filter(subtables, function(num){ return num.tid == table.id; });
        var sbtbnames = _.uniq(_.pluck(tempSubTbs, 'name'));
        var finalsubtables = [];
        sbtbnames.forEach(function(sbtbname){
            var subtableItem = {
                'name': sbtbname,
                'columns': []
            }
            tempSubTbs.forEach(function(subtable){
                if(subtable.name === sbtbname){
                    subtableItem.columns.push(subtable)
                }
            });
            finalsubtables.push(subtableItem);
        });
        return finalsubtables;
    }

    function subCharts(tables,sourcedata,subtabs){
        // tables:[{id:4,uid:1,tablename:'Stock'}]
        // sourcedata:[{cid:"20",ctime:"1528515614",dataId:"974",tid:"4",mclass:"Stock",name:"Stock Value",notes:null,tablename:"Stock",time:"1516147200",uid:"1",value:"35903.5300"}]

        tables.forEach(function(table){
            var tableSourceData = [];
            var tableDates = null;
            var tableColumns = [];
            var subTableData = [];
            var subtables = clarrifySubCols(table,subtabs);

            //get table data;
            sourcedata.forEach(function(sditem){
                if(sditem.tid === table.id){
                    tableSourceData.push(sditem);
                }
            });

            //get table dates;
            var tempDates = [];
            var columnsTemp = [];
            tableSourceData.forEach(function(sditem){
                tempDates.push(parseFloat(sditem.time) * 1000);
                var sditemColumn = {
                    cid: sditem.cid,
                    name: sditem.name
                }
                columnsTemp.push(sditemColumn);
            });
            tableDates = _.uniq(tempDates).sort();

            //get columns;
            columnsTemp.forEach(function(tempColItem){
                var foundCol = _.find(tableColumns, function(col){ return col.cid === tempColItem.cid; })
                if(!foundCol){
                    tableColumns.push(tempColItem);
                }
            });

            //arrange data for subtable
            tableDates.forEach(function(dateItem){
                var subTableItem = {
                    date: dateItem
                }
                tableSourceData.forEach(function(sdItem){
                    if(parseFloat(sdItem.time) * 1000 === dateItem){
                        subTableItem[sdItem.cid] = sdItem.value;
                    }
                });
                subTableData.push(subTableItem);
            });

            //calculate sub table data
            subtables.forEach(function(subtable, subtableIx){
                subtable.chartData = [];
                subtable.columns.forEach(function(subCol){
                    var tempdata = [];
                    subTableData.forEach(function(subDataItem){
                        var calc = subCol.calculation.replace(/(\[[0-9]+\])/g,"subDataItem$1");
                        var calculatedVal = eval(calc);
                        if(!isNaN(calculatedVal)){
                            tempdata.push([subDataItem.date, calculatedVal]);
                        };
                    })
                    subtable.chartData.push({
                        name: subCol.subTbColName,
                        data: tempdata
                    })
                })
                

                $('.for_sub_chart').append('<div id="subtable'+subtableIx+'"></div>');
                var chart1 = Highcharts.chart('subtable'+subtableIx, {
                    chart: {
                        type: 'spline'
                    },
                    title: {
                        text: subtable.name
                    },
                    subtitle: {
                        text: null
                    },
                    xAxis: {
                        title: {
                            text: null
                        },
                        type: "datetime",
                        labels: {
                            format: '{value: %Y%m%d}'
                        }
                    },
                    yAxis: {
                        title: {
                            text: null
                        }
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
                    series: subtable.chartData
                });
            });
        })
    }    
});