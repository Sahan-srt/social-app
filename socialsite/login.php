


<?php  

session_start();

include "con.php";

$loginstatus="Login";
$errorlogin='';




if (isset($_POST['login'])) {
	
	$username=$_POST['uname'];
	$pwd=$_POST['password'];

$query="SELECT * FROM `userDetails` WHERE UserName='$username'and Password='$pwd'";

	$result = mysqli_query($DB,$query) or die(mysqli_error($DB));
	$count=mysqli_num_rows($result);
	$id="SELECT ID FROM `userDetails` WHERE UserName='$username'and Password='$pwd'";

	$result2=mysqli_query($DB,$id)or die(mysqli_error($DB));
	$count2=mysqli_num_rows($result2);
	$row=mysqli_fetch_row($result2);
	$userid=$row[0];

	if ($count==1) {

	$_SESSION['id']=$userid;

		
	 header("Location:myprofile.php");

	}else{

		$errorlogin="login error";


	}


}







?>



<?php include "topcontent.php" 




?>



	<div id="Mcontent">
		<div id="content">
			<form method="POST" action="<?$_SERVER['PHP_SELF']?>">
				
				<input type="text" name="uname" placeholder="username">
				<input type="password" name="password" placeholder="password"><br><br>
				<input type="submit" name="login" value="Login">
				<br><br><a href="signup.php">Signup</a><span style="color:red; "><? echo $errorlogin?></span>



			</form>
		</div>
		<div id="searchbar">
			 
		</div>

	</div>

<?php include "footer.php" ?>