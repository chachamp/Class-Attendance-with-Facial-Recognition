
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);


function drawChartstudent() {
  var width = window.innerWidth
  || document.documentElement.clientWidth
  || document.body.clientWidth;
  


  var diff_width = width - 20;
 
  if(diff_width > 560){
    diff_width_convert = 550;

    font_title = 20;
    font_legend = 16;
    test = "ok";
    console.log(test);
  }
  else{
    diff_width_convert = diff_width;
    font_title = 14;
    font_legend = 12;
    console.log("No ok");  
    console.log(diff_width_convert);
  }

  
  subject = $("select[name = 'txtchart']").val();
  annpost = $("#annp").html();

  console.log(subject);
  console.log(annpost);
  var resultlate_stu = 0;
  var resultontime_stu = 0;
  var resultouttime_stu=0;
  var resultsubjectname_stu=0;

  var url = "../user/service/sql/chart.stu.php";
  $.post(url,{
    subject : subject,
    annpost : annpost
  },function(res_stu){
    var res_stu = JSON.parse(res_stu);
   
   resultlate_stu = res_stu['late'];
   resultontime_stu = res_stu['ontime'];
   resultouttime_stu = res_stu['outtime'];
   resultsubjectname_stu = res_stu['subjectname'];

   
   console.log(res_stu);
   data_draw_student(resultontime_stu,resultlate_stu,resultouttime_stu,resultsubjectname_stu,diff_width_convert,font_title,font_legend);
  
 
 


  });
}

function data_draw_student(resultontime_stu,resultlate_stu,resultouttime_stu,resultsubjectname_stu,diff_width_convert1,font_title1,font_legend1){
  console.log(diff_width_convert1);
  console.log(font_title1);
  console.log(font_legend1);
  



  var data = google.visualization.arrayToDataTable([
    ['Task', 'Hours per Day'],
    ['Ontime', resultontime_stu],
    ['Late', resultlate_stu],
    ['Outtime',resultouttime_stu]
    ]);

    var options = {'title': "Subject: " + resultsubjectname_stu, 
    'width':diff_width_convert1, 
    'height':400,
    'backgroundColor':'transparent',
    'fontName':'roboto',
    'legend':{textStyle: {color: '#ffffff',fontName:'roboto', fontSize: font_legend1}},
    'titleTextStyle':{color: '#ffffff',fontName:'roboto', fontSize: font_title1},
    pieHole: 0.4,
    pieSliceBorderColor:'transparent'
  };

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}