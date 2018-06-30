$(function() {   	

    $("#updateMap").submit(function(e){
        var data = {
            'tid':$('#tableId').val(),
            'cid':$('#colId').val(),
            'id':$('#mapId').val()             
        }
        $.ajax({
            url:$("#updateMap").attr("action"),
            type:'post',
            data:data,
            success:function(result){
                if(result.status){
                    alert("Update successfully!");
                    window.location.href=$("#mapIndex").val(); 
                }else{
                    alert(result.errMsg);
                }
            }
        })               
    });
});