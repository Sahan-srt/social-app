
<?php 

session_start();
include "con.php";
$loginstatus=$logincheckforpost='';
//

if (isset($_SESSION['id'])) {
	$userid=$_SESSION['id'];

$loginname="SELECT*FROM userDetails WHERE ID='$userid' ";
 $lname=mysqli_query($DB,$loginname);

 $rowlog=mysqli_fetch_array($lname); 
 	
 	
$loginstatus="Logged in as:"."<br>".$rowlog["Name"]." <br>";


 






	
}else{

$loginstatus="Login";

}


		




 ?>








			<?php  

			if (isset($_SESSION['id'])) {
				if (isset($_POST['post']) && !empty($_POST['message'])) {
					$msg=$_POST['message'];
					$userid=$_SESSION['id'];
					$pquery="INSERT INTO post(UID,Post) VALUES('$userid','$msg');";
					$DB->query($pquery);
					

				}




			}




			 ?><?php 



			 

				if (!empty($_POST['commentarea']) && isset($_POST["commentpost"])  ) {


							if (isset($_SESSION['id'])) {
								
							

					$cmnt=$_POST['commentarea'];
				$post_id=$_POST['id'];
				$userid=$_SESSION['id'];
				$cquery="INSERT INTO comment(PID,userId,comment) VALUES('$post_id','$userid','$cmnt');";
					$DB->query($cquery);
					
				}
				}




			





			  ?>





<?php  

include 'topcontent.php';

?>








	<div id="Mcontent">
		<div id="content">
			<div id="status">


			

			<form method="POST">
				
				<textarea id="text" name="message"  placeholder="What is on your mind?"></textarea>

				<input id="picture" name="photoup" value="add photo" type="file">
				
				<input id="post" type="submit" name="post" value="post"><span style="color:red;"><?echo $logincheckforpost?></span>
			
			</form>

			</div>
			<div id="feeds">
				<div id="posts" style="">

					<?php   $getpost="SELECT* FROM post,userDetails WHERE UID=ID " or die(mysqli_error()); 
							

						



							$postres=mysqli_query($DB,$getpost);
					while ($row=mysqli_fetch_array($postres)) {
						$id=$row['PostId'];
					?>


					<br><div id="" style="border:1px solid gray;"> <?php echo 'Posted by:'.$row['Name']."<br>".$row['Post']; ?>

						<br><br>


						
					
						


					

					<div id="comment" style="float:right;">
						
						<form method="POST">
							

							<input type="hidden" name="id" value="<?php echo $id; ?>">
							<input type="hidden" name="cid" value="<?php echo $cid; ?>">
							<textarea name="commentarea" placeholder="comments">  </textarea>
							<input type="submit" name="commentpost" value="comment">




						</form>
						</div>

						<?php $comment=("SELECT * from comment where PID='$id' ")or die(mysqli_error());
						$comquery=mysqli_query($DB,$comment);

				



	while($comment_row=mysqli_fetch_array($comquery)){ 

    $cid=$comment_row['userId'];

		?>

	               
 


			





	<?php 


		    
						 $commentidout="SELECT * FROM userDetails WHERE ID='$cid' " or die(mysqli_error());

						$comoutquery=$DB->query($commentidout);

while($crow=mysqli_fetch_array($comoutquery)){



						 	   
	

?>

	
	<div style="color:white;">	    			


	<? echo "commented by:".$crow['Name']."<br>".$comment_row['Comment']; }?>   <br><br>
	<div style="float: center;"><form method="POST"><input style="border:0px solid;" type="submit" name="remove" value="remove"></form>
</div>
</div>




	
	<?php } ?>
	

					</div>




						<?php } ?>

			</div>

			





</div>
		</div>
		<div id="searchbar">
			
			 <input id="search" type="text" name="search" placeholder="Search.."> 
		</div>

	</div>

	<?php include 'footer.php'; ?>