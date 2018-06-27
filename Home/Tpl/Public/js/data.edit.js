$(function() {      
    $("#updateDataForm").submit(function(e){
        var data = {
            'id':$("#data_id").val(),
            'notes':$('#remarks').val(),
            'value':$('#iptVal').val(),
            'ctime': Date.parse(new Date())/1000            
        }

        $.ajax({
            url:$("#updateDataForm").attr("action"),
            type:'post',
            data:data,
            success:function(result){
                if(result.status){
                    alert("Update successfully!")
                    window.location.href=$("#data_index").val(); 
                }else{
                    alert(result.errMsg);
                }
            }
        })              
    });
});