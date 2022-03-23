<?php
//get all categories into $categories
require_once('database.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>E-Commerce App</title>
	<link rel="stylesheet" href="stylesheet.css">
</head>
<header>
	<h1>Create an Account</h1>
</header>
<main>
	<p>need to add password validation</p>
	<form action="add_account.php" method="post" id="add_account_form">
	<label style="width:400px;">First Name: 
			<input style="margin-left:50px;flex:0 0 130px;" type="text" name="firstName">
        </label>
		<br>
		<label style="width:400px;">Last Name: 
			<input style="margin-left:50px;flex:0 0 130px;" type="text" name="lastName">
        </label>
		<br>
		<label style="width:400px;">Birthdate: 
			<input style="margin-left:50px;flex:0 0 130px;" type="date" name="dob">
        </label>
		<br>
		<label style="width:400px;">Email Address: 
			<input style="margin-left:50px;flex:0 0 130px;" type="text" name="email">
        </label>
		<br>
		<label style="width:400px;">User Name: 
			<input style="margin-left:50px;flex:0 0 130px;" type="text" name="uname">
        </label>
        <br>
        <label style="width:400px">Password:
            <input style="margin-left:50px;flex:0 0 130px;" type="text" name="pword">
		</label>
        <br>
        <input style="padding:0; margin-left:14px; flex:0 0 40px;" type="submit" value="Add">		
	</form>
	<a class="style" href="index.php">Login Page</a>
</main>
<footer>
	<p class="foot">&copy; <?php echo date("Y"); ?> E-Commerce App</p>
</footer>
</html>