$(function() {   	
    $("#subTableInsert").submit(function(e){
        var data = {
            'tid':$('#parentTableId').val(),
            'name':$('#tableName').val()             
        }
        $.ajax({
            url:$("#subTableInsert").attr("action"),
            type:'post',
            data:data,
            success:function(result){
                if(result.status){
                    alert("Insert successfully!");
                    window.location.href=$("#subTableIndex").val(); 
                }else{
                    alert(result.errMsg);
                }
            }
        })               
    });
});