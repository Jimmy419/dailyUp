$(function() {   	

    $("#tableInsert").submit(function(e){
        var data = {
            'tablename':$('#tableName').val()             
        }
        $.ajax({
            url:$("#tableInsert").attr("action"),
            type:'post',
            data:data,
            success:function(result){
                if(result.status){
                    alert("Insert successfully!");
                    window.location.href=$("#tableIndex").val(); 
                }else{
                    alert(result.errMsg);
                }
            }
        })               
    });
});