$(function() {   	
    $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });

    // function fmtDate(obj){
    //     var date =  new Date(obj);
    //     var y = 1900+date.getYear();
    //     var m = "0"+(date.getMonth()+1);
    //     var d = "0"+date.getDate();
    //     return y+"-"+m.substring(m.length-2,m.length)+"-"+d.substring(d.length-2,d.length);
    // }

    $("#addDataForm").submit(function(e){
        // var time = new Date($('#dtp_input2').val()).getTime()/1000;
        var time = Date.parse(new Date($('#dtp_input2').val()))/1000;
        var data = {
            'cid':$('#colVal').val(),
            'notes':$('#remarks').val(),
            'value':$('#iptVal').val(),
            'time':time,
            'ctime': Date.parse(new Date())/1000             
        }
        console.log(data);
        $.ajax({
            url:$("#addDataForm").attr("action"),
            type:'post',
            data:data,
            success:function(result){
                // console.log(result);
                if(result.status){
                    alert("Insert successfully!")
                    window.location.href=$('#data_index').val(); 
                }else{
                    alert(result.errMsg);
                }
            }
        })              
    });
});