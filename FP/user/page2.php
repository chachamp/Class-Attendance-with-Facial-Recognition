<?php
session_start();
include("../../FP/main.service/config/connect.db.service.php");
require("../../FP/user/service/auth/gateway.service.php");
include("../../FP/user/service/sql/select.ann.user.php");

?>

<!DOCTYPE html>
<html>
  <link rel="icon" href="../image/logo.png">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Class Attendance</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/page2user.css">
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="../../FP/user/service/js/chart.stu.js"></script>
  <script type="text/javascript" src="../../FP/user/service/js/all.chart.stu.js"></script>
  <script type="text/javascript" src="../../FP/user/service/js/nav.into.js"></script>
  <script src="../../FP/user/service/js/ann.js"></script>
  <script src="../../FP/user/service/js/table.stu.js"></script>
  <script src="../../FP/user/service/js/button.control.js"></script>
  <script src="../../FP/user/service/js/select.group.js"></script>
  <script src="../../FP/user/service/js/controller.modal.js"></script>
  <script src="../../FP/user/service/js/controller.modal.walktime.js"></script>
  <script src="../../FP/user/service/js/show.button.js"></script>
  <script src="../../FP/user/service/js/clearNoti.js"></script>
  <script src="../../FP/user/service/js/notiaction.js"></script>
  <script src="../../FP/user/service/js/notibox.js"></script>

  <script type="text/javascript" src="../../FP/user/service/js/NotificationAjax.js"></script>
  <!-- <script  type="text/javascript" src="../../FP/user/service/js/check.none.js"></script> -->
  <link rel="stylesheet" href=".../css/page2user.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  -->
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>




<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" onload="controller(); controllerwalktime(); sendNotification(); ">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                    
      </button>
      
      <a class="navbar-brand" href="#myPage">
        <img src = ../image/logo.png>
      </a>
      
      <a  href="#bellnoti" onclick=" bellaction();"  class ="notimobile">
      <i class="material-icons" style="color:#d5d5d5;margin-top:12px;margin-right:100px;align:right;">notifications 
      </i>
      <div class="badge badge_number_mobile"></div>
       </a>
     
      
    </div>

    
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav navbar-right">
        <li><a  href="#Announcement">ANNOUNCEMENT</a></li>
        <li><a  href="#statistic">STATISTIC</a></li>
        <li><a  href="#class_history">CLASS HISTORY</a></li>
        <li class = "bellnotification"><a  href="#bellnoti" onclick="notiBox(); bellaction();  clearDataNoti();" id="bellnotification"><i style="font-size:24px; margin-top:-16%;display:block;"class="material-icons">notifications</i>
        <div class="badge badge_number"></div></a></li>
        

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <span class="glyphicon glyphicon-user"></span>
           <c id="annp" name="annp" style="text-transform: uppercase;"><?php echo $_SESSION["username_stu"]; ?></c>
            <span class="caret"></span>
          </a>
            
          <ul class="dropdown-menu">
            <li><a href=#profile data-toggle="modal" data-target="#profile">Profile</a></li>
            <li><a href=#edit data-toggle="modal" data-target="#edit">Edit password</a></li>
            <li><a href="../../FP/user/service/auth/logout.service.php">Logout</a></li>
          </ul>
        </li>
        
      </ul>
    </div>
  </div>
</nav>


<!-- Container (The Announcement Section) -->
<div id="Announcement" class="container">
  
    <div id="bellnoti" class="bellnoti">
    <div style="font-size:18px;" class="notihead">Notification </div>
      <div id="notinoti"class="innoti">
     
      </div>
    </div>

    <center><h3>Announcement</h3></center>
    <div class="anno">
    <select name="txtann" id="txtann"  class="select" onchange = "ShowAnn()" >
    <option value=""disabled selected> Choose subject </option>
          <?php  
              while($row = mysqli_fetch_array($objQuery2))  
              {  
          ?>    
              <option name="txtann" id="txtann" style="color:black;"
               value="<?php echo $row["sub_name"]; ?>">
              <?php echo $row["sub_name"]; ?>
              </option>  
          
          <?php
              }
          ?>      

        </select>

      

