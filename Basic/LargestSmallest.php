<?php

		$large="";
		$small="";
		
		if(isset($_POST["btnSubmit"]))
		{
			$a=$_POST["txtno1"];
			$b=$_POST["txtno2"];
			$c=$_POST["txtno3"];
			
			if($a>$b)
			{
				$temp=$a;
			}
			else
			{
				$temp=$b;
			}
			if($temp>$c)
			{
				$large=$temp;
			}
			else
			{
				$large=$c;
			}
			
			if($a<$b)
			{
				$temp=$a;
			}
			else
			{
				$temp=$b;
			}
			if($temp<$c)
			{
				$small=$temp;
			}
			else
			{
				$small=$c;
			}
		}





?>



<form name="form1" method="post" action="">
  <table width="410" border="1">
    <tr>
      <td>Number-1</td>
      <td><label for="txtno1"></label>
      <input type="text" name="txtno1" id="txtno1"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Number-2</td>
      <td><label for="txtno2"></label>
      <input type="text" name="txtno2" id="txtno2"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Number-3</td>
      <td><label for="txtno3"></label>
      <input type="text" name="txtno3" id="txtno3"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btnSubmit" id="btnSubmit" value="Submit"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Largest</td>
      <td><?php echo $large?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Smallest</td>
      <td><?php echo $small?></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
