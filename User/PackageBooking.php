<?php
ob_start();
include("Header.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;	
//session_start();
include("../Assets/Connection/Connection.php") ;
if(isset($_POST["btnBook"]))
{
    $ins="insert into tbl_packagebooking(user_id,package_id,booked_date,booking_date,noofpersons)values('".$_SESSION["uid"]."','".$_GET["pid"]."',curdate(),'".$_POST["txtDate"]."','".$_POST["passengers"]."')";
    if($conn->query($ins))
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
      
        $mail->addAddress($_SESSION["email"]);
      
        $mail->isHTML(true);
      
        $mail->Subject = "Successfully Sen Request";
        $mail->Body = "Hello ".$_SESSION["uname"].",You are successfully send request To a Agency in our Adventuro travelling .Wait For the Further Updates FromThe Agency .Thank you.";
      if($mail->send())
      {
        ?>
        <script>
        window.location="Homepage.php";
        </script>
        <?php
      }
      else
      {
        echo "Failed";
      }
    }
    
}
$sel="select * from tbl_package p inner join tbl_agency a on a.agency_id=p.agency_id where p.package_id='".$_GET["pid"]."'";
$data=$conn->query($sel);
$row=$data->fetch_assoc();
?>
<head>
    <style>
    #tab {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        width: 60%; /* Set the desired width of the container */
  margin: 0 auto; /* Center the container on the page */
  background-color: #f7f7f7; /* Set the background color */
  padding: 20px; /* Add some padding around the content */
  border: 1px solid #ccc; /* Add a border around the container */
  border-radius: 5px; /* Round the corners of the container */
       
      }
      
      
      #tab td, #tab th {
        
        padding: 8px;
        color: black;
      }
      #tab a {
      
       color:#06F;
      }
      
      
      #tab th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: rgb(16, 5, 92);
        color: white;
      
      }
      input[type=text],[type=password],[type=email],[type=number], select {
        width: 80%;
        height: 40%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid rgb(7, 21, 72);
        border-radius: 10px;
        box-sizing: border-box;
      }
      input[type=date]
      {
        width: 100%;
        height: 40%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid rgb(7, 21, 72);
        border-radius: 10px;
        box-sizing: border-box; 
      }
      

            input[type=submit] {
              width: 20%;
              background-color: rgb(7, 21, 72);
              color: white;
              padding:  15px;
              margin: 4px 0;
              border: none;
              border-radius: 30px;
              cursor: pointer;
              margin-left: 40%;
            }
           
            input[type=submit]:hover {
              background-color: #900;
            }
            input[type=reset]:hover {
              background-color: #900;
            }
            </style>
</head>
<body>

    
    <div id="tab">
        <div style="text-align: center;">
            <h3><b>Fill the Details for Booking</b></h3><br>
        </div>  
    <form action="" method="post">
    
        <table>
            <tr>
                <td>
                    <p style="color: #900;">Package Name:</p>
                </td>
                <td>
                   <p> <?php echo $row["package_name"]?></p>
                </td>
                <td>
                    <p style="color: #900;"> Agency Name:</p>
                </td>
                <td>
                    <p><?php echo $row["agency_name"]?></p>
                </td>
            </tr>
            <tr>
                <td><p style="color: #900;">Locations</p></td>
                <td>
                    <p><?php echo $row["package_destination"]?></p>
                </td>
                <td><p style="color: #900;">Duration</p></td>
                <td>
                   <p> <?php echo $row["days"]?> Days and <?php echo $row["nights"]?> Nights</p>
                </td>
            </tr>
            <tr>
                <td> <p style="color: #900;">Package Rate</p></td>
                <td>
                    <p><?php echo $row["package_rate"]?> Rs</p>
                </td>
                <td><p style="color: #900;">Booking Amount</p></td>
                <td><p><?php echo $row["package_rate"]*.25 ?> Rs</p></td>
            </tr>
            <tr>
                <td><p style="color: #900;">Number of Passengers</p></td>
                <td><p><input type="number" name="passengers" id="" min="1" max="<?php echo $row["package_persons"]?>" required value="1"></p></td>
                <td><p style="color: #900;">Journey Start location</p></td>
                 <td>
                       <p> <input type="text" name="txtLoc" id="" autocomplete="off" required placeholder="Enter Location" title="Please enter a valid input" ></p>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <p style="color: #900;">For Date </p>
                </td>
                <td>
                   <p><input type="date" name="tdate" id="txtDate" required></p> 
                </td>
            </tr>
                
                
                <tr>
                    <td colspan="2">
                        <p style="color: #900;">  <input type="checkbox" name="check" id="" required>I agreed to the <a href="{% url 'User:terms' %}">terms and conditions</a></p>
                    </td>
                </tr>
            
                <tr>
                    <td colspan="5">
                        <input type="submit"  name="btnBook" value="Book Now">
                    </td>
                </tr>
        </table>
    </form>
    
    
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(function () {
        console.log("haii")
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;


        console.log(maxDate);
        $('#txtDate').attr('min', maxDate);
    });
</script>


<?php
include("Footer.php");
ob_flush(); 
?>
