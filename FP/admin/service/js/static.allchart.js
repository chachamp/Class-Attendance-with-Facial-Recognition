
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);


function drawChart() {

  var usernametea = $("#user_tea").html();


  //console.log(section);
  var resultalllate = 0;
  var resultallontime = 0;
  var resultallouttime=0;
 

  var url = "../admin/service/sql/chart.all.subject.sql.php";
  $.post(url,{
    username_tea : usernametea
  },function(res){
    var res = JSON.parse(res);
   
    resultalllate = res['alllate'];
    resultallontime = res['allontime'];
    resultallouttime = res['allouttime'];
  
  
   
   
  data_draw1(resultallontime,resultalllate,resultallouttime);
  
 
 


  });
}

function data_draw1(resultallontime,resultalllate,resultallouttime){
 

 
 
  // console.log(resultallontime);
  // console.log(resultalllate);
  // console.log(resultallouttime);

  var data1 = google.visualization.arrayToDataTable([
    ['Task', 'Hours per Day'],
    ['Ontime', resultallontime],
    ['Late', resultalllate],
    ['Outtime',resultallouttime]
    ]);

    var options = {'title': 'All Subject', 
    'width':550, 
    'height':400,
    'backgroundColor':'transparent',
    'fontName':'roboto',
    'legend':{textStyle: {color: '#2d2d30',fontName:'roboto', fontSize: 16}},
    'titleTextStyle':{color: '#2d2d30',fontName:'roboto', fontSize: 20},
    pieHole: 0.4,
    pieSliceBorderColor:'transparent'
  };

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('Allpiechart'));
  chart.draw(data1, options);
}
