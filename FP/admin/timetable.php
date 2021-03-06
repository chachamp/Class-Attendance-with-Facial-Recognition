<?php
	
session_start();
include("../../FP/main.service/config/connect.db.service.php");
include("../../FP/admin/service/auth/gateway.timetable.php");
include("../../FP/admin/service/sql/timetable.sql.php");




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
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="../../FP/css/schedule.add.del.css">
        <link rel="stylesheet" href="../../FP/css/schedule.control.css">
        <script type="text/javascript" src="../../FP/admin/service/js/delete.table.timetable.js"></script>
   

    
</head>


<body  id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<div class="form">
    
        <font class="message" align="left"><b>  Subject name  : </b></font>
        <font class="message2" id="subject2" name="subject2" align="left"><?php echo $_SESSION["sub_name"] ?></font>
        <br>
	    	<font class="message" align="left"><b> Section : </b></font>
        <font class="message2 " id="section2" name="section2" align="left"><?php echo $_SESSION["section"] ?></font>
        <br>
        <font class="message" align="left"><b> Guid : </b></font>
        <font class="message2 " id="gid1" name="gid1" align="left"><?php echo $_SESSION["gid"]; ?></font>
        <br><br>
        <font class="message" align="left"><b> Go to : </b></font>
        <a href="../admin/page.php"> Back </a>
        <br><br><br>
    
    </div>
        <center><font class="message1" ><b> Timetable </b></font></center>
        <br><br>

        <div class="control">
        <div class="container" >  
    
        <br><br>


        
     
     
                     <table class="table table-bordered">  
                       <thead>
                          <tr>  
                         
                               <th width="20%" ><center>Date</center></th>  
                               <th width="20%"><center>Start time</center></th>
                               <th width="20%"><center>Late time</center></th>     
                               <th width="20%"><center>End time</center></th>
                               <th width="20%"><center>Commands</center></th> 
                               
                          </tr>
                        </thead>
                        <tbody>  
                        <?php  
                          while($row = mysqli_fetch_array($objQuery) )  
                          {
                          ?>                 
                          <tr id="delete<?php echo $row['date']; ?>"> 
                           
                               <td id="add"><center><?php echo $row["date"]; ?></center></td>  
                               <td id="add"><center><?php echo $row["time_start"]; ?></center></td>  
                               <td id="add"><center><?php echo $row['time_late']; ?></center></td> 
                               <td id="add"><center><?php echo $row['time_end']; ?></center></td> 
                               <td id="add" align="center">
                               <button type = "button" onclick="deleteAjax1('<?php echo  $row['date']; ?>')"  class="btn btn-sm btn-danger "><i style="font-size:14px" class="fa">&#xf014;</i></button>
                               </td>
                               
                        
                          </tr>  
                          <?php
                          }
                        ?>
                        </tbody> 
                         
                     </table>  
                      
                        </div>
          </div>
       
     
</body>




</html>

<?php mysqli_close($objCon); ?>


