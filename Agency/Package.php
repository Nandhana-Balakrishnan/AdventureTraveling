
<?php
ob_start();
		
    include("Header.php");
	   include("../Assets/Connection/Connection.php");
	   if(isset($_POST["btnsave"]))
	   {

      $pic=$_FILES["pic"]["name"];
      $path=$_FILES["pic"]["tmp_name"];
      move_uploaded_file($path,"../Assets/Files/Package/".$pic);
		   $ins="insert into tbl_package(package_name,packagetype_id,package_details,package_destination,package_rate,noofdays,agency_id,package_persons,days,nights,package_cover)values('".$_POST["txtname"]."','".$_POST["sel_district"]."','".$_POST["txtdetails"]."','".$_POST["txtdestination"]."','".$_POST["txtrate"]."','".$_POST["txtnumberofdays"]."','".$_SESSION["agid"]."','".$_POST["persons"]."','".$_POST["days"]."','".$_POST["nights"]."','".$pic."')";
		   echo $ins;
		   if($conn->query($ins))
		   {
			   header("location:Highlights.php");
		   }
		   else{
			   echo $ins;
		   }
	   }
	   
	   if(isset($_GET['did']))
	   {
	   $delQry="delete from tbl_package where package_id=".$_GET['did'];
	   if($conn->query($delQry))
	   {
		   ?>
           <script>
		   alert("Deleted")
		   window.location="package.php"
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

<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table  border="1" align="center" cellpadding="10">
    <tr>
      <td>Name</td>
      <td><label>
        <input type="text" name="txtname" id="txtname" />
      </label></td>
    </tr>
    <tr>
      <td>PackageType</td>
      <td><select name="sel_district" id="sel_district" >
        <option value="">---select---</option>
        <?php
		$selqry="select *from tbl_packagetype";
		$res=$conn->query($selqry);
		while($row=$res->fetch_assoc())
		{
			?>
        <option value="<?php echo $row["packagetype_id"]?>"><?php echo $row["packagetype_name"]?></option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Destination</td>
      <td><label>
        <input type="text" name="txtdestination" id="txtdestination" />
      </label></td>
    </tr>

     <td>Details</td>
      <td><label>
        <input type="text" name="txtdetails" id="txtdetails" />
      </label></td>
    </tr>
    <tr>
    <td>Rate</td>
      <td><label>
        <input type="text" name="txtrate" id="txtrate" />
      </label></td>
    </tr>
    <tr>
    <td>Image</td>
      <td><label>
        <input type="file" name="pic" id="txtrate" />
      </label></td>
    </tr>
    <tr>
     <td>No.of Days</td>
      <td><label>
        <input type="text" name="txtnumberofdays" id="txtnumberofdays" />
      </label></td>
    </tr>
    <tr>
     <td>No.of Persons</td>
      <td><label>
        <input type="text" name="persons" id="txtnumberofdays" />
      </label></td>
    </tr>
    <tr>
     <td>Days</td>
      <td><label>
        <input type="text" name="days" id="txtnumberofdays" />
      </label></td>
    </tr>
    <tr>
     <td>Nights</td>
      <td><label>
        <input type="text" name="night" id="txtnumberofdays" />
      </label></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Save" />        <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
<table border="1">
<tr>
<td>Name</td>
<td>Packagetype</td>
<td>Destination</td>
<td>Details</td>
<td>Rate</td>
<td>Noofdays</td>
<td>Action</td>
</tr>

<?php
  $selqry="select*from tbl_package p inner join tbl_packagetype pt on pt.packagetype_id=p.packagetype_id where agency_id='".$_SESSION["agid"]."'";
  $res=$conn->query($selqry);
  $i=0;
  while($row=$res->fetch_assoc())
  {
	  $i++;
?>
<tr>
<td><?php echo $i?></td>
<td><?php echo $row['package_name'];?></td>
<td><?php echo $row['packagetype_name'];?></td>
<td><?php echo $row['package_destination'];?></td>
<td><?php echo $row['package_details'];?></td>
<td><?php echo $row['package_rate'];?></td>
<td><a href ="Package.php?did=<?php echo $row['package_id']?>">Delete</a></td>
</tr>
<?php
  }
  ?>
  </table>
</body>
</html>
<?php 
include("Footer.php");
ob_flush();
?>
