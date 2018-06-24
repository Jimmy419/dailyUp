$(function() {   	

    //dropdown
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


});