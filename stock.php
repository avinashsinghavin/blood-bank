<?php
$option=$_POST["submit"]; 
$k=0;
if ($option=='signup')
{
	$name=$_POST["name"];
	$password=$_POST["psd"];
	$con_pass=$_POST["cnfpsd"];
	$aadhar=$_POST["aadhar"];
	$dob=$_POST["dob"];
	$bloodgroup=$_POST["op"];
	$gender=$_POST["gender"];
	$phone=$_POST["pno"];
	$today=date("Y-m-d");
	$diff=date_diff(date_create($dob),date_create($today))->y;
	$conn=mysqli_connect("localhost","root","","giet");
	$result=mysqli_query($conn,"select * from login");
	while($row=mysqli_fetch_assoc($result))
	{
		if($row["aadhar"]==$aadhar)
		{
			echo "your Aadhar number already Avilable".$row["aadhar"];$k=0;break;
		}
		else
			$k=1;
	}
	if($k==1)
	{
		mysqli_query($conn, "INSERT INTO login(name,password,aadhar,dob,gender,bloodgroup,phone) VALUES('$name','$password','$aadhar','$dob','$gender','$bloodgroup','$phone')");
	}
	header("refresh:4;home.php");
}
?>

<html>
<head>
	<style>
		.spinner-1:before
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
			border: 3px solid magenta;
			border-top-color: black;
			animation: spinner 0.7s linear infinite;
		}

		@keyframes spinner
		{
			to{
				transform: rotate(360deg);
			}
		}
	</style>
</head>
<body>
	<div class="main">
		<p style="font-size:30px; font-weight:600;"><center><h3>Please wait... Redirecting to homepage.</h3></center></p>
	</div>
	<script>
		document.querySelector('.main p').style.display='none';
		document.querySelector('.main').classList.add('spinner-1');

		//mimic server req
		setTimeout(()=>{
			document.querySelector('.main').classList.remove('spinner-1');
			document.querySelector('.main p').style.display='block';
		},4000);
	</script>

</body>