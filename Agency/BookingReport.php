
<?php 
include("../Assets/Connection/connection.php"); 
session_start();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="500" border="1">
    <tr>
      <td width="108">From Date</td>
      <td width="150"><label>
        <input type="text" name="txtdate" id="txtdate" />
      </label>  </td>
      <td width="81">To Date</td>
      <td width="133"><label>
        <input type="text" name="txtdate2" id="txtdate2" />
      </label></td>
    </tr>
    <tr>
      <td colspan="4" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Show Result" /></td>
    </tr>
    
    
  </table>
  <?php
  if(isset($_POST["btnsubmit"]))
  { 
  ?>
  <table align="center" cellpadding="10" cellspacing="60">
  <tr>
  <td>Sl.No</td>
  <td>Package Name</td>
  <td>User Name</td>
  <td>Package Details</td>
  <td>Contact</td>
  </tr>
  <?php
  if($_POST["txtdate"]!="" and $_POST["txtdate2"]!="")
  {
	  $sel="select * from tbl_packagebooking pb inner join tbl_package p on p.package_id=pb.package_id inner join tbl_user u on u.user_id=pb.user_id where  pb.booked_date between '".$_POST["txtdate"]."' and '".$_POST["txtdate2"]."'";
  }
  else if($_POST["txtdate2"]!="")
  {
	  $sel="select * from tbl_packagebooking pb inner join tbl_package p on p.package_id=pb.package_id inner join tbl_user u on u.user_id=pb.user_id where  pb.booked_date <='".$_POST["txtdate2"]."'";
  }
  else
  {
	  $sel="select * from tbl_packagebooking pb inner join tbl_package p on p.package_id=pb.package_id inner join tbl_user u on u.user_id=pb.user_id where  pb.booked_date >= '".$_POST["txtdate"]."'";
  }
  $data=$conn->query($sel);
  $i=0;
  while($row=$data->fetch_assoc())
  {
	  $i++;
  ?>
  <tr>
  
  </tr>
  <?php
  }
  ?>
  </table>
  <?php
  }
  ?>
</form>
</body>
</html>