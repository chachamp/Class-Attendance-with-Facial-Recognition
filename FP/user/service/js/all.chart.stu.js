
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);


function drawChart() {
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

  

  annpost = $("#annp").html();

  console.log(annpost);
  //console.log(section);
  var resultalllate_stu = 0;
  var resultallontime_stu = 0;
  var resultallouttime_stu=0;
 

  var url = "../user/service/sql/allchart.stu.php";
  $.post(url,{
    annpost : annpost
  },function(res_stu){
    var res_stu = JSON.parse(res_stu);
   
    resultalllate_stu = res_stu['alllate_stu'];
    resultallontime_stu = res_stu['allontime_stu'];
    resultallouttime_stu = res_stu['allouttime_stu'];
  

   
   console.log(res_stu);
   data_draw_studentallsubject(resultallontime_stu,resultalllate_stu,resultallouttime_stu,diff_width_convert,font_title,font_legend);
  
 
 


  });
}

function data_draw_studentallsubject(resultallontime_stu,resultalllate_stu,resultallouttime_stu,diff_width_convert1,font_title1,font_legend1){
 

  console.log(resultallontime_stu);
  console.log(resultalllate_stu);
  console.log(resultallouttime_stu);
  console.log(diff_width_convert1);
  console.log(font_title1);
  console.log(font_legend1);
  

  var data = google.visualization.arrayToDataTable([
    ['Task', 'Hours per Day'],
    ['Ontime', resultallontime_stu],
    ['Late', resultalllate_stu],
    ['Outtime',resultallouttime_stu]
    ]);

    var options = {'title': 'All Subject', 
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
  var chart = new google.visualization.PieChart(document.getElementById('Allpiechart'));
  chart.draw(data, options);
}
