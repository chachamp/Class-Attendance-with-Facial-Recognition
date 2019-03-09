function powerquery(){
    
        usertea = $("#user_tea").html();
        console.log(usertea);
        var url = "../admin/service/records/show.detail.power.php";  
       
       
        $.post(url,{
            usertea : usertea
        },function(data){
             
            var data = JSON.parse(data);
            console.log(data);
            console.log(data['buttong2']);
            $('#g2').html(data['buttong2']);
           
        });      
       
}