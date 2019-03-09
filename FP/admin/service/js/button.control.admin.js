function buttonControlAdmin1(){
  setTimeout(function(){ 
    status_sw_1 = $("input[name = 'g1']").val();
    var url = "../admin/service/button/button.control.admin.1.php";  
    $.post(url,{
        status_sw_1 : status_sw_1
     },function(data){
     var data = JSON.parse(data); 
    console.group("Button1");
    console.log(data['button1']);
    console.groupEnd();
        if(data['alert'] == 10){
        $("#g1").html(data['button1']);}
      if(data['alert'] == 11){
        $("#g1").html(data['button1']);}
        });}, 300);}

function buttonControlAdmin2(){
            setTimeout(function(){ 
              status_sw_2 = $("input[name = 'g2']").val();
              var url = "../admin/service/button/button.control.admin.2.php";  
              $.post(url,{
                  status_sw_2 : status_sw_2
               },function(data){
               var data = JSON.parse(data); 
              console.group("Button2");
              console.log(data['button2']);
              console.groupEnd();
                  if(data['alert'] == 20){
                  $("#g2").html(data['button2']);}
                if(data['alert'] == 21){
                  $("#g2").html(data['button2']);}
                  });}, 300);}
function buttonControlAdmin3(){
                    setTimeout(function(){ 
                      status_sw_3 = $("input[name = 'g3']").val();
                      var url = "../admin/service/button/button.control.admin.3.php";  
                      $.post(url,{
                          status_sw_3 : status_sw_3
                       },function(data){
                       var data = JSON.parse(data); 
                      console.group("Button3");
                      console.log(data['button3']);
                      console.groupEnd();
                          if(data['alert'] == 30){
                          $("#g3").html(data['button3']);}
                        if(data['alert'] == 31){
                          $("#g3").html(data['button3']);}
                          });}, 300);}
function buttonControlAdmin4(){
                            setTimeout(function(){ 
                              status_sw_4 = $("input[name = 'g4']").val();
                              var url = "../admin/service/button/button.control.admin.4.php";  
                              $.post(url,{
                                  status_sw_4 : status_sw_4
                               },function(data){
                               var data = JSON.parse(data); 
                              console.group("Button4");
                              console.log(data['button4']);
                              console.groupEnd();
                                  if(data['alert'] == 40){
                                  $("#g4").html(data['button4']);}
                                if(data['alert'] == 41){
                                  $("#g4").html(data['button4']);}
                                  });}, 300);}
function buttonControlAdmin5(){
                                    setTimeout(function(){ 
                                      status_sw_5 = $("input[name = 'g5']").val();
                                      var url = "../admin/service/button/button.control.admin.5.php";  
                                      $.post(url,{
                                          status_sw_5 : status_sw_5
                                       },function(data){
                                       var data = JSON.parse(data); 
                                      console.group("Button5");
                                      console.log(data['button5']);
                                      console.groupEnd();
                                          if(data['alert'] == 50){
                                          $("#g5").html(data['button5']);}
                                        if(data['alert'] == 51){
                                          $("#g5").html(data['button5']);}
                                          });}, 300);}
function buttonControlAdmin6(){
                                            setTimeout(function(){ 
                                              status_sw_6 = $("input[name = 'g6']").val();
                                              var url = "../admin/service/button/button.control.admin.6.php";  
                                              $.post(url,{
                                                status_sw_6 : status_sw_6
                                               },function(data){
                                               var data = JSON.parse(data); 
                                              console.group("Button6");
                                              console.log(data['button6']);
                                              console.groupEnd();
                                                  if(data['alert'] == 60){
                                                  $("#g6").html(data['button6']);}
                                                if(data['alert'] == 61){
                                                  $("#g6").html(data['button6']);}
                                                  });}, 300);}
function buttonControlAdmin7(){
                                                    setTimeout(function(){ 
                                                      status_sw_7 = $("input[name = 'g7']").val();
                                                      var url = "../admin/service/button/button.control.admin.7.php";  
                                                      $.post(url,{
                                                        status_sw_7 : status_sw_7
                                                       },function(data){
                                                       var data = JSON.parse(data); 
                                                      console.group("Button7");
                                                      console.log(data['button7']);
                                                      console.groupEnd();
                                                          if(data['alert'] == 70){
                                                          $("#g7").html(data['button7']);}
                                                        if(data['alert'] == 71){
                                                          $("#g7").html(data['button7']);}
                                                          });}, 300);}
function buttonControlAdmin8(){
                                                            setTimeout(function(){ 
                                                              status_sw_8 = $("input[name = 'g8']").val();
                                                              var url = "../admin/service/button/button.control.admin.8.php";  
                                                              $.post(url,{
                                                                status_sw_8 : status_sw_8
                                                               },function(data){
                                                               var data = JSON.parse(data); 
                                                              console.group("Button8");
                                                              console.log(data['button8']);
                                                              console.groupEnd();
                                                                  if(data['alert'] == 80){
                                                                  $("#g8").html(data['button8']);}
                                                                if(data['alert'] == 81){
                                                                  $("#g8").html(data['button8']);}
                                                                  });}, 300);}
function buttonControlAdmin9(){
                                                                    setTimeout(function(){ 
                                                                      status_sw_9 = $("input[name = 'g9']").val();
                                                                      var url = "../admin/service/button/button.control.admin.9.php";  
                                                                      $.post(url,{
                                                                        status_sw_9 : status_sw_9
                                                                       },function(data){
                                                                       var data = JSON.parse(data); 
                                                                      console.group("Button9");
                                                                      console.log(data['button9']);
                                                                      console.groupEnd();
                                                                          if(data['alert'] == 90){
                                                                          $("#g9").html(data['button9']);}
                                                                        if(data['alert'] == 91){
                                                                          $("#g9").html(data['button9']);}
                                                                          });}, 300);}
