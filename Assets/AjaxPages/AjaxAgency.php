<?php
include("../Connection/Connection.php");
?>
<table align="center" cellpadding="10" cellspacing="60" id="result">



<tr> 
<?php
  $selqry="select*from tbl_agency a inner join tbl_place p on p.place_id=a.place_id inner join tbl_district d on d.district_id=p.district_id where true";
  if($_GET["pid"]!="")
  {
	  $selqry.=" and a.place_id='".$_GET["pid"]."'";
  }
  if($_GET["did"]!="")
  {
	  $selqry.=" and p.district_id='".$_GET["did"]."'";
  }
  $res=$conn->query($selqry);
  $i=0;
  while($row=$res->fetch_assoc())
  {
	  $i++;
?>                                                   
<td><p style="text-align:center;border:1px solid #999;margin:22px;padding:10px">
<img src="../Assets/Files/UserPhoto/<?php echo $row["agency_logo"]?>" width="150" height="150"><br>
Name:<?php echo $row['agency_name'];?><br />
Contact: <?php echo $row['agency_contact'];?><br />
Email:<?php echo $row['agency_email'];?><br />
Address:<?php echo $row['agency_address'];?><br />
<a href ="Viewpackage.php?aid=<?php echo $row['agency_id']?>">View packages</a></p></td>

<?php
if($i==4)
{
	echo "</tr>";
	$i=0;
	echo "<tr>";
}
  }
  ?>
  </table>