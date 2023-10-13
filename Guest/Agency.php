<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event agency</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="../Assets/Template/Form/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../Assets/Template/Form/css/style.css">
</head>
<body>

<?php
include("../Assets/Connection/connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;	
if(isset($_POST["btn_save"]))
{
	$name=$_POST["txtname"];
	$address=$_POST["txtadd"];
	$contact=$_POST["txtcont"];
	$email=$_POST["txtemail"];
	$place=$_POST["sel_place"];
	

	$password=$_POST["txtpass"];
	
	$proof=$_FILES["fileproof"]["name"];
	$temp1= $_FILES["fileproof"]["tmp_name"];
	$photo=$_FILES["filephoto"]["name"];
	$temp=$_FILES["filephoto"]["tmp_name"];
	
	move_uploaded_file($temp1,"../Assets/Files/UserProof/".$proof);
	move_uploaded_file($temp,"../Assets/Files/UserPhoto/".$photo);
	
	  $insQry= $insQry="insert into tbl_agency(agency_name,agency_address,agency_contact,agency_email,place_id,agency_logo,agency_proof,agency_password)values('".$name."','".$address."','".$contact."','".$email."','".$place."','".$photo."','".$proof."','".$password."')";
		if($conn->query($insQry))
		{
      require '../Assets/phpMail/src/Exception.php';
	require '../Assets/phpMail/src/PHPMailer.php';
	require '../Assets/phpMail/src/SMTP.php';


    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'adventurotravelling@gmail.com'; // Your gmail
    $mail->Password = 'zxusblndieellzxi'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('adventurotravelling@gmail.com'); // Your gmail
  
    $mail->addAddress($email);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Successfully Registered";
    $mail->Body = "Hello ".$name.",You are successfully registered in our Adventuro travelling .From this time,your's issues are our own problem too.And also explore our products.Thank you.";
  if($mail->send())
  {
    ?>
    <script>
	window.location="Login.php";
    </script>
    <?php
  }
  else
  {
    echo "Failed";
  }
		
		}
	
}
?>

    <div class="main">

        <div class="container">
            <form method="POST" class="appointment-form" enctype="multipart/form-data" id="appointment-form">
                <h2>Agency Registration</h2>
                <div class="form-group-1">
                    <input type="text" name="txtname" id="txtname" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" required placeholder="Enter your name" />
                    <input type="text" name="txtadd" required placeholder="Enter your address">
                    <input type="number" name="txtcont" pattern="[7-9]{1}[0-9]{9}" 
                title="Phone number with 7-9 and remaing 9 digit with 0-9" required placeholder="Enter your contact" />

                    <input type="email" name="txtemail" required  placeholder="Enter your email" />
                   
                    <input type="password" name="txtpass"  required  placeholder="Enter your password" /> <!--Password -->
            
                    <div class="select-list">
                         <select name="sel_district" id="sel_district"  onchange="getplace(this.value)">
			<option>select District</option>
			<?php
			$selQry1="select * from tbl_district";
			$result=$conn->query($selQry1);
			while($rows=$result->fetch_assoc())
			{
			?>
			<option value="<?php echo ($rows['district_id']);?>"><?php echo ($rows['district_name']);?></option>
			<?php
			}
			?>
		  </select>
                    </div>
                </div>
                <div class="form-group-2">
                   
                    <div class="select-list">
                        <select name="sel_place" id="sel_place" >
			<option>select Place</option>
			
		  </select>
          
          <h3>Upload Photo</h3>
          <input type="file" name="filephoto"  required /> <!--Photo -->
         
		  <h3>Upload Proof</h3>
          <input type="file" name="fileproof"  required   />  
                    </div>
                </div>
               
                <div class="form-submit">
                    <input type="submit" name="btn_save" id="submit" class="submit" value="Save" />
                </div>
            </form>
        </div>

    </div>

    <!-- JS -->
    <script src="../Assets/Template/Form/vendor/jquery/jquery.min.js"></script>
    <script src="../Assets/Template/Form/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getplace(did)
	{
		$.ajax({
			url: "../Assets/AjaxPages/Ajaxplace.php?pid=" + did,
			success: function(html) {
			
				$("#sel_place").html(html);
	
			}
		});
	}
</script>
</html>