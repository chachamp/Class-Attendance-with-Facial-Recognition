function controllerwalktime(){
    
    usernamestu = $("#annp").html();
    
   console.log(usernamestu);
    var url = "../user/service/sql/controller.modal.walktime.php";  
    
    $.post(url,{
        usernamestu : usernamestu
    },function(data){
        var data = JSON.parse(data);

        console.log(data); 
        showwalktime(data['walktime']);
        // $("controlwalktime").html(data['walktime']);
       
    });      
   }



      function showwalktime(show)
   {
  
       console.log(show);
    
    switch(show){
      
        default:
            val = show;
            
    }
    document.getElementById("showwalktime").innerHTML = val;
   }