$(function(){
	$(".delteSubTb").click(function(e){
		if(window.confirm('Are you sure of deleting this item?')){
	        $.ajax({
	            url:$(e.target).attr('link'),
	            type:'get',
	            success:function(result){
	                if(result.status){
	                    alert("Item deleted!");
	                    window.location.href=$("#subTableIndex").val(); 
	                }else{
	                    alert(result.errMsg);
	                }
	            }
	        })
        }
	})
})