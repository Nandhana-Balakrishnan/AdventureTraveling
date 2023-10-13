<?php
include("../Assets/connection/connection.php");
session_start();
include("Header.php");
if(isset($_POST["btnpw"]))

$selQry="select * from tbl_user where user_id='".$_SESSION["uid"]."' and user_password='".$_POST["txtoldpw"]."'";
$row=$conn->query($selQry);
if($data=$row->fetch_assoc())
{
		if($_POST["txtpw2"]==$_POST["txtpw3"])
		{
			$update="update tbl_user set user_password='".$_POST["txtpw2"]."' where user_id='".$_SESSION["uid"]."'";
			$conn->query($update);
			header("location:../Guest/Login.php");
		}
		else{
			echo"Password Mismatch";
		}
}
else{
		echo"Invalid Password";
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
<h1 align="center">CHANGE PASSWORD</h1>
<form id="form1" name="form1" method="post" action="">
  <table width="429" border="1" align="center">
    <tr>
      <td width="175" height="49">Old Password</td>
      <td width="238"><label>
        <input type="text" name="txtpw" id="txtpw" />
      </label></td>
    </tr>
    <tr>
      <td height="43">New password</td>
      <td><label>
        <input type="text" name="txtpw2" id="txtpw2" />
      </label></td>
    </tr>
    <tr>
      <td height="48">Confirm password</td>
      <td><label>
        <input type="text" name="txtpw3" id="txtpw3" />
      </label></td>
    </tr>
    <tr>
      <td height="46" colspan="2" align="center"><input type="submit" name="btnpw" id="btnpw" value="Change Password" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php 
include("Footer.php");
?>
