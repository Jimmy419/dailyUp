$(function() {   	

    //dropdown:select table
    $('body').on('click','.a_dropdown .a_dropdown_value',function(e){
        e.stopPropagation();
        $(e.target).closest('.a_dropdown').toggleClass('a_open');
    });

    $('body').click(function(){
        $(".a_dropdown").removeClass('a_open');
    });

    $('body').on('click','.a_dropdown .a_dropdown_list',function(e){
        e.stopPropagation();
        $(e.target).closest('.a_dropdown').toggleClass('a_open');
        $.ajax({
            url:$("#setSesstionTb").val(),
            type:'get',
            data:{
                'id': $(e.target).attr('tid')
            },
            success:function(result){
                if(result.status){
                    window.location.href=$("#indexIndex").val();
                }
            }
        })
    });


    //logout
    $(".logout").click(function(){
        $.ajax({
            url:$("#logoutLink").val(),
            type:'get',
            success:function(result){
                if(result.status){
                    alert("You have logged out!");
                    window.location.href=$("#loginLink").val(); 
                }else{
                    alert("Logout failed!");
                }
            }
        })              
    })
});