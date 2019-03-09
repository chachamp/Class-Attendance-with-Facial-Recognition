function Selectgroup(){
    txtgroup = $("select[name = 'txtgroup']").val();
    txtstuid = $("#stuidgroup").html();
    console.log(txtgroup);
    console.log(txtstuid);
   
    var url = "../user/service/sql/select.group.php";  
    
    $.post(url,{
        txtgroup : txtgroup,
        txtstuid : txtstuid
      
    },function(data){
        var data = JSON.parse(data);

        console.log(data);

       $("d").html(data['stuidgroup']);

    });      
   }