<?php
session_start();
$aad=$_SESSION["aadhar"];
$name=$_POST["name"];$dod=0;
$disease=$_POST["disease"];
$hospital=$_POST["hospital"];
$today=date("Y-m-d");
$conn=mysqli_connect("localhost","root","","giet");
$result=mysqli_query($conn,"select * from blood");
while($row=mysqli_fetch_assoc($result))
{	
		$dod=$row["dod"];
		$m=date_diff(date_create($dod),date_create($today))->m;
		$y=date_diff(date_create($dod),date_create($today))->y;
   	if ($m>3)
 	{
		mysqli_query($conn,"DELETE from blood where dod='$dod';");
	}
	if ($y>=1)
	{
		mysqli_query($conn,"DELETE from blood where dod='$dod';");
	}
}
$result=mysqli_query($conn,"select * from receivers");
$conn=mysqli_connect("localhost","root","","giet");
	mysqli_query($conn, "INSERT INTO receivers(aadhar,pname,disease,hospital) VALUES('$aad','$name','$disease','$hospital')");
	header("refresh:5;bill.php");
?>

<html>
<head><title>Redirecting to payment gateway</title>
	<style>
			.spinner-3:before
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
			border-top:2px solid coral;
			border-right:2px solid coral;
			border-bottom:2px solid transparent;
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
		<p style="font-size:20px; font-weight:600;"><center>Please wait... Redirecting to payment gateway.</center></p>
	</div>
	<script>
		document.querySelector('.main p').style.display='none';
		document.querySelector('.main').classList.add('spinner-3');
		setTimeout(()=>{
			document.querySelector('.main').classList.remove('spinner-3');
			document.querySelector('.main p').style.display='block';
		},5000);
	</script>

</body>
</html>