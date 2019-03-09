
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);


function drawChart() {

  subject = $("select[name = 'txtsubject']").val();
  section = $("select[name = 'txtsection']").val();

  //console.log(subject);
  //console.log(section);
  var resultlate = 0;
  var resultontime = 0;
  var resultouttime=0;
  var resultsubjectname=0;

  var url = "../admin/service/sql/chart.subject.sql.php";
  $.post(url,{
    subject : subject,
    section : section
  },function(res){
    var res = JSON.parse(res);
   
   resultlate = res['late'];
   resultontime = res['ontime'];
   resultouttime = res['outtime'];
   resultsubjectname = res['subjectname'];

   
   console.log(res);
  data_draw(resultontime,resultlate,resultouttime,resultsubjectname);
  
 
 


  });
}

function data_draw(resultontime,resultlate,resultouttime,resultsubjectname){
 



  var data = google.visualization.arrayToDataTable([
    ['Task', 'Hours per Day'],
    ['Ontime', resultontime],
    ['Late', resultlate],
    ['Outtime',resultouttime]
    ]);

    var options = {'title': resultsubjectname, 
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
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}