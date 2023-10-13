<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include("../Assets/Connection/Connection.php");
include("Header.php");
if(isset($_POST["btnsave"]))
{
	$pic=$_FILES["filepic"]['name'];
	$path=$_FILES["filepic"]['tmp_name'];
	move_uploaded_file($path,"../Assets/Files/Hotel/".$pic);
	$ins="insert into tbl_newhotel(hotels_name,hotels_contact,hotels_address,hotels_email,hotels_website,hotels_photo)values('".$_POST["txtn"]."','".$_POST["txtc"]."','".$_POST["txta"]."','".$_POST["txtemail"]."','".$_POST["txtweb"]."','".$pic."')";
	$conn->query($ins);
	header("location:NewHotels.php");
}
if(isset($_GET["did"]))
{
	$del="delete from tbl_newhotel where hotels_id='".$_GET["did"]."'";
	$conn->query($del);
	header("location:NewHotels.php");
}
?>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="1" align="center" cellpadding="10">
    <tr>
      <td>Name</td>
      <td><label>
        <input type="text" name="txtn" id="txtn" />
      </label></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label>
        <input type="text" name="txtemail" id="txtemail" />
      </label></td>
    </tr>
    <tr>
      <td>Website</td>
      <td><label>
        <input type="text" name="txtweb" id="txtweb" />
      </label></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label>
        <input type="text" name="txtc" id="txtc" />
      </label></td>
    </tr>
    <tr>
      <td>Image</td>
      <td><label>
        <input type="file" name="filepic" id="filepic" />
      </label></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label>
        <textarea name="txta" id="txta" cols="45" rows="5"></textarea>
      </label></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btnsave" id="btnsave" value="Save" />
      <input type="submit" name="btnc" id="btnc" value="Cancel" /></td>
    </tr>
  </table>
  <table width="200"  align="center" border="1">
    <tr>
      <td>Sl.No</td>
      <td>Name</td>
      <td>Contact</td>
      <td>Email</td>
      
      <td>Action</td>
    </tr>
    <?php
	$sel="select * from tbl_newhotel";
	$data=$conn->query($sel);
	$i=0;
	while($row=$data->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $row["hotels_name"]?></td>
      <td><?php echo $row["hotels_contact"]?></td>
      <td><?php echo $row["hotels_email"]?></td>
      
      <td><a href="NewHotels.php?did=<?php echo $row["hotels_id"]?>">Delete</a></td>
      <td><a href="Hotelgallery.php?did=<?php echo $row["hotels_id"]?>">Images</a></td>
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