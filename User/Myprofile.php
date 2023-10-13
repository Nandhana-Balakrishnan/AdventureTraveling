<!DOCTYPE html>
<html lang="en">

<head>
	<title>user Profile</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../Assets/Template/EditForm/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/EditForm/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"
		href="../Assets/Template/EditForm/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"
		href="../Assets/Template/EditForm/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/EditForm/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/EditForm/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/EditForm/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/EditForm/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"
		href="../Assets/Template/EditForm/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/EditForm/css/util.css">
	<link rel="stylesheet" type="text/css" href="../Assets/Template/EditForm/css/main.css">
	<!--===============================================================================================-->
	<style>
		.rowuser {
			width: 90%;
			display: flex;
			justify-content: space-between;
			margin-bottom: 30px;

		}

		.inpu {
			min-width: 250px;
			padding: 5px;
			border: 1px solid;
			border-radius: 15px
		}

		.inp {

			min-width: 270px;
			padding: 5px;
			border: 1px solid;
			border-radius: 10px
		}

		.row-user-profile {
			width: 90%;
			margin-bottom: 30px;
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.img-user-profile {
			border: 1px solid;
			border-radius: 50%;
		}
	</style>
</head>

<body>
	<?php
	ob_start();
include("../Assets/Connection/connection.php");
include("Header.php");


$selQry = "select * from tbl_user o inner join tbl_place p on o.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where o.user_id='".$_SESSION["uid"]."'";

$row = $conn->query($selQry);
	  if($data=$row->fetch_assoc())
	  {
?>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-26">
						My Profile
					</span>
					<div class="row-user-profile">
						<div><img class="img-user-profile" src="../Assets/Files/UserPhoto/<?php echo $data["user_photo"]?>" alt="" width="140px" height="140px" />
						</div>
					</div>
					<div class="rowuser">
						<div>Name</div>&nbsp;&nbsp;&nbsp;&nbsp;
						<div class="inp">
							<?php echo $data["user_name"]?>
						</div>
					</div>
					<div class="rowuser">
						<div>Address</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<div class="inp">
							<?php echo $data["user_address"]?>
						</div>
					</div>
					<div class="rowuser">
						<div>Contact</div>
						<div class="inp">
							<?php echo $data["user_contact"]?>
						</div>
					</div>
					<div class="rowuser">
						<div>Email</div>
						<div class="inp">
							<?php echo $data["user_email"]?>
						</div>
					</div>


					<div class="rowuser">
						<div>District</div>
						<div class="inp">
							<?php echo $data["district_name"]?>
						</div>
					</div>
					<div class="rowuser">
						<div>Place</div>
						<div class="inp">
							<?php echo $data["place_name"]?>
						</div>
					</div>

					<div class="rowuser">
						<div>Password</div>
						<div class="inp">
							<?php echo $data["user_password"]?>
						</div>
					</div>

					<div class="rowuser">&nbsp;
						<div class="inpu">&nbsp;&nbsp;<a href="EditProfile.php">Edit
								Profile</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="Changepassword.php">Change
								Password</a></div>
					</div>

					<!-- <div><button type="submit" name="btn_update">Update</button></div>-->


				</form>

			</div>
		</div>
	</div>
	<?php
              }
          ?>




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