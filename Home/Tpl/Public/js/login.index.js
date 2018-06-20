$(function() {
    $("#loginForm").submit(function(e){
        $.ajax({
            url:$("#login_check").val(),
            type:'POST',
            data:{'name': $("#loginName").val(),'password':$('#loginPass').val(), 'fcode':$('#verifyCode').val()},
            success:function(result){
                if(result.status){
                    window.location.href=$("#login_index").val(); 
                }else{
                    alert(result.errMsg);
                }
            }
        })
    });
});