<?php
 session_start();
 $bgrp=$_SESSION["khoon"];
$conn=mysqli_connect("localhost","root","","giet");
$result=mysqli_query($conn,"SELECT * from blood");
    while ($row=mysqli_fetch_assoc($result)) 
	{
		$bloodgroup=$row["bloodgroup"];
		if($bloodgroup==$bgrp)
		{
			$bid=$row["bid"];
			mysqli_query($conn,"delete from blood where bid=$bid");
			break;
		}
	}
	header("refresh:4;stock_.php");
?>

<html>
<head>
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
		<p style="font-size:30px; font-weight:600;"><center><h2>Processing your payment... Don't press back or refresh the page</h2></center></p>
	</div>
	<script>
		document.querySelector('.main p').style.display='none';
		document.querySelector('.main').classList.add('spinner-2');
		setTimeout(()=>{
			document.querySelector('.main').classList.remove('spinner-2');
			document.querySelector('.main p').style.display='block';
		},4000);
	</script>

</body>