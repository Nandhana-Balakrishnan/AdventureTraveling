
<?php
     
	 
	 
	$servername="localhost";
	$username="root";
	$password="";
	$database="db_tourism";
	
	$conn=mysqli_connect($servername,$username,$password,$database);
	if(!$conn)
	{
		echo"Connection Failed";
	}
?>








