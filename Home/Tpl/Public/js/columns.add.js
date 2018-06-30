$(function() {   	

    $("#columnInsert").submit(function(e){
        var data = {
            'mclass':$('#colMclass').val(),
            'name':$('#colName').val()             
        }
        $.ajax({
            url:$("#columnInsert").attr("action"),
            type:'post',
            data:data,
            success:function(result){
                if(result.status){
                    alert("Insert successfully!");
                    window.location.href=$("#columnIndex").val(); 
                }else{
                    alert(result.errMsg);
                }
            }
        })               
    });
});