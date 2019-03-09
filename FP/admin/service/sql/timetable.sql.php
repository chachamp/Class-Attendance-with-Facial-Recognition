
<?php



$strSQL5 = "SELECT gid FROM detailsubject WHERE sub_name  = '".trim($_SESSION["sub_name"])."' 
    and section = '".trim($_SESSION["section"])."' ";
	$objQuery5 = mysqli_query($objCon,$strSQL5);
	

	while ($row5 = mysqli_fetch_array($objQuery5)) {
		$GID = $row5['gid'];
	}
	
    $_SESSION["gid"] = $GID;

    ?>