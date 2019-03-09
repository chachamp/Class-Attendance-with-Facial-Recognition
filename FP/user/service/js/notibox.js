function notiBox(){
    annpost = $("#annp").html();
    console.group("NOTIBOX");
    console.log(annpost);
    console.groupEnd();
    var url = "../user/service/records/detailnoti.php";  
    
    $.post(url,{
        annpost : annpost
    }
    ,function(data){
        var data = JSON.parse(data);

        console.log(data);
        $("#notinoti").html(data['notibox']);
     
        if(data['notibox'] == ""){
            $("#notinoti").html("No message");
        }

    });      
   }