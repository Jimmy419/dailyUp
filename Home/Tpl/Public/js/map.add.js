$(function() {   	

    $("#mapInsert").submit(function(e){
        var data = {
            'tid':$('#tableId').val(),
            'cid':$('#columnId').val()             
        }
        $.ajax({
            url:$("#mapInsert").attr("action"),
            type:'post',
            data:data,
            success:function(result){
                if(result.status){
                    alert("Insert successfully!");
                    window.location.href=$("#mapIndex").val(); 
                }else{
                    alert(result.errMsg);
                }
            }
        })               
    });
});