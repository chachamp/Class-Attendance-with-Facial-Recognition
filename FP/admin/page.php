<?php
session_start();
include("../../FP/admin/service/auth/gateway.service.php");
include("../../FP/main.service/config/connect.db.service.php");
include("../../FP/admin/service/sql/page.sql.php");
include("../../FP/admin/service/guid/create.guid.php");

?>
<!DOCTYPE html>
<html>
<link rel="icon" href="../image/logo.png">
<head>

<title>Class Attendance</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../FP/admin/service/js/open.close.nav.page.admin.js"></script>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../../FP/css/pageadmin.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="../../FP/admin/service/js/static.allchart.js"></script>
<script type="text/javascript" src="../../FP/admin/service/js/static.selfchart.js"></script>
<script type="text/javascript" src="../../FP/admin/service/js/show.detail.admin.js"></script>
<script type="text/javascript" src="../../FP/admin/service/js/show.button.admin.js"></script>
<script type="text/javascript" src="../../FP/admin/service/js/button.control.admin.js"></script>
<script type="text/javascript" src="../../FP/admin/service/js/section/section.chart.js"></script>
<script src="../../FP/admin/service/js/time.convert.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>


<!--Navber Controller-->
<body data-spy="scroll" data-target=".navbar" data-offset="50" onload="showDetail()">

<nav class="navbar navbar-default navbar-fixed-top">
 <div class=" container-fluid">
      <div class="navbar-header">
          <span  class="hamberger"  onclick="openNav()">&#x2630; </span>
          <a style="text-decoration:none" class="logo" > <img src = ../image/logo.png></a>
      </div>
  
  <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav navbar-right">
     <div class="dropdown">
         <div class="drop">
            <li class="drop">
              <a style="text-decoration:none"data-target="#login">
              <span class="glyphicon glyphicon-user usernametea"></span> <a style="text-decoration:none;text-transform: uppercase;" id ="user_tea"><?php echo $_SESSION['username_tea'];?></a></a>
            </li>
        
          <div class="dropdown-content">
            <button href="#editpassword" data-toggle="modal" data-target="#editpassword">Edit </button>
            <br><hr class="drop-content">
            <button onclick="window.location.href='../../FP/admin/service/auth/logout.service.php'">Logout</button>
          </div>
          </div>
     </div>
    </ul>
  </div>
  </div>
</nav>


<!--Sidenav Controller-->
  <div id="mySidenav" class="sidenav nav navbar-nav " style="width:300px; ">
    <div class="dropdown test-side-chachamp">
      <div class="dropbtn test-side-chachamp">
        <li>
          <a class="test-side-chachamp message " style="text-transform: uppercase;" href="#"><span class="glyphicon glyphicon-user"> </span><?php echo $_SESSION['username_tea'];?></a>
          <br>
        </li>
      </div>
        <div class="dropdown-content">
          <a href="#editpassword" data-toggle="modal" data-target="#editpassword">Edit </a>
          <a href="../../FP/admin/service/auth/logout.service.php">Logout</a>
        </div>
      <hr>
    </div>

          <font ><p class="message">Classes</p></font>
          <hr>    
          <font class="message1" align="left">Add Subject: <y href="#addclass"  data-toggle="modal" data-target="#addclass"><x align="center" ><input type="submit" value="Add"></x></y></font>
          <br><br>
          <font ><p class="message"  >Management</p></font>
          <hr>
          <font class="message1" align="left">Set time : <y href="#picktime" class="components" data-toggle="modal" data-target="#picktime"><x align="center" ><input class="components" type="submit" value="Set"></x></y></font>
          <br><br>
          <font class="message1" align="left">Add Student : <y href="#addstu" data-toggle="modal" data-target="#addstu"><x align="center" ><input type="submit"  value="Add"></x></y></font>
          <br><br>
          <font class="message1" align="left">Manage Class : <y href="#edittable" data-toggle="modal" data-target="#edittable"><x align="center" ><input type="submit"  value="Add"></x></y></font>
          <br><br>
          <font ><p class="message">Static</p></font>
          <hr>
    
