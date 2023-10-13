<?php
session_start();
include("../Assets/Connection/Connection.php");
ob_start();
include("Header.php");

?>
<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
<div id="tab" align="center">
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>


var xValues = [
<?php 

  $sel="select * from tbl_packagetype";
  $row=$conn->query($sel);
  while($data=$row->fetch_assoc())
  {
        echo "'".$data["packagetype_name"]."',";
      
  }

?>
];

var yValues = [
<?php 
  $sel="select * from tbl_packagetype";
  $row=$conn->query($sel);
  while($data=$row->fetch_assoc())
  {
	  
	 $sel1="select count(booking_id) as id from tbl_packagebooking pb inner join tbl_package p on p.package_id=pb.package_id where p.packagetype_id='".$data["packagetype_id"]."' ";
	  
	  $row1=$conn->query($sel1);
  while($data1=$row1->fetch_assoc())
	  {
			echo $data1["id"].",";
	  }
  }

?>
];



var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "All Packages Booking"
    }
  }
});
</script>
<?php
//include("Footer.php");
ob_flush();
?>
</div>
</body>
</html>
