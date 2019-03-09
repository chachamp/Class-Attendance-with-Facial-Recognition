function sectionchart(){
    subject = $("select[name = 'txtsubject']").val();
    usernametea = $("#user_tea").html();
    var url = "../admin/service/records/section/section.chart.php";  
    console.log(subject);
    console.log(usernametea);
   
    $.post(url,{
        subject : subject,
        usernametea : usernametea
     
    },function(data){
        var data = JSON.parse(data); 
        console.log(data['optionsection']);
       // $("sectionchart").html(data['optionsection']);
       document.getElementById("sectionchart").innerHTML = data['optionsection'];  
      
       
    });      
   }
   function sectionchart1(){
    subject1 = $("select[name = 'txtsubjectpicktime']").val();
    usernametea = $("#user_tea").html();
    var url = "../admin/service/records/section/section.picktime.php";  
    console.log(subject1);
    console.log(usernametea);
   
    $.post(url,{
        subject1 : subject1,
        usernametea : usernametea
     
    },function(data){
        var data = JSON.parse(data); 
        console.log(data['optionsection']);
       // $("sectionchart").html(data['optionsection']);
       document.getElementById("sectionchart1").innerHTML = data['optionsection'];  
      
       
    });      
   }
   function sectionchart2(){
    subject2 = $("select[name = 'txtsubject2']").val();
    usernametea = $("#user_tea").html();
    var url = "../admin/service/records/section/section.student.into.php";  
    console.log(subject2);
    console.log(usernametea);
   
    $.post(url,{
        subject2 : subject2,
        usernametea : usernametea
     
    },function(data){
        var data = JSON.parse(data); 
        console.log(data['optionsection']);
       // $("sectionchart").html(data['optionsection']);
       document.getElementById("sectionchart2").innerHTML = data['optionsection'];  
      
       
    });      
   }

   function sectionchart3(){
    subject3 = $("select[name = 'txtsubjectadddel']").val();
    usernametea = $("#user_tea").html();
    var url = "../admin/service/records/section/section.add.del.php";  
    console.log(subject3);
    console.log(usernametea);
   
    $.post(url,{
        subject3 : subject3,
        usernametea : usernametea
     
    },function(data){
        var data = JSON.parse(data); 
        console.log(data['optionsection']);
       // $("sectionchart").html(data['optionsection']);
       document.getElementById("sectionchart3").innerHTML = data['optionsection'];  
      
       
    });      
   }

   function sectionchart4(){
    subject4 = $("select[name = 'txtsubjectann']").val();
    usernametea = $("#user_tea").html();
    var url = "../admin/service/records/section/section.ann.php";  
    console.log(subject4);
    console.log(usernametea);
   
    $.post(url,{
        subject4 : subject4,
        usernametea : usernametea
     
    },function(data){
        var data = JSON.parse(data); 
        console.log(data['optionsection']);
       // $("sectionchart").html(data['optionsection']);
       document.getElementById("sectionchart4").innerHTML = data['optionsection'];  
      
       
    });      
   }
   
   function sectionchart5(){
    subject5 = $("select[name = 'txtsubjecttimetable']").val();
    usernametea = $("#user_tea").html();
    var url = "../admin/service/records/section/section.timetable.php";  
    console.log(subject5);
    console.log(usernametea);
   
    $.post(url,{
        subject5 : subject5,
        usernametea : usernametea
     
    },function(data){
        var data = JSON.parse(data); 
        console.log(data['optionsection']);
       // $("sectionchart").html(data['optionsection']);
       document.getElementById("sectionchart5").innerHTML = data['optionsection'];  
      
       
    });      
   }

   function sectionchart6(){
    subject6 = $("select[name = 'txtsubjectpost']").val();
    usernametea = $("#user_tea").html();
    var url = "../admin/service/records/section/section.post.php";  
    console.log(subject6);
    console.log(usernametea);
   
    $.post(url,{
        subject6 : subject6,
        usernametea : usernametea
     
    },function(data){
        var data = JSON.parse(data); 
        console.log(data['optionsection']);
       // $("sectionchart").html(data['optionsection']);
       document.getElementById("sectionchart6").innerHTML = data['optionsection'];  
      
       
    });      
   }