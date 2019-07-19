<!DOCTYPE html>
<html lang="en">
<head>
<title>Blood Doner</title>
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
.tag-container
{
    float:none;
    width:100%; 
    height:350px;
    text-align: center;
    position:relative;
}
.tagline {
    position: absolute;
    bottom: 65%;
    left: 65%;
    color:red;
    font-family:Comic Sans MS;
    font-size:40px;
}
</style>
</head>
<body style="margin:0;">
<header style="width:100%; height:55px; float:left; z-index:1; position:fixed; background-color:#ff0000;">
        <img src="logo.jpg" height=55px alt="LOGO" style="margin-left:5%;"><font style="margin-right:20%; color:white; font-size:30px; font-family:Arial; float:right; margin-top:10px;">Donate Blood   &nbsp;&nbsp;Save Life</font>
</header>
<br><br><br>
<div class=tag-container>
    <img src="blood-donation.jpg" height=300px width=100%>
    <div class="tagline">350ml Blood can save<br>4 precious lives!</div>
</div>
<button id="login-button" onclick="document.getElementById('modal-wrapper').style.display='block'" style="width:10%; margin-top:-20px; margin-left:45%; margin-bottom: 20px;">
Register</button>
<div id="modal-wrapper" class="modal">
  
  <form class="modal-content animate" method=post action="stock.php">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
      <img src="giphy.gif" alt="Avatar" class="avatar" height=200px width=200px>
      <h1 style="text-align:center">SignUp</h1>
    </div>

    <div class="container">
      <input type="text" placeholder="Name" name="name" style="width: 90%;padding: 12px 20px;margin: 8px 26px;display:inline-block;border: 1px solid #ccc;box-sizing: border-box;font-size:16px" required>
      <input type="password" maxlength=10 placeholder="Enter Password" name="psd" style="width: 90%;padding: 12px 20px;margin: 8px 26px;display:inline-block;border: 1px solid #ccc;box-sizing: border-box;font-size:16px" required>
      <input type="password" maxlength=10 placeholder="Confirm Password" name="cnfpsd" style="width: 90%;padding: 12px 20px;margin: 8px 26px;display:inline-block;border: 1px solid #ccc;box-sizing: border-box;font-size:16px" required>
      <input type="number" min="100000000000" max="999999999999" placeholder="Enter Aadhar Number" name="aadhar" style="width: 90%;padding: 12px 20px;margin: 8px 26px;display:inline-block;border: 1px solid #ccc;box-sizing: border-box;font-size:16px" required>
      <input type="date" placeholder="Enter Date of Birth" name="dob" style="width: 90%;padding: 12px 20px;margin: 8px 26px;display:inline-block;border: 1px solid #ccc;box-sizing: border-box;font-size:16px" required>
      <select  style="width: 90%;padding: 12px 20px;margin: 8px 26px;display:inline-block;border: 1px solid #ccc;box-sizing: border-box;font-size:16px" name="op" required>
      	<option>--------select--------</option>
        <option value="a+">A+</option>
        <option value="a-">A-</option>
        <option value="b+">B+</option>
      	<option value="b-">B-</option>
        <option value="o-">O-</option>
        <option value="o">O+</option>
        <option value="ab+">AB+</option>
        <option value="ab-">AB-</option>
			</select>
		<select  style="width: 90%;padding: 12px 20px;margin: 8px 26px;display:inline-block;border: 1px solid #ccc;box-sizing: border-box;font-size:16px" name="gender"><option value="m">Male</option><option value="f">Female</option>
			</select>
      <input type="tel" maxlength=10 min="1000000000" placeholder="Enter Phone Number" name="pno" style="width: 90%;padding: 12px 20px;margin: 8px 26px;display:inline-block;border: 1px solid #ccc;box-sizing: border-box;font-size:16px" required>
      
      <button type="submit" value="signup" name="submit" id="login-button" style="border-radius: 5px;">Sign Up</button>
      <input type="checkbox" style="margin:26px 30px;"> Remember me      
      <a href="#" style="text-decoration:none; float:right; margin-right:34px; margin-top:26px;">Forgot Password ?</a>
    </div>
  </form>
</div>

<script>
var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<div style="width:25%; margin:0 auto; height:370px; border:3px solid black; border-radius: 5px;">
    <center style="font-size: 25px; font-weight:700;">User Login</center><br>
    <table align=center cellpadding="2">
    <form method=post action="home.php">
        <tr>
            <td style="font-size:12px; font-weight: 550;">User ID
        </tr>
        <tr>
            <td><input type="number" min=100000000000 max=999999999999 name="aadhar" maxlength=12 placeholder="Enter Aadhar Number" style="width: 100%;display: inline-block;border: 1px solid #ccc;box-sizing: border-box;font-size:14px;"required>
        </tr>
        <tr>
            <td style="font-weight: 550;font-size:12px;">Password
        </tr>
        <tr>
            <td><input type="password" name="pass" maxlength=10 placeholder="Enter Password" style="width: 100%; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;font-size:14px;"required>
        </tr>
       <tr>
        <?php
        if(isset($_POST["submit"]))
        {
            session_start();
            $_SESSION["aadhar"]=$_POST["aadhar"];
            $aad=$_SESSION["aadhar"];
            $password=$_POST["pass"];
            $conn=mysqli_connect("localhost","root","","giet");
            $result=mysqli_query($conn,"SELECT * from login where aadhar='$aad' and password='$password';");
            $data=mysqli_fetch_assoc($result);
            if($data)
            { 
              echo"<center><img src=loading.gif width=330px height30px></center>";  
              echo"<meta http-equiv='refresh' content='3; url=stock_.php'/>;";
            }
            else
               echo"<td><font style='size:2px; color:red;'>Id/Password incorrect</font>";
        }
        ?>
      </tr>
        <tr>
        <td><center><button type="submit" value="login" name="submit" style="border-radius: 5px">Login</button></center>
        </tr>

        <tr>
            <td><a href="#" style="font-size:12px;">Forgot Your Password?
        </tr>
        <tr>
            <td><center><br><img src="giphy.gif" width="150" height="90"></center>
        </tr>
    </form>
    </table>

</div>
</body>
</html>