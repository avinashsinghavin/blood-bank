
<!DOCTYPE html>
<html>
<head>
	<title>Singh</title>

</head>
<body bgcolor="#4345">
<h1>Enter The following details given below</h1><hr>
<form method="post" action="singh.php">
<table>
	<tr>
		<td>Enter Name
		<td>:
		<td><input type="text" name="n1" required>
	</tr>
	<tr>
		<td>Select Item
		<td>:
		<td><select  name="op"><option value="12">Hat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$12.00</option><option value="15">T-Shirt&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$15.00</option><option value="30">Sweatshirt&nbsp;&nbsp;&nbsp;$30.00</option>
			</select>
	</tr>
	<tr>
		<td>Enter Quantity
		<td>:
		<td><input type="number" name="q1" required maxlength="">
	</tr>
	<tr>
		<td>Select Customization
		<td>:
		<td><input type="radio" name="cust" value="3" checked>Embroidery $3/item 
	</tr>
	<tr>
		<td>
		<td>
		<td><input type="radio" name="cust" value="5">Screen printing $5/item
	</tr>
	<tr>
		<td colspan="2"><center><div onclick="location.href='singh.php'"><input type=reset value="Reset"></div></center><td><input type="submit" name="submit">
	</tr>
</table>
</form>
<hr>
</body>
</html>

<?php
if(isset($_POST["submit"]))
{
$n=$_POST['n1'];
$i=$_POST['op'];
$q=$_POST['q1'];
$r=$_POST['cust'];
echo "<h1>Welcome <font color=red><b>$n</b></font> You have selected please confirm it</h1>";
echo "<table><tr>";//------------table---
echo "<td>ITEM<td>PRICE";
echo "</tr>";
//-------------------------item and price---------------------
echo "<tr>";
if($i==12)
	echo "<td>HAT<td>$12.00";
if($i==15)
	echo "<td>T-Shirt<td>$15.00";
if($i==30)
	echo "<td>SweatShirt<td> $30.00";
echo "</tr>";
//---------------------------------customization-----------
echo "<tr>";
if($r==5)
	echo "<td>Printing<td>$05.00";
if($r==3)
	echo "<td>Embroidery<td>$03.00";
echo "</tr>";
//------------------------------quantity--------------
echo "<tr>";
echo "<td>Quantity<td>$q";
echo "</tr>";
//----------------------------total------------
$total=($i+$r)*$q;
$total1=($total*0.18)+$total;
echo "<tr><td>Total:<td>$$total.00";
echo "<tr><td>Total with GST:<td>$$total1";
echo "</tr></table>";
}

?>