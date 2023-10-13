<?php 
include("../Assets/Connection/connection.php");  
include("Header.php");
if(isset($_POST["txt_send"])) 
{
	$title=$_POST["txt_title"];
  $content=$_POST["txt_content"]; 
  $insqry="insert into tbl_complaint(complaint_title,complaint_content,user_id)values('".$title."','".$content."','".$_SESSION['uid']."')"; 
  if($conn->query($insqry)) 
  { 
      ?> 
      <script> 
          alert("sended"); 
          </script> 
          <?php 
} 
else 
{ 
    ?> 
    <script> 
    alert("failed"); 
    </script> 
    <?php 
} 
} 
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Document</title> 
</head> 
<body>

<form method="POST"  align="center" action=""> 
        <table border="2">
         <tr> 
                <td>Title</td> 
                <td><input type="text" name="txt_title"></td> 
            </tr> 
     
        <tr> 
                <td>Content</td> 
                <td><input type="text" name="txt_content"></td> 
            </tr> 
    
             
            <tr> 
              <td colspan="2" align="center"> 
                    <input type="submit" name="txt_send" value="Send">
                    <input type="submit" name="btncancel" id="btncancel" value="Cancel"></td> 
                  
          </tr> 
</table> 
</form> 
</body> 
</html>
<?php 
include("Footer.php");
?>
