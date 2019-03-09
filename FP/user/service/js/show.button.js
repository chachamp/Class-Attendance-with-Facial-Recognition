
   function showbutton(){
    setTimeout(function(){ 
    walktime = $("#showwalktime").html(); 
    status_sw =  $("#controlstatussw").html();
    console.log(walktime);
    console.log(status_sw);

    check_controlsubject = $("controlsubject").html();
    check_controlsection = $("controlsection").html();
    check_controlwalktime = $("#showwalktime").html();
    check_controlgroup = $("controlgroup").html();
    check_controlstatussw = $("controlstatussw").html();
    console.group("CHECK FROM HTML AT CHECKNONE.JS");
    console.log(check_controlsubject);
    console.log(check_controlsection);
    console.log(check_controlwalktime);
    console.log(check_controlgroup);
    console.log(check_controlstatussw);
    console.groupEnd(); 
    
    var url = "../user/service/records/show.button.php";  
    
    $.post(url,{
        walktime : walktime,
        status_sw : status_sw,
        check_controlsubject : check_controlsubject,
        check_controlsection : check_controlsection,
        check_controlwalktime : check_controlwalktime,
        check_controlgroup : check_controlgroup,
        check_controlstatussw : check_controlstatussw
    },function(data){
        var data = JSON.parse(data);
            console.log(data['value']);
            console.log(data['button']);
            console.group("CHECK FROM HTML AT CHECKNONE.php");
            console.log(data['c1']);
            console.log(data['c2']);
            console.log(data['c3']);
            console.log(data['c4']);
            console.log(data['c5']);
            console.groupEnd(); 
        var test = data['value'];
        var test1 = data['button'];
        var c1_res = data['c1'];
        var c2_res = data['c2'];
        var c3_res = data['c3'];
        var c4_res = data['c4'];
        var c5_res = data['c5'];
        showbuttoncase(test,test1,c1_res,c2_res,c3_res,c4_res,c5_res);
    });      
          }, 500);
   }
  
   function showbuttoncase(testvalue,testvalue1,c1_req,c2_req,c3_req,c4_req,c5_req)
   {
    setTimeout(function(){ 
    console.group("CHECK FROM HTML AT CHECKNONE.php Convert ");
    console.log(c1_req);
    console.log(c2_req);
    console.log(c3_req);
    console.log(c4_req);
    console.log(c5_req);
    console.groupEnd();
    if(c1_req == 2 && c2_req == 3 && c3_req == 4 && c4_req == 5 && c5_req == 6){
        var val = "No further classes";
        document.getElementById("showbut").innerHTML = val;  
    }
    else if(testvalue == 0 && testvalue1 == 0){
        // var val = "Please check your status";
        // document.getElementById("showbut").innerHTML = val;
        alert("Please check your status");
    } 
    
    else{
        var val = testvalue1;
        document.getElementById("showbut").innerHTML = val; 
    }   
   
}, 500);
   }