<!-- Boxlist Subject Name -->
          <font class="message1" align="left">Subject :</font> 
          <select name="txtsubject" id="txtsubject" class="boxlist" style="background-color:#fcfcfc" onchange = "drawChart(); sectionchart()" >  
          <option value="" disabled selected> Please fill in subject name </option>
          
          <?php  
              while($row = mysqli_fetch_array($objQuery8))  
              {  
          ?>    
              <option value="<?php echo $row["sub_name"]; ?>"  >
                 <?php echo $row["sub_name"]; ?></option>  
          
          <?php
              }
          ?>      
       
          </select>
          <br><br>

          
<!-- Boxlist Section -->
          <div id="sectionchart"></div>
          <br><br>
         
          <font ><p class="message">Results </p></font>
          <hr>
          <font class="message1" align="left">Announcement : <y href="#resultsano" data-toggle="modal" data-target="#resultsano"><x align="center" ><input type="submit" value="Choose"></x></y></font>
          <br><br>
          <font class="message1" align="left">Timetable : <y href="#timetable" data-toggle="modal" data-target="#timetable"><x align="center" ><input type="submit" value="Choose"></x></y></font>
          <br><br>

          <font ><p class="message">Classroom control</p></font>
          <hr>
          <font class="message1" align="left">Power : <y href="#power" data-toggle="modal" data-target="#power"><x align="center" ><input type="submit" onclick="showButton()" value="Choose"></x></y></font>
          <br><br><br><br><br><br><br>
        
         
  </div>

       


<!--Edit password -->
<div class="modal fade " id="editpassword" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content text-left">
      <br>
      <div class="login">
        <center><h3> Edit Password</h3></center>
        <form action="../../FP/admin/service/records/edit.password.php" method="post">
          <fieldset>
          
            <br>
            <font class="message2"  align="left"> Username :<b><font color="red"> <?php echo $_SESSION['username_tea']; ?></font></b></font>
            <br><br>
            <font class="message2" align="left">  Old Password : </font>
            <br>
            <input type="password" placeholder="Input Old-Password"  name="oldpass" id="oldpass"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <br><br>
            <font class="message2" align="left"> Password : </font>
            <br>
            <input type="password" placeholder="Input New-Password"  name="newpass" id="newpass"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <br><br>
            <font class="message2" align="left"> Confirm Password : </font>
            <br>
            <input type="password" placeholder="Input Comfirm-Password"  name="connewpass" id="connewpass"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <br><br>
          
        
            <center><input type="submit" value="Add"></center>
      
            <br><br>
          <div class="footer2">
          <button type="button" class="closebtn" data-dismiss="modal">Close</button>
          </div>
          </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
 

<!--Add subject -->
<div class="modal fade " id="addclass" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content text-left">
      <br>
      <div class="login">
        <center><h3>Add Subject</h3></center>
        <form action="../../FP/admin/service/records/save.add.subject.php" method="post">
          <fieldset>
            <font class="message2"  align="left"><b> Subject Name</b></font>
            <br>
            <font class="submessage"  align="left"><b> Ex. <font color="red">Project</font></b></font>
            <br>
            <p><input type="text"  placeholder="Input Subject Name" name="txtsubjectaddadmin" id="txtsubjectaddadmin" required></p> 
            <font class="message2" align="left"><b> Section </b></font>
            <br>
            <font class="submessage"  align="left"><b>  Ex.<font color="red"> 1</font></b></font>
            <br>
            <p><input type="text" placeholder="Input Section Number"  name="txtsectionaddadmin" id="txtsectionaddadmin"required ></p>
            <font class="message2" align="left"><b> Class Code  </b></font> 
            <br>
            <font class="submessage"  align="left"><b> Ex.<font color="red"> 902168123</font> </b></font>
            <br>
            <p><input type="text" placeholder="Input Class Code " name="txtclasscodeaddadmin" id="txtclasscodeaddadmin" required></p>
            <br>
            <center><p><input type="submit" value="Add"></p></center>
          </fieldset>
          <br><br>
          <div class="footer2">
          <button type="button" class="closebtn" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
 
<!--Add Teach Time -->
<div class="modal fade " id="picktime" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content text-left">
      <div class="login switchtime">
        
        <center><h3>Teaching Time</h3></center>
        <form action="../../FP/admin/service/records/save.add.class.php" method="post">
