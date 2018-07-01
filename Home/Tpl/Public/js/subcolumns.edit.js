$(function() {  

    $("#subTableId").change(function(e){
        e.stopPropagation();
        var selected=$(this).children('option:selected').val();
        $("#calculation").val('');
        getColumn(selected)       
    });

    var idfirst = $('#subTableId').val();
    getColumn(idfirst);
    function getColumn(idval){
        $.ajax({
            url:$("#getColumn").val(),
            type:'post',
            data:{id:idval},
            success:function(result){
                $(".columns").html('');
                result.forEach(function(val){
                    var col = "<li><span class='cid'>id:"+val.id+"</span><span class='cname'>name:"+val.name+"</span></li>";
                    $(".columns").append(col);
                })
            }
        })        
    }

    $("#updateSubcolumns").submit(function(e){
        var data = {
            'stid':$('#subTableId').val(),
            'subtbcolname':$('#subColName').val(),
            'calculation':$('#calculation').val(),
            'unit':$('#unit').val(),
            'id':$('#subtbColId').val()             
        }
        $.ajax({
            url:$("#updateSubcolumns").attr("action"),
            type:'post',
            data:data,
            success:function(result){
                if(result.status){
                    alert("Update successfully!");
                    window.location.href=$("#subColumnIndex").val(); 
                }else{
                    alert(result.errMsg);
                }
            }
        })               
    });
});