<?php
	
session_start();
include("../../FP/main.service/config/connect.db.service.php");
include("../../FP/admin/service/auth/gateway.add.del.stu.php");



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
        <script type="text/javascript" src="../../FP/admin/service/js/delete.table.page.admin.js"></script>
        <script src="../../FP/admin/service/js/add.table.page.admin.js" ></script>
       

    
</head>


<body  id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<div class="form">
    
        <font class="message" align="left"><b>  Subject name  : </b></font>
        <font class="message2" id="subject1" name="subject1" align="left"><?php echo  $_SESSION["sub_name"] ?></font>
        <br>
	    	<font class="message" align="left"><b> Section : </b></font>
        <font class="message2 " id="section1" name="section1" align="left"><?php echo $_SESSION["section"] ?></font>
        <br><br>
        <font class="message" align="left"><b> Go to : </b></font>
        <a href="../admin/page.php"> Back </a>
        <br><br><br>
    
    </div>
        <center><font class="message1" ><b> Add/Delete Student </b></font></center>
        <br><br>

        <div class="control">
        <div class="container" >  
      
        <a href="#records" data-toggle="modal" data-target="#records" class="pull-right btn btn-default btn-sm btn-primary">
        <span class="glyphicon glyphicon-ok-circle"></span> Records</a>
        <br><br><br><br>


        
     
     
                     <table class="table table-bordered">  
                       <thead>
                          <tr>  
                            
                               <th width="25%" ><center>Student ID</center></th>  
                               <th width="50%"><center>Name</center></th>
                               <th width="12.5%"><center>Group</center></th>     
                               <th width="12.5%"><center>Commands</center></th> 
                               
                          </tr>
                        </thead>
                        <tbody>  
                          <?php  
                          while($row = mysqli_fetch_array($objQuery) )  
                          {
                              
                          ?>                    
                          <tr id="delete<?php echo $row['stu_id']; ?>">  
                               <td id="add" ><center><?php echo $row['stu_id']; ?></center></td>  
                               <td id="add"><?php echo $row["stu_name"]; ?></td>  
                               <td id="add"> <center><?php echo $row['num_group']; ?></center></td> 
                               <td id="add" align="center">
                               
                               <button type = "button" onclick="deleteAjax(<?php echo $row['stu_id']; ?>)"  
                               class="btn btn-sm btn-danger "><i style="font-size:14px" class="fa">&#xf014;</i></button>
                              
                               </td>
                               
                          </tr>  
                          <?php  
                          $_SESSION['stu_id'] = $row['stu_id'];
                             
                            
                          }  
                          ?> 
                        </tbody> 
                         
                     </table>  
                          
       
          </div>
          </div>
       


          <!--Records-->
<div class="modal fade " id="records" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content text-left">
     
      
        <center><h3> Add Student</h3></center>
        
        <form  action="" method="post" >
          <fieldset>
      
            <font class="message2"  align="left"> Student ID : &nbsp; &nbsp; &nbsp;</font>
              
            <input type="text"  name="stuidadd" id="stuidadd" required>
            <br><br><br>
            <font class="message2" align="left"> Student Name : </font>
            
            <input type="text"   name="stunameadd" id="stunameadd" required>
            <br><br><br>

            <font class="message2" align="left"> Student Group : </font>
            
            <input type="text"   name="stugroupadd" id="stugroupadd"  required>
            <br><br><br>
          
        
            <center><p><button type="button" class="btn btn-default btn-success btn-sm "  onclick = "Add_data()"value="Add">Add</button></p></center>
            <br>
          </fieldset>
          <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
          </div>

        </form>
     
    </div>
  </div>
</div>


 
</body>




</html>

<?php mysqli_close($objCon); ?>


