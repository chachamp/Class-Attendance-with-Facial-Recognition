function deleteAjax2(id,comment){
    var subject3 = $("#subject3").html();
    var section3 = $("#section3").html();
    
    console.log(subject3);
    console.log(section3);
    console.log(id);
    console.log(comment);
  
       if(confirm('Are you sure?')){
         
         $.ajax({
              type:'post',
              url:'../admin/service/records/delete.result.annoucement.php',
              data:{delete_id:id,
                subject3 : subject3,
               section3 : section3,
               comment : comment
            },
              success:function(data){
              
                   $('#delete'+id+comment ).hide('slow');
              }
         });
       }
     }