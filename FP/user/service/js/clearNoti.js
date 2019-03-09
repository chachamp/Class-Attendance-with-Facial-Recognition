
function clearDataNoti(){
  setTimeout(function(){ 
    stuname = $("#annp").html();
    clear_key = 0;
    console.log(clear_key);
    var url = "../user/service/records/clearNoti.php";  
    $.post(url,{
        clear_key : clear_key,
        stuname : stuname
     },function(data){
        var data = JSON.parse(data);

        console.log(data['alert']);

        if(data['alert'] == 1){
            
            $(".badge_number").html("");
              var defaultTxt = $("title").text();
            defaultTxt = defaultTxt.split("(");
             $("title").text(defaultTxt[0]);
        }
        
    
       
      

    });    
  },1000);  
   }