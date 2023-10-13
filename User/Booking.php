
<?php 
include("../Assets/Connection/connection.php"); 
include("SessionValidate.php");  
 $selqry="select * from tbl_package where package_id='".$_GET['package']."' "; 
 $row=$Conn->query($selqry); 
 $Data=$row->fetch_assoc(); 
 if(isset($_POST["txt_book"])) 
 { 
    $insqry="insert into tbl_booking(booking_status,payment_status,booking_date,user_id,booking_id,package_id)  
    values(,'".$_SESSION["uid"]."','".$_SESSION["pid"]."','".$_GET['package']."')"; 
    if($Conn->query($insqry)) 
    { 
      ?> 
      <script> 
          alert("Booked"); 
          </script> 
          <?php 
    } 
    else 
    {  ?> 
      <script> 
      alert("Error in Booking..Try again"); 
      </script> 
      <?php 
    } 
 } 
 
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Document</title> 
</head> 
<body>
<?php
include("Header.php");
?>
<form name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td><table width="200" border="1">
        <tr>
          <td width="135">PackageName</td>
          <td width="49"><label>
            <input type="text" name="txtname" id="txtname">
          </label></td>
        </tr>
        <tr>
          <td>Details</td>
          <td><label>
            <input type="text" name="txtdetails" id="txtdetails">
          </label></td>
        </tr>
        <tr>
          <td>Amount</td>
          <td><label>
            <input type="text" name="txtamount" id="txtamount">
          </label></td>
        </tr>
      </table></td>
    </tr>
  </table>
</form>
<form name="form2" method="post" action="">
  <input type="submit" name="btnsubmit" id="btnsubmit" value="BOOK">
</form>
<h1>&nbsp;</h1> 
</body> 
</html>
<?php
include("Footer.php"); 
?>



