<html>
<head>
<title>untitled document</title>
<?php
if(isset($_POST["btnadd"]))
{
	$a=0;$b=0;$result=0;
	$a=$_POST["txtfnumber"];
	$b=$_POST["txtsnumber"];
	$result=$a+$b;
}
if(isset($_POST["btnsub"]))

{
	$a=0;b=0;$result=0;
	$a=$_POST["txtfnumber"];
	$b=$_POST["txtsnumber"];
	$result=$a-$b;
}
if(isset($_POST["btndiv"]))

{
	$a=0;b=0;$result=0;
	$a=$_POST["txtfnumber"];
	$b=$_POST["txtsnumber"];
	$result=$a/$b;
}
if(isset($_POST["btnmul"]))
{
	$a=0;b=0;$result=0;
	$a=$_POST["txtfnumber"];
	$b=$_POST["txtsnumber"];
	$result=$a*$b;
}
?>
<form method="post">
<table border="1">
<tr>
<td>First number</td>
<td><input type="text" name="first_number"></td>
</tr>
<tr>
<td>Second number</td>
<td><input type="text"name="second_number"></td>
</tr>
<tr>
<td colspan="2" align center>
<input type="submit" name="btnadd" value="+"></td>
</tr>
<tr>
<td colspan="2" align center>
<input type="submit" name="btnsub" value="-"></td>
</tr>
<tr>
<td colspan="2" align center>
<input type="submit" name="btndiv" value="/"></td>
</tr>
<tr>
<td colspan="2" align center>
<input type="submit" name="btnmul" value="*"></td>
</tr>
<tr>
<td>result=<?php echo $sum?></td>
</tr>	
</table>
</form>
</html>