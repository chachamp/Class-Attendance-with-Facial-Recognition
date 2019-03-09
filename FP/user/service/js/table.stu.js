function TableShow(){
    subject = $("select[name = 'txttable']").val();
    annpost = $("#annp").html();
    console.log(subject);
    console.log(annpost);
    var url = "../user/service/records/tableshow.php";  
    
    $.post(url,{
        subject : subject,
        annpost : annpost
    },function(data){
        var data = JSON.parse(data);

        console.log(data);

        $("tbody").html(data['tbody']);

    });      
   }