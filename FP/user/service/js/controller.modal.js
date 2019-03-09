function controller(){
    
    usernamestu = $("#annp").html();
    
   // console.log(usernamestu);
    var url = "../user/service/sql/controller.modal.php";  
    
    $.post(url,{
        usernamestu : usernamestu
    },function(data){
        var data = JSON.parse(data);


        
        console.log(data['subject']);
        console.log(data['section']);
       
        console.log(data['numgroup']);
        console.log(data['statussw']); 

        $("controlsubject").html(data['subject']);
        $("controlsection").html(data['section']);
      
        $("controlgroup").html(data['numgroup']);
        $("controlstatussw").html(data['statussw']);

    });      
   }