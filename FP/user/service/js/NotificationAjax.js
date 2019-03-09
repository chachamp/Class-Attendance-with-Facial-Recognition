 setInterval(sendNotification, 3000);


function sendNotification(){
    
    annpost = $("#annp").html();

    console.log(annpost);
    var url = "../user/service/records/NotificationAjax.php";  
    $.post(url,{
        annpost : annpost
    },function(obj){
    
        var obj = JSON.parse(obj);
       console.log(obj.badge_number);
      
       var test = obj.badge_number;
       
        if(test == 0){
            
         
        }
        else{

        $(".badge_number").text(obj.badge_number);
           var defaultTxt = $("title").text();
             defaultTxt = defaultTxt.split("(");
             $("title").text(defaultTxt[0]+" ("+obj.badge_number+")");
        }
      
     

    }); 
   
}

