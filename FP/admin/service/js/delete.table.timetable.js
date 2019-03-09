function deleteAjax1(id){
    var subject2 = $("#subject2").html();
    var section2 = $("#section2").html();
    console.log(subject2);
    console.log(section2);
    console.log(id);
       if(confirm('Are you sure?')){
         
         $.ajax({
              type:'post',
              url:'../admin/service/records/delete.timetable.php',
              data:{delete_id:id,subject2 : subject2,section2 : section2},
              success:function(data){
              
                   $('#delete'+id ).hide('slow');
              }
         });
       }
     }