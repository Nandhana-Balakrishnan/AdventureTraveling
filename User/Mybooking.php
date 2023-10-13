
<?php 
include("../Assets/Connection/connection.php"); 

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
<form id="form1" name="form1" method="post" action="">
  <table width="200"   align="center" border="1">
    <tr>
      <td>Sl.No</td>
      <td>Package name</td>
      <td>Details</td>
      <td>Amount </td>
      <td>Agency name</td>
      <td>Agency contact</td>
      <td>Status</td>
    </tr>
     <?php
  $sel="select* from tbl_packagebooking pb inner join tbl_package p on p.package_id=pb.package_id inner join tbl_agency u on u.agency_id=p.agency_id where pb.user_id='".$_SESSION['uid']."'"; 
$data=$conn->query($sel);
$i=0;
while($row=$data->fetch_assoc())
{
	$i++;
	?>
    <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row["package_name"]?></td>
    <td><?php echo $row["package_details"]?></td>
    <td><?php echo $row["package_rate"]?></td>
    <td><?php echo $row["agency_name"]?></td>
    <td><?php echo $row["agency_contact"]?></td> 
    <td>
      <?php
      if($row["booking_status"]==1 and $row["payment_status"]==1)
      {
        echo "Payment Completed";
        ?>
        <a href="Agencyrating.php?aid=<?php echo $row["agency_id"]?>">Rate Now</a>|  <a href="Packagerating.php?aid=<?php echo $row["package_id"]?>">Rate Package</a>
        <?php
      }
      else if($row["booking_status"]==1)
      {
        echo "Booking Completed";
        ?>
        <a href="Payment.php?bid=<?php echo $row["booking_id"]?>">Pay Now</a></li>
        <?php

      }
      else{
        
        echo "Pending";

      }
      ?>
    
 
    </td>
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