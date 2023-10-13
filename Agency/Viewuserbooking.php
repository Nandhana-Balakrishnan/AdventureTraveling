
<?php 
include("../Assets/Connection/connection.php"); 
if(isset($_GET["aid"]))
{
  $up="update tbl_packagebooking set booking_status=1 where booking_id='".$_GET["aid"]."'";
  $conn->query($up);
  header("location:Viewuserbooking.php");
}
if(isset($_GET["rid"]))
{
  $up="update tbl_packagebooking set booking_status=2 where booking_id='".$_GET["rid"]."'";
  $conn->query($up);
  header("location:Viewuserbooking.php");
}
?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include("Header.php");
?>
<form id="form" name="form1" method="post" action"">
  <table width="200" border="1">
  <tr>
    <td>Sl.NO</td>
    <td>Name of User</td>
    <td>Contact</td>
    <td>Photo</td>
    <td>Packagename</td>
    <td>Start location</td>
    <td>Booking date</td>
    <td>Action</td>
  </tr>
  <?php
  $sel="select* from tbl_packagebooking pb inner join tbl_package p on p.package_id=pb.package_id inner join tbl_user u on u.user_id=pb.user_id where p.agency_id='".$_SESSION['agid']."' and pb.booking_status=0"; 
$data=$conn->query($sel);
$i=0;
while($row=$data->fetch_assoc())
{
	$i++;
	?>
    <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row["user_name"]?></td>
    <td><?php echo $row["user_contact"]?></td>
    <td><?php echo $row["user_photo"]?></td>
    <td><?php echo $row["package_name"]?></td>
    <td>Tvm</td>
    <td><?php echo $row["booking_date"]?></td>
    <td><a href="Viewuserbooking.php?aid=<?php echo $row['booking_id']?>">Accept</a>
    <a href="Viewuserbooking.php?rid=<?php echo $row['booking_id']?>">Reject</a></td>
        
    </tr>
    <?php
}
?>
</table>
</form>
</body>
</html>
<?php
include("Footer.php"); 
?>