</div>
</div>


<div id="announ"></div>
<br>
<br>
<br>

<!-- Container (TOUR Section) -->
<div id="statistic">
  <div class="container2 bg-1">
    <h3 class="text-center">Statistic</h3>
    <div class="container3">
   
      
          <div id="Allpiechart"></div>
      
          
         <!-- All Chart -->
          <select name="txtchart" id="txtchart"  class="select" onchange = "drawChartstudent()" >
          <option value=""disabled selected> Choose subject </option>
          <?php  
              while($row1 = mysqli_fetch_array($objQuery3))  
              {  
          ?>    
              <option name="txtchart" id="txtchart" style="color:black;"
               value="<?php echo $row1["sub_name"]; ?>">
              <?php echo $row1["sub_name"]; ?>
              </option>  
          
          <?php
              }
          ?>      
          
       
        
        </select>
          
          <center><div id="piechart"  class="chart"></div><center>
          
          

        
        
    </div>
  </div> 
</div>

<div id="class_history" class=container>
  <h3><center>
    Class history
    </center>
  </h3>
  <div class="container">
         
          <select name="txttable" id="txttable"  class="select" style="display:inline;" onchange = "TableShow()" >
          <option value=""disabled selected> Choose subject </option>
          <?php  
              while($row2 = mysqli_fetch_array($objQuery4))  
              {  
          ?>    
              <option name="txttable" id="txttable" style="color:black;"
               value="<?php echo $row2["sub_name"]; ?>">
              <?php echo $row2["sub_name"]; ?>
              </option>  
          
          <?php
              }
          ?>      
          
       
        
        </select>
         

          <table class="table table-bordered testtable">  
                       <thead>
                          <tr>  
                            
                               <th width="25%" ><center>Subject</center></th>  
                               <th width="25%"><center>Date</center></th>
                               <th width="25%"><center>Time</center></th>       
                               <th width="25%"><center>Status</center></th> 
                               
                          </tr>
                        </thead>
                        <tbody>  

                        </tbody> 
                         
                     </table> 
                 
    
  </div>
</div>



<div class="modal fade " id="bellnoti" role="dialog">
    <br><br><br>
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content text-center">
      
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <br>
          <center><h5 style="font-size:26px;">Edit password</h5></center>
    	<form action="../user/service/records/edit.password.user.php" method="post" >
			<br>
			<fieldset>
		
				<p><input type="password" class = "password" placeholder="Old password" id="txtpasswordold" name="txtpasswordold" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
        
        <p><input type="password" class = "password" placeholder="New password" id="txtpasswordnew" name="txtpasswordnew" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
        
        <p><input type="password" class = "password" placeholder="re-type New password" id="txtpasswordconnew" name="txtpasswordconnew" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required></p>
  	
				<center><p><input type="submit" class = "submit" value="EDIT"></p></center> 

		</fieldset>
    </form>
    <br>
        
        <br><br>
          <div class="footer2">
          <button type="button" class="closebtn" data-dismiss="modal">Close</button>
          </div>
      </div>
      
    </div>
  </div>


<!--Edit password-->
<div class="modal fade " id="edit" role="dialog">
    <br><br><br>
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content text-center">
      
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <br>
          <center><h5 style="font-size:26px;">Edit password</h5></center>
    	<form action="../user/service/records/edit.password.user.php" method="post" >
			<br>
			<fieldset>
		
				<p><input type="password" class = "password" placeholder="Old password" id="txtpasswordold" name="txtpasswordold" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
        
        <p><input type="password" class = "password" placeholder="New password" id="txtpasswordnew" name="txtpasswordnew" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
        
        <p><input type="password" class = "password" placeholder="re-type New password" id="txtpasswordconnew" name="txtpasswordconnew" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required></p>
  	
				<center><p><input type="submit" class = "submit" value="EDIT"></p></center> 

		</fieldset>
    </form>
    <br>
        
        <br><br>
          <div class="footer2">
          <button type="button" class="closebtn" data-dismiss="modal">Close</button>
          </div>
      </div>
      
    </div>
  </div>


  <!--profile-->
