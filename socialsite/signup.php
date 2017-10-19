<?php 

include "con.php";

$error="";

$loginstatus="Login";
if (isset($_POST["signup"])) {
		

		if (!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['uname']) and !empty($_POST['password'])) {


			$name=$_POST['name'];
			$uname=$_POST['uname'];
			$email=$_POST['email'];
			$pass=$_POST['password'];

			$into="INSERT INTO `webAs`.`userDetails`(`Name`,`UserName`,`Password`,`Email`)VALUES('$name','$uname','$pass','$email'); ";

		$DB->query($into);
		header("Location:home.php");



			
		}else{



			$error="fill all the details:";
		}



}





 ?>

<?php include "topcontent.php" ?>



	<div id="Mcontent">
		<div id="content">
			<form method="POST" action="">
				
				<input type="text" name="name" placeholder="Your_name">

				

				<input type="text" name="email" placeholder="Email">
				<input type="text" name="uname" placeholder="user_name">
				<input type="password" name="password" placeholder="password"><br><br>
				<input type="submit" name="signup" value="signup"><span><?echo $error;?></span>
			



			</form>
		</div>
		<div id="searchbar">
			 
		</div>

	</div>

<?php include "footer.php" ?>