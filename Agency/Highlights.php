<?php
  session_start();
  include("Header.php");
  include("../Assets/Connection/Connection.php");
  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>


  <table border="1" align="center" cellpadding="10" cellspacing="20">
    <tr>
    <?php
	$sel="select max(package_id) as id  from tbl_package where agency_id='".$_SESSION["agid"]."'";
	$data=$conn->query($sel);
	$row=$data->fetch_assoc();
	$_SESSION["pack"]=$row["id"];
	$selcount="select * from tbl_package where package_id='".$row["id"]."'";
	$datacount=$conn->query($selcount);
	$rowcount=$datacount->fetch_assoc();
	$count=$rowcount["noofdays"];


    

   


    
?>
    // Loop to generate forms
    <form method="post" action="process_data.php">
    <?php
    for ($i = 1; $i <= $count; $i++) {
        echo '<label for="name' . $i . '">HighLights:</label>';
        echo '<textarea name="highlights[]" required></textarea><br>';
        echo '<input type="hidden" name="dayno[]" value="' . $i . '">';
        echo '<br>';
    }
    ?>
    <input type="submit" value="Submit All">
</form>
    
    
    
    
    
</body>
</html>
<?php 
include("Footer.php");
?>
