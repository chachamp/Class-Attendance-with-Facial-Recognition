$(document).ready(function(){  
    $('#upload_csv').on("submit", function(e){  
         e.preventDefault(); //form will not submitted  
         $.ajax({  
              url:"../FP/admin/service/records/import.student.name.php",  
              method:"POST",  
              data:new FormData(this),  
              contentType:false,          // The content type used when sending data to the server.  
              cache:false,                // To unable request pages to be cached  
              processData:false,          // To send DOMDocument or non processed data file it is set to false
         },function(data){  
          var data = JSON.parse(data);
          console.log(data);
                   if(data=='Error1')  
                   {  
                        alert("Invalid File");  
                   }  
                   else if(data == "Error2")  
                   {  
                        alert("Please Select File");  
                   }  
                   else  
                   {  
                        $('#employee_table').html(data);
                        alert("Upload table success")  
                   }  
              });  
         });
     });  
 