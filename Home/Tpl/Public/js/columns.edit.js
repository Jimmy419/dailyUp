$(function() {      
    $("#updateColumns").submit(function(e){
        var data = {
            'id':$('#colId').val(),
            'mclass':$('#colMclass').val(),
            'name':$('#colName').val(),         
        }

        $.ajax({
            url:$("#updateColumns").attr("action"),
            type:'post',
            data:data,
            success:function(result){
                if(result.status){
                    alert("Update successfully!")
                    window.location.href=$("#columnIndex").val(); 
                }else{
                    alert(result.errMsg);
                }
            }
        })              
    });
});