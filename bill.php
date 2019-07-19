<?php
session_start();
$bgrp=$_SESSION["khoon"];
$aad=$_SESSION["aadhar"];
$cost=0;
	if ($bgrp="a+"||$bgrp="a-")
		$cost=500;
	if ($bgrp="b+"||$bgrp="b-")
		$cost=700;
	if ($bgrp="ab+"||$bgrp="ab-")
		$cost=1500;
	if ($bgrp="o+"||$bgrp="o-")
		$cost=1000;
	$conn=mysqli_connect("localhost","root","","giet");
	$receive=mysqli_query($conn,"SELECT * FROM receivers");
	while ($row=mysqli_fetch_assoc($receive)) 
	{
		$aadhar=$row["aadhar"];
		$name=$row["pname"];
		$disease=$row["disease"];
		$hospital=$row["hospital"];
		if($aadhar==$aad)
		{
			$tabname=$name;
			$tabdisease=$disease;
			$tabhospital=$hospital;
			$aadhar1=$aadhar;
		}
	}
	$total=$cost+(0.14*$cost);
	echo "<br><center><h2>You will receive a copy of bill, click on 'Pay' to continue</h2></center><br><br><center><table style='border:1px solid black;' cellspacong=5 cellpadding=5>
			<tr bgcolor=#005c99 style='color:white; text-align:center;'>
				<td><b>Aadhar &nbsp;&nbsp;&nbsp;&nbsp;</b><td><b>Patient Name&nbsp;&nbsp;&nbsp;&nbsp;</b><td><b>Disease&nbsp;&nbsp;&nbsp;&nbsp;</b><td><b>Hospital&nbsp;&nbsp;</b>
			</tr>
			<tr bgcolor=#ccebff>
				<td>$aadhar1 &nbsp;&nbsp;&nbsp;&nbsp;<td>$tabname&nbsp;&nbsp;&nbsp;&nbsp;<td>$tabdisease&nbsp;&nbsp;&nbsp;&nbsp;<td>$tabhospital&nbsp;&nbsp;&nbsp;&nbsp;
			</tr>
			<tr bgcolor=#ccebff>
				<td colspan=3>Total Including GST 14%<td>Rs. $total
			</tr>
		</table>
		<form class='modal-content animate' method=post action='pay.php'><br>
		<button type='submit' value='Pay' name='Pay' id='login-button' style='border-radius: 10px; width:10%; height:30px;'>Pay &nbsp;&nbsp;(Rs.: $total)</button>
		</form></center>
	";

?>                                    