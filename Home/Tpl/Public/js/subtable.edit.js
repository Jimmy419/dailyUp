$(function() {   	
    $("#updateSubtable").submit(function(e){
        var data = {
            'tid':$('#tableId').val(),
            'name':$('#tableName').val(),
            'id':$('#subtbId').val()             
        }
        $.ajax({
            url:$("#updateSubtable").attr("action"),
            type:'post',
            data:data,
            success:function(result){
                if(result.status){
                    alert("Update successfully!");
                    window.location.href=$("#subtableIndex").val(); 
                }else{
                    alert(result.errMsg);
                }
            }
        })               
    });
});