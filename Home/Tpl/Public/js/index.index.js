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
            var table = result.table;
            var subtabs = result.subtbs;
            var subtbcols = result.subcolumns;
            drawCharts(table,columns,data);
            subCharts(subtabs,subtbcols,data);
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
                type: 'spline',
                zoomType: 'x'
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

    function subCharts(subtables,subtablecols,sourcedata){

        //get table dates;
        var tableDates = null;
        var tempDates = [];
        sourcedata.forEach(function(sditem){
            tempDates.push(parseFloat(sditem.time) * 1000);
        });
        tableDates = _.uniq(tempDates).sort();

        //clarrify soucedata
        var dataForCalc = [];
        tableDates.forEach(function(dateItem){
            var subTableItem = {
                date: dateItem
            }
            sourcedata.forEach(function(sditem){
                if(parseFloat(sditem.time) * 1000 === dateItem){
                    subTableItem[sditem.cid] = sditem.value;
                }
            });
            dataForCalc.push(subTableItem);
        });

        subtables.forEach(function(subtable){
            subtable.data = [];
            subtablecols.forEach(function(subtablecol){
                if(subtablecol.stid == subtable.id){
                    var tempdata = {
                        "name": subtablecol.subtbcolname,
                        "data": []
                    };
                    dataForCalc.forEach(function(calcitem){
                        var calc = subtablecol.calculation.replace(/(\[[0-9]+\])/g,"calcitem$1");
                        var calculatedVal = eval(calc);
                        var dataforchart = [
                            calcitem.date,
                            calculatedVal
                        ];
                        if(!isNaN(calculatedVal)){
                            tempdata.data.push(dataforchart);
                        }
                    });
                    subtable.data.push(tempdata);
                }
            })

            $('.chart-box').append('<div class="col-sm-6" id="subtable'+subtable.id+'"></div>');
            Highcharts.chart('subtable'+subtable.id, {
                chart: {
                    type: 'spline',
                    zoomType: 'x'
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
                series: subtable.data
            });
        })
    }    
});