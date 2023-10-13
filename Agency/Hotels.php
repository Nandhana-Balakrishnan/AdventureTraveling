<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
ob_start();
session_start();
include("Header.php");
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsave"]))
{
	$hotels=$_POST['hotels'];
	foreach($hotels as $checked)
	{
		$ins="insert into tbl_packagehotels(package_id,hotels_id)values('".$_SESSION["pack"]."','".$checked."')";
		$conn->query($ins);
	}
	header("location:Package.php");
}

?>
<form id="form1" name="form1" method="post" action="">
  <table width="200" align="center">
    <tr>
      <td>Choose Hotels</td>
</tr>
<tr>
      <td>
      <?php
	  $sel="select * from tbl_newhotel";
	  $data=$conn->query($sel);
	  while($row=$data->fetch_assoc())
	  {
		  ?>
          <input type="checkbox" name="hotels[]" value="<?php echo $row["hotels_id"]?>"/>
          <?php echo $row["hotels_name"]?>
          <br>
          <?php
	  }
      ?></td>
    </tr>
   
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Save" />
      <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php 
include("Footer.php");
ob_flush();
?>
