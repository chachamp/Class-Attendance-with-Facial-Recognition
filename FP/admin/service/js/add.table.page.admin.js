function Add_data(){
     stuidadd = $("#stuidadd").val();
     stunameadd = $("#stunameadd").val();
     stugroupadd = $("#stugroupadd").val();
     subjectadd = $("#subject1").html();
     sectionadd = $("#section1").html();
     var url = "../admin/service/records/add.php";  
     console.log(subjectadd);
     console.log(sectionadd);
     $.post(url,{
       stuidadd : stuidadd,
       stunameadd : stunameadd,
       stugroupadd : stugroupadd,
       subjectadd : subjectadd,
       sectionadd : sectionadd
     },function(data){
         var data = JSON.parse(data);

         console.log(data);
         if(data['alert'] == 1){
         $("tbody").html(data['tbody']);
         alert('Add Complete');
         }else{
         alert('Add Failed');
         }
     });      
    }