<!-- Boxlist Subject Name -->
          <font class="message2" align="left">Subject :</font> 
          <select name="txtsubjectpicktime" id="txtsubjectpicktime" class="boxlist" style="background-color:#fcfcfc" onchange="sectionchart1()" >  
          <option value="" disabled selected> Please fill in subject name </option>
         
          <?php  
              while($row = mysqli_fetch_array($objQuery1))  
              {  
          ?>    
              <option value="<?php echo $row["sub_name"]; ?>"  >
                 <?php echo $row["sub_name"]; ?></option>  
          
          <?php
              }
          ?>      
       
          </select>
          <br>

          
<!-- Boxlist Section -->
         <div id="sectionchart1"></div>
          <br>

          <fieldset>

<!-- Date -->
  <font class="message2" id ="text_time" align="left"><b> Date</b></font> 
  <br>
  <font class="submessage" id ="text_time1" align="left"><b> Ex.<font color="red">30-01-2019</font> </b></font>
  <br>
  <input type="date" class="demo" name="dateInput" id="dateInput" min="2019-03-09" onchange="timeConvert();" required> 
<!-- Time Start -->
  <br><br>
  <font class="message2"id ="text_time2" align="left"><b> Start time </b></font> 
  <br>
  <font class="submessage" id ="text_time3" align="left"><b> Ex.<font color="red">09:00 AM </font> </b></font>
  <br>
  <input type="time" name="timeStartInput" id="timeStartInput" min="02:00" max="04:00" required/>
<!-- Time End -->
  <br><br>
  <font class="message2"id ="text_time4" align="left"><b> End time </b></font> 
  <br>
  <font class="submessage"id ="text_time5"  align="left"><b> Ex.<font color="red">12:00 PM </font> </b></font>
  <br>
  <input type="time" name="timeEndInput" id="timeEndInput"  min="02:00" max="04:00" required/>
  <br><br>
<!-- Time Late -->
  <font class="message2"id ="text_time6" align="left"><b> Late time </b></font> 
  <br>
  <font class="submessage"id ="text_time7"  align="left"><b> Ex.<font color="red">09:30 AM </font> </b></font>
  <br>
  <input type="time" name="timeLateInput" id="timeLateInput"  min="02:00" max="04:00" required/>
  <br><br>
  <center><p><input type="submit" value="Create" id="addtimer" ></p></center>
       
          </fieldset>
          <br><br>
          <div class="footer2">
          <button type="button" class="closebtn" data-dismiss="modal">Close</button>
          </div>
          </form>
      </div>      
          
    </div>
  </div>
</div>

  
<!--Add student-->
<div class="modal fade " id="addstu" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content text-left"><br>
       <div class="login">
          <center><h4>Add Student Into Subject</h4></center>
<form action="../../FP/admin/service/records/import.student.name.php" method="post" enctype="multipart/form-data">
                  <fieldset>
<!-- Boxlist Subject Name -->
<font class="message2" align="left">Subject :</font> 
<select name="txtsubject2" id="txtsubject2" class="boxlist" style="background-color:#fcfcfc" onchange="sectionchart2()" > 
<option value="" disabled selected> Please fill in subject name </option>
          
    <?php  
      while($row = mysqli_fetch_array($objQuery3))  
      {  
    ?>    
        <option name="txtsubject2" id="txtsubject2" value="<?php echo $row["sub_name"]; ?>"  >
        <?php echo $row["sub_name"]; ?></option>  
    <?php
      }
    ?>      
</select>
<br>

<!-- Boxlist Section -->
<div id="sectionchart2"></div>
<br>

<font class="message2" align="left">Number of student per group :</font> 
<input type="text" name="numbergp" id="numbergp" style="width:10%; margin-left:5%; "  required/>
<br>
<!--Upload Zone-->   
<font class="message2 " align="left">Upload file</font>
<br>
<font class="submessage" align="left" style="font-size:12px;display:inline;"> - Colume A is Student Number <br> - Colume B is Student Name  </font>
<br>
<font class="message2" align="left">Example file : <a style="text-decoration:none;font-size:16px;color:#80bfff;" href="../file/Example.csv">Excel.CSV</a> </font>
<input type="file" name="employee_file" style="margin-top:15px;" />  
<br><br>
<center><input type="submit" name="upload" id="upload" value="Upload" style="margin-top:10px;" class="btn btn-info" /></center>  
<div style="clear:both"></div>
</fieldset>
<br><br>
          <div class="footer2">
          <button type="button" class="closebtn" data-dismiss="modal">Close</button>
          </div>
</form>
     
    </div>      

    </div>
    </div>
  </div>


<!--Add Delete table -->

