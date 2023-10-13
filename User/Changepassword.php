<!DOCTYPE html>
<html lang="en">
<head>
	<title>Change Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../Assets/Template/EditForm/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/EditForm/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/EditForm/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/EditForm/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/EditForm/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../Assets/Template/EditForm/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/EditForm/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/EditForm/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../Assets/Template/EditForm/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/EditForm/css/util.css">
	<link rel="stylesheet" type="text/css" href="../Assets/Template/EditForm/css/main.css">
<!--===============================================================================================-->
<style>
	.rowuser{
		width:100%;
		display:flex;
		justify-content: space-between;
		margin-bottom: 30px;
		align-items: center;

	}
	.inp{
		padding:5px;
		border:1px solid;
		border-radius:10px
	}
</style>
</head>
<body>
<?php

include("../Assets/Connection/connection.php");
include("Header.php");
ob_start();
if(isset($_POST["btn_check"]))
{
    $current = $_POST["txt_current"];
	$new = $_POST["txt_new"];
	$confirm = $_POST["txt_confirm"];
	
	$selqry="select * from tbl_user where user_id='".$_SESSION["uid"]."'";
	$row=$conn->query($selqry);
	$data=$row->fetch_assoc();
	
	if($current == $data['user_password'])
	{
	  if($new== $confirm)
	  {
	    $upQry="update tbl_eventuser set user_password='".$new."' where user_id='".$_SESSION["uid"]."'";
	    if($conn->query($upQry))
	    {
			
			?>
			<script>
			alert("Password Changed");
			windows.location="MyProfileO.php";
			</script>
			<?php
			
	    }
	  }
	    else
	  {
		  ?>
			<script>
			alert("Password Miss Matching");
			windows.location="Changepassword.php";
			</script>
			<?php
	  }
	}
}
?>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
                  <div class="rowuser">
					<div >Current Password</div>
					<div ><input class="inp" type="password"  name="txt_current" id="txt_current" /></div>
	  			 </div>
				   <div class="rowuser">
					<div>New Password</div>
					<div><input class="inp" type="password" name="txt_new" id="txt_new"/></div>
					</div>
					<div class="rowuser">
					<div>Confirm Password</div>
					<div><input class="inp" type="password"  name="txt_confirm" id="txt_confirm"  /></div>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="btn_check" class="login100-form-btn">
								Update
							</button>
						</div>
					</div>
        				 <!-- <div><button type="submit" name="btn_update">Update</button></div>-->
        

				</form>
        
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="../Assets/Template/EditForm/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Template/EditForm/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Template/EditForm/vendor/bootstrap/js/popper.js"></script>
	<script src="../Assets/Template/EditForm/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Template/EditForm/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Template/EditForm/vendor/daterangepicker/moment.min.js"></script>
	<script src="../Assets/Template/EditForm/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Template/EditForm/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Template/EditForm/js/main.js"></script>

</body>
<?php
    include("Footer.php");
    ob_flush();
?>
</html>