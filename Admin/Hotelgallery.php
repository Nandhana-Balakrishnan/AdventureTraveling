<?php
include("../Assets/Connection/connection.php");
include("Header.php");
if(isset($_POST["btnsave"]))
{
	$pic=$_FILES["btnbrowse"]["name"];
	$path=$_FILES["btnbrowse"]["tmp_name"];
	move_uploaded_file($path,"../Assets/Files/HotelGallery/".$pic);
	
	$ins="insert into tbl_hotelgallery(hotel_id,gallery_image)values('".$_GET["did"]."','".$pic."')";
	$conn->query($ins);
	header("location:NewHotels.php");
}
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200"  align="center" border="1">
    <tr>
      <td>Images</td>
      <td><label>
      <input type="file" name="txtbrowse" id="txtbrowse" />
      </label></td>
    </tr>
    <tr>
      <td>Caption</td>
      <td><label>
        <input type="text" name="txtcaption" id="txtcaption" />
      </label></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Save" />
      <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>