<div class="modal fade " id="edittable" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content text-left">
      <br>
      <div class="login">
        <center><h3>Choose Class</h3></center>
        <form action="../../FP/admin/service/records/check.add.delete.php" method="post">
          <fieldset>
<!-- Boxlist Subject Name -->
<font class="message2" align="left">Subject :</font> 
          <select name="txtsubjectadddel" id="txtsubjectadddel" class="boxlist" style="background-color:#fcfcfc" onchange="sectionchart3()" >
          <option value="" disabled selected> Please fill in subject name </option>
     
          <?php  
              while($row = mysqli_fetch_array($objQuery6))  
              {  
          ?>    
              <option value="<?php echo $row["sub_name"]; ?>"  >
                 <?php echo $row["sub_name"]; ?></option>  
          
          <?php
            $_SESSION["txtsubject"] = $row["sub_name"];

              }
          ?>      
       
          </select>
          <br>

          
<!-- Boxlist Section -->
     <div id="sectionchart3"></div>
          <br><br>
            <center><p><input type="submit" value="Next"></p></center>
          </fieldset>
          <br><br>
          <div class="footer2">
          <button type="button" class="closebtn" data-dismiss="modal">Close</button>
          </div>
          </form>
        

          
      </div>
    </div>
  </div>
</div>
 

<!--Results Annoucement-->

<div class="modal fade " id="resultsano" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content text-left">
      <br>
      <div class="login">
        <center><h3>Choose Class</h3></center>
        <form action="../../FP/admin/service/records/check.announcement.php" method="post">
          <fieldset>
<!-- Boxlist Subject Name -->
<font class="message2" align="left">Subject :</font> 
          <select name="txtsubjectann" id="txtsubjectann" class="boxlist" style="background-color:#fcfcfc" onchange="sectionchart4()" >
          <option value="" disabled selected> Please fill in subject name </option>
     
          <?php  
              while($row = mysqli_fetch_array($objQuery12))  
              {  
          ?>    
              <option value="<?php echo $row["sub_name"]; ?>"  >
                 <?php echo $row["sub_name"]; ?></option>  
          
          <?php
            $_SESSION["txtsubject"] = $row["sub_name"];

              }
          ?>      
       
          </select>
          <br>

          
<!-- Boxlist Section -->
          <div id="sectionchart4"></div>
          <br><br>
            <center><p><input type="submit" value="Next"></p></center>
          </fieldset>
          <br><br>
          <div class="footer2">
          <button type="button" class="closebtn" data-dismiss="modal">Close</button>
          </div>
          </form>
        

          
      </div>
    </div>
  </div>
</div>



<!--timetable -->

<div class="modal fade " id="timetable" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content text-left">
      <br>
      <div class="login">
        <center><h3>Choose Class</h3></center>
        <form action="../../FP/admin/service/records/check.timetable.php" method="post">
          <fieldset>
<!-- Boxlist Subject Name -->
<font class="message2" align="left">Subject :</font> 
          <select name="txtsubjecttimetable" id="txtsubjecttimetable" class="boxlist" style="background-color:#fcfcfc" onchange="sectionchart5()" >
          <option value="" disabled selected> Please fill in subject name </option>
     
          <?php  
              while($row = mysqli_fetch_array($objQuery14))  
              {  
          ?>    
              <option value="<?php echo $row["sub_name"]; ?>"  >
                 <?php echo $row["sub_name"]; ?></option>  
          
          <?php
            $_SESSION["txtsubject"] = $row["sub_name"];

              }
          ?>      
       
          </select>
          <br>

          
<!-- Boxlist Section -->
        <div id="sectionchart5"></div>

          <br><br>
            <center><p><input type="submit" value="Next"></p></center>
          </fieldset>
          <br><br>
          <div class="footer2">
          <button type="button" class="closebtn" data-dismiss="modal">Close</button>
          </div>
          </form>
        

          
      </div>
    </div>
  </div>
</div>



    <div class="subbox">
      <a class="anment" href="#annoucement"data-toggle="modal" data-target="#annoucement"style="text-decoration:none"  > Share somethings with your class..</a> 
      <i class="material-icons icon-anment">library_books</i> 
    </div>


    <!-- Static Chart -->

          
    <h3 class="text-left statistic">Statistic</h3>

          <div id="Allpiechart"></div>
          
          
      
          <div id="piechart"></div>
        
  


    <!--annoucement -->
    
