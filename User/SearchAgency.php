<?php
  
  include("Header.php");
  include("../Assets/Connection/Connection.php");
	   
	   ?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

	<br><br>
	<div id="tab">
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center">
    
        <tr>
          <td>District</td>
          <td><select name="sel_district" id="sel_district" onchange="getPlace(this.value)"  class="form-control">
            <option value="">---select---</option>
            <?php
		$selqry="select *from tbl_district";
		$res=$conn->query($selqry);
		while($row=$res->fetch_assoc())
		{
			?>
            <option value="<?php echo $row["district_id"]?>"><?php echo $row["district_name"]?></option>
            <?php
		}
		?>
          </select></td>
          <td>Place</td>
          <td><select name="sel_place" id="sel_place" onchange="getAgency()" class="form-control">
            <option value="">---select---</option>
          
          </select></td>
        </tr>
      </table>
</form>
<table align="center" cellpadding="10" cellspacing="60" id="result">



<tr> 
<?php
  $selqry="select*from tbl_agency a inner join tbl_place p on p.place_id=a.place_id inner join tbl_district d on d.district_id=p.district_id";
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
<?php
$selRating="select sum(user_rating) as total from tbl_review where agency_id=".$row['agency_id'];
$resRating=$conn->query($selRating);
$dataRating=$resRating->fetch_assoc();
$totalRating=$dataRating['total'];
$selCount="select count(user_rating) as num from tbl_review where agency_id=".$row['agency_id'];
$resCount=$conn->query($selCount);
$dataCount=$resCount->fetch_assoc();
$ratingCount=$dataCount['num'];
if($ratingCount>0)
{
 $rating=$totalRating/$ratingCount;
 echo $rating;
}
else
{
	echo "0/5";
}

?><br>
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
</div>
</body>
</html>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?pid="+did,
		success: function(html){
			$("#sel_place").html(html);
			getAgency();
		}
	});
}
function getAgency()
{
	var did=document.getElementById("sel_district").value;
	var pid=document.getElementById("sel_place").value;
	$.ajax({
		url:"../Assets/AjaxPages/AjaxAgency.php?did="+did+"&pid="+pid,
		success: function(html){
			$("#result").html(html);
		}
	});
}
</script>
<?php 
include("Footer.php");
?>
