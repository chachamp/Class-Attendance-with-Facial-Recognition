<?php
session_start();

include("../main.service/config/connect.db.service.php");
include("../../FP/user/service/auth/gateway.schedule.php");
date_default_timezone_set("Asia/Bangkok");
$current_date = date("Y-m-d"); 
$current_time = date("H:i") . "\n";


$sqlTimer = "SELECT date,time_start,sub_name FROM subject WHERE gid = '".$_SESSION["txtcodeclass"]."' 
AND date = '".$current_date."'"; 
$sqlTimerQuery = mysqli_query($objCon,$sqlTimer);
$sqlTimerResult = mysqli_fetch_array($sqlTimerQuery);




$date_start1= $sqlTimerResult["time_start"];//time_start -30 นาที
$date_end1=date("H:i",strtotime($date_start1."-30 minute"));


$temp ="";
$temp .= $sqlTimerResult["date"];
$temp .= "T";
$temp .= $date_end1;
$temp .= ":00.0000000";
$temp .= "+07:00";


//echo $date_end2;

//$date = Date("Y-m-d\TH:i:s");


?>


<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  margin: 0;
}

.bgimg {
  background-image: url('../image/intro-bg.jpg');
  height: 100%;
  background-position: center;
  background-size: cover;
  position: relative;
  color: white;
  font-family: 'Roboto', sans-serif;
  font-size: 25px;
}


.middle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

hr {
  margin: auto;
  width: 40%;
}

.sub{
  background-image: linear-gradient(120deg, #89f7fe 0%, #66a6ff 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

img{
  width: 80px;
  height: 80px;
  margin-top:12%;
}

</style>
<body>

<div class="bgimg">
  
  <div class="middle">
    <center><img src = ../image/logo.png></center>
    <h1 id="subject" style="text-transform:uppercase;">Subject <div class = "sub"><?php echo $sqlTimerResult["sub_name"]; ?> </div></h1>
    <hr>
    <p id="demo" style="font-size:30px"></p>
  </div>
 
</div>



<script>
  function getITtime(date){

    console.log(date);
 
// Set the date we're counting down to
var countDownDate = new Date(date).getTime(); 

console.log(countDownDate);
// Update the count down every 1 second
var countdownfunction = setInterval(function() {
 
  // Get todays date and time
  var now = new Date().getTime();
     // console.log(now); 
  // Find the distance between now an the count down date
  var distance = (countDownDate - now);
  
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
  
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(countdownfunction);
    document.getElementById("demo").innerHTML = "TIME OUT";
    sendtopage("<?php echo $_SESSION["txtcodeclass"]; ?>");
   
  }
}, 1000);
  }
  getITtime("<?php echo $temp?>");
</script>

<script>
function sendtopage(txtcodeclass)
{
  console.log(txtcodeclass);

  $.ajax({
               type:'post',
               url:'../user/schedule.php',
               data:{txtcodeclass:txtcodeclass},
               success:function(data){
               
                window.location="../user/schedule.php";
               }
          });
 // $_SESSION["txtcodeclass"] = txtcodeclass;
  //window.location="../user/schedule.php";

}
     
  </script>



</body>
</html>
