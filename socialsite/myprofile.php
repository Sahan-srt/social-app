<?php 




session_start();

include "con.php";
$loginstatus='';

if (isset($_SESSION['id'])) {
	$loginstatus="LoggedIn";
}else{

$loginstatus="Login";

}




if(!isset($_SESSION['id'])){

	header("Location:login.php");

}else{
$uid=$_SESSION["id"];

if($_SERVER["REQUEST_METHOD"]=="POST"){

			$msg=$_POST["message"];
    

if(!empty($_POST['message'])){
$into="INSERT INTO `webAs`.`post`(`PostId`,`UID`,`Post`)VALUES(NULL,'$uid','$msg'); ";

		$DB->query($into);
}

}



}




 ?>


<?php include "topcontent.php" 



?>

	<div id="Mcontent">
		<div id="content">
		
			<img src="images/profile1.jpg">
			<form method="POST" action="<? $_SERVER['PHP_SELF'];?>">
				
				<textarea id="text" name="message"  placeholder="What is on your mind?"></textarea>

				<button id="picture" type="button" >Add Photo</button>
				
				<input id="post" type="submit" name="submit" value="post">
			</form>
			<div>
				
				<?php 


			


				$posting="SELECT * FROM post,userDetails WHERE ID=UID";

				$postingresult =mysqli_query($DB,$posting);
				
				$count=mysqli_num_rows($postingresult);
			    

				
				while($row=$postingresult->fetch_assoc()) {


					if($uid==$row["ID"]){

					echo $row["Post"];
					
					echo "<br>"."


							<form>
					<input id='comments' type='text' name='search' placeholder='comments..'>
					<input name='comments' type='submit'value='Add Comment'>

					<input name='removec' value='remove' type='submit'>
										</form>




					 ";
					
				


					echo "<br><br><br><br>";
				
				 	
				}

			}







				?>



			</div>


		</div>
		<div id="searchbar">
			 
			<h5>Reasent post</h5>
			


		</div>

	</div>

<?php include "footer.php" ?>