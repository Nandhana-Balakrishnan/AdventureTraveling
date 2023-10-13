<title>Login</title>
<link rel="icon" href="../Assets/Template/logo.png">
<?php 
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_POST['btnlogin']))
{
	$email=$_POST['txtemail'];
	$pw=$_POST['txtpassword'];
	$selUser="select * from tbl_user where user_email='".$email."' and user_password='".$pw."'";
	$selAdmin="select * from tbl_admin where admin_email='".$email."' and admin_password='".$pw."'";
	$selAgency="select * from tbl_agency where agency_email='".$email."' and agency_password='".$pw."' and agency_status=1";
	
	
	$resUser=$conn->query($selUser);
	$resAdmin=$conn->query($selAdmin);
	$resAgency=$conn->query($selAgency);

	if($resUser->num_rows>0)
	{
		$row=$resUser->fetch_assoc();
		$_SESSION['uid']=$row['user_id'];
		$_SESSION['uname']=$row['user_name'];
    $_SESSION["email"]=$row['user_email'];
		header("location:../User/Homepage.php");
	}
	else if($resAdmin->num_rows>0)
	{
		$row=$resAdmin->fetch_assoc();
		$_SESSION['aid']=$row['admin_id'];
		$_SESSION['aname']=$row['admin_name'];
		header("location:../Admin/Homepage.php");
	}
	else if($resAgency->num_rows>0)
	{
		$row=$resAgency->fetch_assoc();
		$_SESSION['agid']=$row['agency_id'];
		$_SESSION['agname']=$row['agency_name'];
		header("location:../Agency/Homepage.php");
	}
}

?>

<style>
  html {
    height: 100%;
  }
  body {
    margin:0;
    padding:0;
    font-family: sans-serif;
    background: linear-gradient(#141e30, #243b55);
  }
  
  .login-box {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 400px;
    padding: 40px;
    transform: translate(-50%, -50%);
    background: rgba(0,0,0,.5);
    box-sizing: border-box;
    box-shadow: 0 15px 25px rgba(0,0,0,.6);
    border-radius: 10px;
  }
  
  .login-box h2 {
    margin: 0 0 30px;
    padding: 0;
    color: #fff;
    text-align: center;
  }
  
  .login-box .user-box {
    position: relative;
  }
  
  .login-box .user-box input {
    width: 100%;
    padding: 10px 0;
    font-size: 16px;
    color: #fff;
    margin-bottom: 30px;
    border: none;
    border-bottom: 1px solid #fff;
    outline: none;
    background: transparent;
  }
  .login-box .user-box label {
    position: absolute;
    top:0;
    left: 0;
    padding: 10px 0;
    font-size: 16px;
    color: #fff;
    pointer-events: none;
    transition: .5s;
  }
  
  .login-box .user-box input:focus ~ label,
  .login-box .user-box input:valid ~ label {
    top: -20px;
    left: 0;
    color: #03e9f4;
    font-size: 12px;
  }
  
  .login-box form button {
    position: relative;
    display: inline-block;
    padding: 10px 20px;
    color: #03e9f4;
    font-size: 16px;
    text-decoration: none;
    text-transform: uppercase;
    overflow: hidden;
    transition: .5s;
    margin-top: 40px;
    letter-spacing: 4px;
    background-color: transparent;
    
  }
  
  .login-box button:hover {
    background-color: #03e9f4;
    color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 5px #03e9f4,
                0 0 25px #03e9f4,
                0 0 50px #03e9f4,
                0 0 100px #03e9f4;
  }
  
  .login-box button span {
    position: absolute;
    display: block;
  }
  
  .login-box button span:nth-child(1) {
    top: 0;
    left: -100%;
    width: 100%;
    height: 2px;
    background: linear-gradient(90deg, transparent, #03e9f4);
    animation: btn-anim1 1s linear infinite;
  }
  
  @keyframes btn-anim1 {
    0% {
      left: -100%;
    }
    50%,100% {
      left: 100%;
    }
  }
  
  .login-box button span:nth-child(2) {
    top: -100%;
    right: 0;
    width: 2px;
    height: 100%;
    background: linear-gradient(180deg, transparent, #03e9f4);
    animation: btn-anim2 1s linear infinite;
    animation-delay: .25s
  }
  
  @keyframes btn-anim2 {
    0% {
      top: -100%;
    }
    50%,100% {
      top: 100%;
    }
  }
  
  .login-box button span:nth-child(3) {
    bottom: 0;
    right: -100%;
    width: 100%;
    height: 2px;
    background: linear-gradient(270deg, transparent, #03e9f4);
    animation: btn-anim3 1s linear infinite;
    animation-delay: .5s
  }
  
  @keyframes btn-anim3 {
    0% {
      right: -100%;
    }
    50%,100% {
      right: 100%;
    }
  }
  
  .login-box button span:nth-child(4) {
    bottom: -100%;
    left: 0;
    width: 2px;
    height: 100%;
    background: linear-gradient(360deg, transparent, #03e9f4);
    animation: btn-anim4 1s linear infinite;
    animation-delay: .75s
  }
  
  @keyframes btn-anim4 {
    0% {
      bottom: -100%;
    }
    50%,100% {
      bottom: 100%;
    }
  }
</style>




<div class="login-box">
  <div style="display: flex;justify-content:center"><img src="../Assets/Template/logo.png" width="150" height="150"></div>
  
  <form method="post">
    <div class="user-box">
      <input type="text" name="txtemail" required="" autocomplete="off">
      <label>Email/UserName</label>
    </div>
    <div class="user-box">
      <input type="password" name="txtpassword" required="" autocomplete="off">
      <label>Password</label>
    </div>
    <button type="submit" name="btnlogin" style="border:none;">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Submit
    </button>
    <br><br><br>
    <div class="user-box">
      <a href="#" style="text-decoration: none;color: whitesmoke;">forgotpassword</a>
      
    </div>
  </form>
</div>