<?php
session_start();
include("../../FP/main.service/config/connect.db.service.php");
include("../../FP/user/service/auth/gateway.schedule.php");
include("../../FP/user/service/sql/schedule.sql.php");

?>
    

<html lang="en-Us">

<head>
		<title>Class Attendance</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,300'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <link rel="stylesheet" href="../../FP/css/schedule.css">
  <link rel="stylesheet" href="../../FP/css/schedule.control.css">
</head>


<body>
		
	
	<div class="form">
    
        <font class="message" align="left"><b> Code Class : </b></font>
        <font class="message2" align="left"><?php echo $objResult["sub_code"];?></font>
        <br>
	    	<font class="message" align="left"><b> Subject : </b></font>
        <font class="message2" align="left"><?php echo $objResult["sub_name"];?></font>
        <br>
        <font class="message" align="left"><b> Section : </b></font>
        <font class="message2" align="left"> <?php echo $objResult["section"];?></font>
        <br>
		    <font class="message" align="left"><b> Date: </b></font>
	      <font class="message2" align="left">	<?php echo $objResult1["date"];?></font>
	    	<br>
		    <font class="message" align="left"><b> Time: </b></font>
        <font class="message2" align="left"> <?php echo $objResult1["time_start"];?></font>
		    <font class="message" align="left"><b> To: </b></font>
		
        <font class="message2" align="left">  <?php echo $objResult1["time_end"];?></font>
    <br><br>
    </div>
        <center><font class="message1" ><b> List of names </b></font></center>
        <br>
        <div class="control">
        <div class="container" >  
     
                     <table class="table table-bordered">  
                          <tr>  
                            
                               <th width="25%" ><center>Student ID</center></th>  
                               <th width="50%"><center>Name</center></th>      
                               <th width="25%"><center>Status</center></th>  
                               
                          </tr>  
                          <?php  
                          while($row = mysqli_fetch_array($objQuery4) )  
                          {  
                          ?>                    
                          <tr>  
                               <td><center><?php echo $row["stu_id"]; ?></center></td>  
                               <td><?php echo $row["stu_name"]; ?></td>
                               <td><center> <?php echo $row["status"]; ?></center> </td>
                               <?php           
                          }  
                          ?>  
                       
                              
                               
                        
                          </tr>  
                         
                         
                     </table>  
                      
                        </div>
          </div>
       
    
	
</body>
</html>
<?php mysqli_close($objCon); ?>