function deleteAjax(id){
     var subject1 = $("#subject1").html();
     var section1 = $("#section1").html();
     console.log(subject1);
     console.log(section1);
        if(confirm('Are you sure?')){
          
          $.ajax({
               type:'post',
               url:'../admin/service/records/delete.php',
               data:{delete_id:id,subject1 : subject1,section1 : section1},
               success:function(data){
               
                    $('#delete'+id ).hide('slow');
               }
          });
        }
      }