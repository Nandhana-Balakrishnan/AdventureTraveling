
<?php

	    $name="";
		$gender="";
		$department="";
		$total="";
		$percentage="";
		$grade="";
if(isset($_POST["btnSubmit"]))
{   
	$fname=$_POST["txtfname"];
	$lname=$_POST["txtlname"];
	
	$gender=$_POST["gender"];
	
	if($gender=="Male")
	{
		$name="Mr. ".$fname." ".$lname;
	}
	else
	{
		$name="Ms. ".$fname." ".$lname;
	}
	$department=$_POST["ddlDept"];
	
	$a=$_POST["txtm1"];
	$b=$_POST["txtm2"];
    $c=$_POST["txtm3"];
	
	$total=$a+$b+$c;
	$percentage=($total)/3;
	
	if($percentage>=90)
	{
		$grade="A+";
	}
	else if($percentage>=80)
	{
		$grade="A";
	}
	else if($percentage>=70)
	
	{
		$grade="B+";
	}
	else if($percentage>=60)
	{
		$grade="B";
	}
	else if($percentage>50)
	{
		$grade="C+";
	}
	else if($percentage>=40)
	{
		$grade="C";
	}
	else if($percentage>=30)
	{
		$grade="D+";
	}
	else if($percentage>=20)
	{
		$grade="D";
		}
	else
	{
		$grade="D";
	}
}
?>		
		
		



<form method="post" action="">
  <table width="410" border="1">
    <tr>
      <td>First name</td>
      <td><label for="txtfname"></label>
      <input type="text" name="txtfname" id="txtfname"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Last name</td>
      <td><label for="txtlname"></label>
      <input type="text" name="txtlname" id="txtlname"></td>
      <td>&nbsp;</td>
    </tr>
     <tr>
 		<td>Gender</td>
 		<td>
      			<input type="radio" name="gender" value="Male">Male
      			<input type="radio" name="gender" value="Female">Female
  		</td>
	</tr>     
     <tr>
 <td>department</td>
 <td>
     <select name="ddlDept">
       <option value="sel">--select--</option>
       <option value="BCA">BCA</option>
       <option value="BBA">BBA</option>
       <option value="BA">BA</option>
       <option value="BSc">Bsc</option>
     </select>	      
  </td>
</tr>  
 <tr>
 		<td>Mark1</td>
 		<td><input type="text" name="txtm1"></td>
	</tr>  
     <tr>
 		<td>Mark2</td>
 		<td><input type="text" name="txtm2"></td>
	</tr>  
     <tr>
 		<td>Mark3</td>
 		<td><input type="text" name="txtm3"></td>
	</tr>
    <tr>
      <td><input type="submit" name="btnSubmit" id="btnSubmit" value="Submit"></td>
      <td>&nbsp;</td>
    </tr>  
    <tr>
      <td>Name</td>
      <td><?php echo $name?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>gender</td>
      <td><?php echo $gender?></td>
      <td>&nbsp;</td>
    </tr> 
    <tr>
      <td>department</td>
      <td><?php echo $department?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>total mark</td>
      <td><?php echo $total?></td>
      <td>&nbsp;</td>
    </tr> 
    <tr>
      <td>percentage</td>
      <td><?php echo $percentage?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Grade</td>
      <td><?php echo $grade?></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>


    
    
 

 