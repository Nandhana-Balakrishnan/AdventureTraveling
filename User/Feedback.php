<?php 
include("../Assets/Connection/connection.php"); 

include("Header.php");
if(isset($_POST["btnsend"])) 
{

  $content=$_POST["txtcontent"]; 
  $insqry="insert into tbl_feedback(feedback_content,user_id,feedback_date)values('".$content."','".$_SESSION['uid']."',curdate())"; 
  if($conn->query($insqry)) 
  { 
      ?> 
      <script> 
          alert("sended"); 
          </script> 
          <?php 
} 
else 
{ 
    ?> 
    <script> 
    alert("failed"); 
    </script> 
    <?php 
} 
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

?>
<form id="form1" name="form1" method="post" action="">
  <table width="200"  align="center" border="1">
    <tr>
      <td>Content</td>
      <td><label>
        <input type="text" name="txtcontent" id="txtcontent" />
      </label></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btnsend" id="btnsend" value="Send" />
      <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php 
include("Footer.php");
?>
