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

    $("#addDataForm").submit(function(e){
        var time = Date.parse(new Date($('#dtp_input2').val()))/1000;
        var data = {
            'cid':$('#colVal').val(),
            'notes':$('#remarks').val(),
            'value':$('#iptVal').val(),
            'time':time,
            'ctime': Date.parse(new Date())/1000             
        }
        $.ajax({
            url:$("#addDataForm").attr("action"),
            type:'post',
            data:data,
            success:function(result){
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