<div class="modal fade"id="annoucement" role="dialog">
    <div class="modal-dialog">
      <br>
      <div class="modal-content text-left">
            <br>
            <center><h4>Annoucement</h4></center>
            <form action="../../FP/admin/service/records/announcement.post.php" method="post">
<!-- Boxlist Subject Name -->
          <font class="message2" align="left">Subject :</font> 
          <select name="txtsubjectpost" id="txtsubjectpost" class="boxlist" style="background-color:#fcfcfc" onchange="sectionchart6()" >  
          <option value="" disabled selected> Please fill in subject name </option>
          <?php  
              while($row = mysqli_fetch_array($objQuery10))  
              {  
          ?>    
              <option value="<?php echo $row["sub_name"]; ?>"  >
                 <?php echo $row["sub_name"]; ?></option>  
          
          <?php
              }
          ?>      
       
          </select>
          <br>

          
<!-- Boxlist Section -->
<div id="sectionchart6"></div>
      
          <br>
          <font class="message2" align="left">Share you text :</font> 
          <br>
          <input type="hidden" name="username_tea" value="<?php echo $_SESSION["username_tea"]; ?>">
          <textarea  type="text" name="textarea" style="width: 100%; height: 100px;" required></textarea>
          <br>
         <center> <button type="submit"  >Post</button> <center>
          </form>

          <br><br>
          <div class="footer2">
          <button type="button" class="closebtn" data-dismiss="modal">Close</button>
          </div>
     
      </div>
    </div>
  </div>

<!--power-->
  <div class="modal fade " id="power" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content text-left">
      <br>
      <div class="login">
        <center><h3>Power control</h3></center>
        <form>
          <fieldset>   
          Subject : <showsubject>None</showsubject><br> 
          Section : <showsection>None</showsection>
          <center>
          <table width="80%">
          <br>
          <tr>
            <th width="33%"><div id = "num1" ></div></th>
            <th width="33%"><div id = "num2" ></div></th>
            <th width="33%"><div id = "num3" ></div></th>
          </tr>
        
          <tr>
            <th><div id = "g1" ></div></th>
            <th><div id = "g2" ></div></th>
            <th><div id = "g3" ></div></th>
          </tr>

          <tr>
            <th width="33%"><div id = "num4" ></div></th>
            <th width="33%"><div id = "num5" ></div></th>
            <th width="33%"><div id = "num6" ></div></th>
          </tr>
          
          <tr>
            <th><div id = "g4"></div></th>
            <th><div id = "g5"></div></th>
            <th><div id = "g6"></div></th>
          </tr>

          <tr>
            <th width="33%"><div id = "num7" ></div></th>
            <th width="33%"><div id = "num8" ></div></th>
            <th width="33%"><div id = "num9" ></div></th>
          </tr>
         
          <tr>
            <th><div id = "g7"></div></th>
            <th><div id = "g8"></div></th>
            <th><div id = "g9"></div></th>
          </tr>
          </table></center>
            <center><b><div id="alertpower"></div><b></center>
          </fieldset>
          <br><br>
          <div class="footer2">
          <button type="button" class="closebtn" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--dev-->
<div class="modal fade " id="gprofile" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content text-left">
      <br>
      <div class="login">
        <center><h3 id="dev">Develop by</h3></center>
        <form>
          <fieldset>   
          
          <font class = "indi" align="left"><b>Name : Pisanu Chomphuthong</b></font> 
          <br>
          <font class = "indi" align="left"><b>Student ID : 58010903</b></font> 
          <br><br>

          <font  class = "indi"align="left"><b>Name : Phadol Dilokporntanakul</b></font> 
          <br>
          <font  class = "indi"align="left"><b>Student ID : 58010966</b></font>
          <br><br>
          <font  class = "indi"align="left"><b>Name : Worawut Intraraksakul</b></font> 
          <br>
          <font  class = "indi"align="left"><b>Student ID : 58011116</b></font>
          <br>
          
            
          </fieldset>
          <br><br>
          <div class="footer2">
          <button type="button" class="closebtn" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>





<!-- Footer -->
<footer class="text-center">
<i class="material-icons" style="cursor: pointer;" href="#gprofile" data-toggle="modal" data-target="#gprofile">
alternate_email
</i>
</footer>
</div>


</body>
</html>