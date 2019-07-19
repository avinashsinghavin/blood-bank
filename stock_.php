<html>
<head>
  <title>Blood Bank Management</title>
  <style>
#login-button 
{
    background-color: coral;
    color: white;
    padding: 14px 20px;
    margin: 8px 26px;
    border: none;
    cursor: pointer;
    width: 90%;
    font-size:20px;
    border-radius: 4px;
}
#login-button:hover 
{
    background-color: #ff1a1a;
}

.imgcontainer 
{
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}
.avatar 
{
    width: 200px;
    height:200px;
    border-radius: 50%;
}

.modal 
{
    display:none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}

.modal-content 
{
    background-color: #fefefe;
    margin: 4% auto 15% auto;
    border: 1px solid #888;
    width: 40%; 
  padding-bottom: 30px;
}

.close 
{
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}
.close:hover,.close:focus 
{
    color: red;
    cursor: pointer;
}
.animate 
{
    animation: zoom 0.6s
}
@keyframes zoom 
{
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
  </style>
</head>
<br>
<body><h1 style="text-align:center; font-family: Arial;">Become a Voluantary Donar</h1>
<button id="login-button" onclick="document.getElementById('modal-wrapper').style.display='block'" style="width:10%; margin-top:10px; margin-left:45%; margin-bottom: 20px;">
Donate</button>
<div id="modal-wrapper" class="modal">
  
  <form class="modal-content animate" method=post action="stock_.php">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
      <img src="giphy.gif" alt="Avatar" class="avatar" height=200px width=200px>
      <h1 style="text-align:center">Donate</h1>
    </div>

    <div class="container">
      <font style="margin: 8px 26px; font-size:20px; font-family:arial;">Previous Donation Date
      <input type="date" name="prev" style="width: 90%;padding: 12px 20px;margin: 8px 26px;display:inline-block;border: 1px solid #ccc;box-sizing: border-box;font-size:16px" required>
      <font style="margin: 8px 26px; font-size:20px; font-family:arial;">Option for Donation
      <select  style="width: 90%;padding: 12px 20px;margin: 8px 26px;display:inline-block;border: 1px solid #ccc;box-sizing: border-box;font-size:16px" name="opt">
        <option>Once in 3 months</option>
        <option>Once in 6 months</option>
        <option>Once in 12 months</option>
      </select>
  <font style="margin: 8px 26px; font-size:20px; font-family:arial;">Enter Weight
  <input type="number" placeholder="Enter Weight" name="pno" style="width: 90%;padding: 12px 20px;margin: 8px 26px;display:inline-block;border: 1px solid #ccc;box-sizing: border-box;font-size:16px"
  required>  
      <button type="submit" value="signup" name="submit" id="login-button" style="border-radius: 5px;">Confirm</button>
    </div>
  </form>
</div>

<script>
var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }}
</script>
<?php
 session_start();
    if(isset($_POST["submit"]))
  {
    $prevdondate=$_POST["prev"];
    $today=date("Y-m-d");
    $weight=$_POST["pno"];
    $bloodgroup=0;
    $naam=0;
    $aad=$_SESSION["aadhar"];
    $d=date_diff(date_create($prevdondate),date_create($today))->d;
    if ($weight>60 && $d<90)
    {
        echo "<center><font style='color:white; background-color:green;'> &nbsp;&nbsp;Appointment Booked!&nbsp;&nbsp;</font></center>";
        $conn=mysqli_connect("localhost","root","","giet");
        $result=mysqli_query($conn,"SELECT * from login;");
        while($row=mysqli_fetch_assoc($result))
        {
          if($row["aadhar"]==$aad)
          {
            $bloodgroup=$row["bloodgroup"];
            $naam=$row["name"];
          }
        }
        $_SESSION["sesname"]=$naam;
        mysqli_query($conn,"INSERT INTO blood(aadhar,name,bloodgroup,dod,weight) VALUES($aad,'$naam','$bloodgroup','$today',$weight);");
    }
    else
      echo "<center><font style='color:white; background-color:red;'>&nbsp;&nbsp;*You're Underweighted&nbsp;&nbsp;</font></center>";
  }
?>
<br><br><hr style="height: 12px; border: 0; box-shadow: inset 0 17px 12px -12px rgba(0, 0, 0, 0.5);">
<br>
<p style="font-family: Arial; text-align:center; font-size:30px;">Select blood group to check availibility</p>
<form method=post action=stock_.php>
  <select name=bgrp style="width: 30%;padding: 12px 20px;margin-left: 35%; margin-right:35%;display:inline-block;border: 1px solid #ccc;box-sizing: border-box;font-size:16px" required>
    <option>-----select-----</option>
    <option value="a+">A+</option>
    <option value="b+">B+</option>
    <option value="ab+">AB+</option>
    <option value="o+">O+</option>
    <option value="a-">A-</option>
    <option value="b-">B-</option>
    <option value="ab-">AB-</option>
    <option value="o-">O-</option>
  </select><br><br>
  <center><input type=submit value=Search name=search style="border-radius: 5px; width:10%; height:30px;background-color:coral; font-size:17px;"></center>

</body>
</html>
<?php
  if(isset($_POST["search"]))
  {
    $c=0;
    $_SESSION["khoon"]=$_POST["bgrp"];
    $bgrp=$_SESSION["khoon"];
    $conn=mysqli_connect("localhost","root","","giet");
    $result=mysqli_query($conn,"SELECT * from blood;");
    while($row=mysqli_fetch_assoc($result))
    { $bl=$row["bloodgroup"];
    if ($bgrp==$bl)
      $c=$c+1;
    }
    if($c>0)
    {
      echo "<center><h1><font style='color:white; background-color:green;'>&nbsp; Blood Available <font style='text-transform:uppercase;'>$bgrp</font>&nbsp;</font></h1></center>";
      echo "<center><a href=bookblood.php>BOOK NOW</a></center>";
    }
    else
    echo"<br><br><center><font style='background-color:red;background-color:red;'>&nbsp; Not available &nbsp;</font></center>";
  }
?>