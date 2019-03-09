function showButton(){
    showsubject = $("showsubject").html();
    showsection = $("showsection").html();
    console.log(showsubject);
    console.log(showsection);
    var url = "../admin/service/records/show.button.admin.php";  
  
    $.post(url,{
        showsubject : showsubject,
        showsection : showsection
        
        },function(data){
    var data = JSON.parse(data);

        //console.log(data);

        if(data['alert'] == 0){
            test = "No further classes";
            $("#alertpower").html(test);
        }
        else{
        num1 = 1;
        num2 = 2;
        num3 = 3;
        num4 = 4;
        num5 = 5;
        num6 = 6;
        num7 = 7;
        num8 = 8;
        num9 = 9;
        $("#num1").html(num1);   
        $("#num2").html(num2);
        $("#num3").html(num3);
        $("#num4").html(num4);
        $("#num5").html(num5);
        $("#num6").html(num6);
        $("#num7").html(num7);
        $("#num8").html(num8);
        $("#num9").html(num9);

        $("#g1").html(data['button1']);
        $("#g2").html(data['button2']);
        $("#g3").html(data['button3']);
        $("#g4").html(data['button4']);
        $("#g5").html(data['button5']);
        $("#g6").html(data['button6']);
        $("#g7").html(data['button7']);
        $("#g8").html(data['button8']);
        $("#g9").html(data['button9']);
        }
    });      
   }

// function showbutton(subject,section){
//     console.group("show details respone");
//     console.log(subject);
//     console.log(section);
//     console.groupEnd();
//     var url = "../admin/service/records/show.detail.admin.php";  
//     $.post(url,{
//         subject : subject,
//         section : section
    
    
//        });

// }