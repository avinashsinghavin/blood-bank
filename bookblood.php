<html>
<head>
	<title>Book Blood</title>
	<style>
	.spinner-2:before
    {
      content:"";
      box-sizing: border-box;
      position: absolute;
      top:50%;
      left: 50%;
      height: 60px;;
      width: 60px;
      margin-top: -30px;
      margin-left: -30px;
      border-radius: 50%;
      border: 4px solid transparent;
      border-top-color: coral;
      border-bottom-color:coral;
      animation: spinner 0.7s ease infinite;
    }

</style>
</head>
<body>
	<center><h1>Verify the patient Details<?php session_start(); echo "<br><center>Blood Group<font style='text-transform:uppercase;'>(".$_SESSION['khoon'].")</font></center>";  ?></h1></center><br><br>
<center>
<table>
<form method=post action=book.php>
<tr>
	<td><font style="margin: 8px 26px; font-size:20px; font-family:arial;">Enter patient's name</font>
	<td>: 
	<td><input type="text" name="name" placeholder="Enter Patient's Name" style="width: 100%;padding: 12px 20px;display:inline-block;border: 2px solid #ccc;box-sizing: border-box;font-size:16px" required>
</tr>
<tr>
	<td><font style="margin: 8px 26px; font-size:20px; font-family:arial;">Enter patient's disease</font>
	<td>: 
	<td><input type="text" name="disease" placeholder="Enter Patient's disease" style="width: 100%;padding: 12px 20px;display:inline-block;border: 2px solid #ccc;box-sizing: border-box;font-size:16px" required>
</tr>
<tr>
	<td><font style="margin: 8px 26px; font-size:20px; font-family:arial;">Hospital admitted
	<td>: 
	<td><input type="text" name="hospital" placeholder="Hospital admitted" style="width: 100%;padding: 12px 20px;display:inline-block;border: 2px solid #ccc;box-sizing: border-box;font-size:16px" required>
</tr>
<tr>
	<td>
<td></center>
 <br><br><center><button type="submit" style="border-radius: 1px; width:150%; background-color: coral;">Confirm</button></center>
</tr>
</form>
</table>
</body>
</html>
