function buttoncontrol(){
  setTimeout(function(){ 
    status_sw = $("#controlstatussw").html();
    //buttoncontrol2 = $("input[name = 'buttonvalue']").val();
    group = $("controlgroup").html();
    stuid = $("#stuidgroup").html();
    console.log(status_sw);
    console.log(group);
    console.log(stuid);
   
    var url = "../user/service/records/button.control.php";  
    
    $.post(url,{
        status_sw : status_sw,
        group : group,
        stuid : stuid
    },function(data){
      var data = JSON.parse(data);

   // document.getElementById("g1").value = swvalue;
      console.log(data['button']);
      if(data['alert'] == 0){

        $("#controlstatussw").html(data['valueoff']);
        $("#showbut").html(data['button']);
       //alert('NOW, OFF');
       //document.getElementById("controlstatussw").value = "Off";
        }
      else if(data['alert'] == 1){
        $("#controlstatussw").html(data['valueon']);
        $("#showbut").html(data['button']);
        //document.getElementById("controlstatussw").value = "On";
        //$("tbody").html(data['tbody']);
       // alert('NOW, ON');
        }
     // $("#announ").html(data['tbody']);

  });
    
    

  }, 300);  
   }

   /*function myFunction() {
    document.getElementById("demo").innerHTML = "Hello World";
  }*/