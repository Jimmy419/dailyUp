$(function() {
    var dataArr = [];
    var upFile = document.getElementById('upfile');
    var rABS = true;
    function handleFile(e) {
        var files = e.target.files, f = files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            var data = e.target.result;
            if(!rABS) data = new Uint8Array(data);
            var workbook = XLSX.read(data, {type: rABS ? 'binary' : 'array'});

            /* DO SOMETHING WITH workbook HERE */
            // console.log(workbook);
            var obj = workbook.Sheets.Sheet1;
            var reg = /\d+$/;
            var dataLength = workbook.Sheets.Sheet1['!ref'].match(reg)[0];
            for (var i=1;i<dataLength;i++)
            {
                var time1 = obj['A'+(i+1)].v + '';
                var time1 = time1.replace(/^(\d{4})(\d{2})(\d{2})$/,"$1-$2-$3")
                var time = Date.parse(new Date(time1))/1000;
                var ijson = {
                    'value': obj['B'+(i+1)].v,
                    'time': time
                };
                dataArr.push(ijson);                
            }
        };
        if(rABS) reader.readAsBinaryString(f); else reader.readAsArrayBuffer(f);
    }
    upFile.addEventListener('change', handleFile, false);

    $("#multiDataForm").submit(function(e){
        dataArr.forEach(function(value){
            value.uid = $('#userId').val();
            value.cid = $('#colVal').val();
            value.ctime = Date.parse(new Date())/1000;
        });
        var postData = {
            cid: $('#colVal').val(),
            data:dataArr
        }
        $.ajax({
            url:$('#uploadLink').val(),
            type:'post',
            data:postData,
            success:function(result){
                if(result.status){
                    alert("Insert successfully!")
                }else{
                    alert(result.errMsg);
                }
            }
        })              
    });
});