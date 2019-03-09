function ShowAnn(){
    subject = $("select[name = 'txtann']").val();
    annpost = $("#annp").html();
    console.log(subject);
    console.log(annpost);
    var url = "../user/service/records/showann.php";  
    
    $.post(url,{
        subject : subject,
        annpost : annpost
    },function(data){
        var data = JSON.parse(data);

        console.log(data);

        $("#announ").html(data['tbody']);

    });      
   }