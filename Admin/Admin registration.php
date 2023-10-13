<?php
$adminid=0;
$adminname="";
$adminemail="";
$adminpassword="";
include("../Assets/Connection/Connection.php");
include("Header.php");
$message="";
if(isset($_POST["btnsubmit"]))
{
	$adminid=$_POST["txtid"];
	$adminname=$_POST["txtname"];
	$admincontacts=$_POST["txtcontacts"];
	$adminemail=$_POST["txtemail"];
	$adminpassword=$_POST["txtpassword"];
	if($adminid==0)
	{
			$insQry="insert into tbl_admin(admin_name,admin_contact,admin_email,admin_password)values('".$adminname."','".$admincontact."','".$adminemail."','".$adminpassword."')";
			if($con->query($insQry))
			{
				$message="Record Inserted";
			}
			else
			{
				$message="Record Failed";
			}
	}
	else
	{
		$upqry="update tbl_admin set admin_name='".$adminname."',admin_contacts='".$admincontact."'
		admin_email='".$adminemail."',admin_password ='".$adminpassword."'where admin_id=".$adminid;
		if($con->query($upqry))
		{
			?>
            <script>
			alert("UPDATED");
			window.location="Adminregistration.php"
			</script>
            <?php
		}	
		else
		{
			?>
            <script>
			alert("UPDATE FAILED");
			</script>
            <?php
		}
	}
}
		if(isset($_GET['aid'])){
			$delqry="delete from tbl_admin where admin_id=".$_GET['aid'];
			if($con->query($delqry))
			{
				?>
                <script>
				alert("DELETED")
				window.location="Adminregistration.php"
				</script>
            	<?php
			}
			else
			{
			?>
			<script>
			alert("FAILED")
			</script>
            <?php
			}
		}
		if(isset($_GET['eid']))
		{
			$sel="select *from tbl_admin where admin_id=".$_GET['eid'];
			$editres=$con->query(sel);
			$rowedit=$editres->fetch_assoc();
			$adminid=$rowedit['admin_id'];
			$adminame=$rowedit['admin_name'];
			$adminname=$rowedit['admin_id'];
			$adminname=$rowedit['admin_id'];
			$adminname=$rowedit['admin_id'];
		}
		?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="10">
    <tr>
      <td>Name</td>
      <td><label for="txtname"></label></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtname2"></label>
      <input type="text" name="txtname2" id="txtname2" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtname3"></label>
      <input type="text" name="txtname3" id="txtname3" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label>
        <input type="text" name="txtname4" id="txtname4" />
      </label></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="submit" name="btncancel" id="btncancel" value="cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php 
include("Footer.php");
?>