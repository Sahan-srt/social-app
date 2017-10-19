<?php 



 ?>

<!DOCTYPE html>
<html>
<head>

	<title>Nbloger</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
<dir id="wholebody">
	
<div id="mainwrap">
	<div id="top">
	<div id="logobar">
<a href="home.php">Logo</a>

	</div>

	<div id="navbar">

		<li class="list">
			
			<a class="navhead" href="home.php">Home</a>
			<a class="navhead" href="myprofile.php">MyProfile</a>
	

		</li>
		
	</div>
	<div id="login">
		<a  href="login.php"><?

		echo $loginstatus;

		?></a>
		<a  href="logout.php">Logout</a>
	</div>
	</div>