<div class="modal fade " id="profile" role="dialog">
    <br><br><br>
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content text-center">
          <br>
          <center><h5 style="font-size:26px;">Profile</h5></center>
        
			<br>
			<fieldset>
        <center><table width="65%" >
        <tr height="30">
          <th width="40%" class="profile" style="text-align:right;">Name :&nbsp</th>
          <th width="60%"><?php echo $objResult5["stu_name"]; ?></th>
        </tr>
      
        <tr height="50">
          <th class="profile" style="text-align:right;">Student ID :&nbsp</th>
            <th id="stuidgroup"><?php  echo $objResult5["stu_id"]; ?></th>
          </tr>
        <tr height="50" style="border-top:solid;border-top-width:1px;border-top-color:linear-gradient(to right, #3ab5b0 0%, #3d99be 31%, #56317a 100%);">  
          <th colspan="2" style="padding-right:25%;"> 
        <center>
        <select name="txtgroup" id="txtgroup"  class="select" onchange = "Selectgroup()">
          <option value=""disabled selected> Choose subject </option>
          <?php  
              while($row6 = mysqli_fetch_array($objQuery6))  
              {  
          ?>    
              <option name="txtgroup" id="txtgroup" style="color:black;"
               value="<?php echo $row6["sub_name"]; ?>">
              <?php echo $row6["sub_name"]; ?>
              </option>  
          
          <?php
              }
          ?>  
            </center>
            </th>   
          </tr>  
        <tr height="30"> 
          <th class="profile" style="text-align:right;">Group :&nbsp</th>
          <th><d> - <d></th>
        </tr>

        </table></center>


		</fieldset>
    
    <br>
        
    <br><br>
          <div class="footer2">
          <button type="button" class="closebtn" data-dismiss="modal">Close</button>
          </div>
      </div>




    </div>
  </div>


 

 <style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  
  width: 100%;

  color: white;
  text-align: right;
}

button.circle { 

  width: 65px; /* ความกว้าง */
  height: 65px; /* ความสูง */
  -moz-border-radius: 70px; 
  -webkit-border-radius: 70px; 
  
  border-radius: 70px;
  outline: 0px;
  
  
  }



</style>



<div class="footer">
  <button class="circle" id="butmol" onclick="showbutton();" data-toggle="modal" data-target="#buttoning" >
  <i class="material-icons" style="font-size:36px; color:black; padding-top: 10%;">settings</i>
  <!-- <i class="fa fa-plus " style="font-size:36px; color:black; padding-top: 22%;"></i>  -->

</button>
 
</div>

 <!--profile-->
 <div class="modal fade " id="buttoning" role="dialog">
    <br><br><br>
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content text-center">
          <br>
          <center><h2>Controller</h2></center>

			<br>
			<fieldset>
        <center><table width="50%">
        <tr>
          <th class="profile" style="text-align:left;">Subject : <controlsubject>None</controlsubject> </th>
     
        </tr>
        <tr>
          <th class="profile" style="text-align:left;">Section : <controlsection>None</controlsection> </th>
  
        </tr>
        <tr>
          <th class="profile"  style="text-align:left;">Walk time : <controlwalktime id="controlwalktime">
          <div id="showwalktime" style="display:inline;"></div></controlwalktime> 
          </th>
     
        </tr>
        <tr>
          <th class="profile" style="text-align:left;">Group : <controlgroup>None</controlgroup> </th>

        </tr>
        <tr>
          <th class="profile" style="text-align:left;">Status swtich : <controlstatussw id="controlstatussw">None</controlstatussw> </th>

        </tr>

        </table></center>
        <br>  
        <div id="showbut" class = "showbut" onclick="buttoncontrol()"></div>
 <!-- <button name="buttonvalue" id="buttonvalue" onclick="buttoncontrol()" value="Off" >Click</button> -->
 <!-- <input name="buttonvalue" id="buttonvalue" onclick="buttoncontrol()" type="button" value="ON"> -->
		</fieldset>
    
    <br>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></form>
        </div>
      </div>




    </div>
  </div>





  
  

</body>
</html>