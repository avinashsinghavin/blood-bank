	<?php
	session_start();

          if(isset($_POST["submit"]))
          {
            $aadhar=$_POST["aadhar"];
            $password=$_POST["pass"];
            $conn=mysqli_connect("localhost","root","","giet");
            $result=mysqli_query($conn,"SELECT * from login where aadhar='$aadhar' and password='$password';");
            $data=mysqli_fetch_assoc($result);
            if($data)
            {
              header('location:stock_.php');
	    }
            else
            {
              ?>
		<script type="text/javascript">
			alert("wrong");
		</script>

		<?php
		header("refresh:0;url=home.php");
            }
          }
        ?>