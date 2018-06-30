$(function() {   	

    $("#tableUpdate").submit(function(e){
        var data = {
            'tablename':$('#tableName').val(),
            'id':$('#tableId').val()             
        }
        $.ajax({
            url:$("#tableUpdate").attr("action"),
            type:'post',
            data:data,
            success:function(result){
                if(result.status){
                    alert("Update successfully!");
                    window.location.href=$("#tableIndex").val(); 
                }else{
                    alert(result.errMsg);
                }
            }
        })               
    });
});