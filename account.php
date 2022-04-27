<?php
//get all categories into $categories
require_once('database.php');
session_start();

//gets user's username from login page start SESSION
$userId = $_SESSION['userID'];
$queryUser = 'SELECT * FROM users WHERE userId = :userId';
$statement1 = $db->prepare($queryUser);
$statement1->bindValue(':userId', $userId);
$statement1->execute();
$userInfo = $statement1->fetch();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Goose Egg - <?php echo $userInfo['userName']; ?> </title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
</head>

<body>
    <div class="navbar">
        <div class="logo">
            <img src="./images/logo.png" width="100px">
        </div>
        <nav>
            <ul>
                <li> <a href="website.php">Home</a></li>
                <li> <a href="list_products.php">Products</a></li>
                <li> <a href="about.html">About</a></li>
                <li> <a href="contact.html">Contact</a></li>
                <li> <a href="account.php">Account</a></li>
            </ul>
        </nav>
        <img src="./images/cart.png" width="30px" height="30px">
    </div>
    <h1>Edit Your Account</h1>
    <form action="edit_account.php" method="post" id="account">
	<label style="width:400px;">First Name: 
			<input style="margin-left:50px;flex:0 0 130px;" type="text" name="firstName" value='<?php echo $userInfo['firstName']?>'>
        </label>
		<br>
		<label style="width:400px;">Last Name: 
			<input style="margin-left:50px;flex:0 0 130px;" type="text" name="lastName" value='<?php echo $userInfo['lastName']?>'>
        </label>
		<br>
		<label style="width:400px;">Birthdate: 
			<input style="margin-left:50px;flex:0 0 130px;" type="date" name="dob" value='<?php echo $userInfo['dob']?>'>
        </label>
		<br>
		<label style="width:400px;">Email Address: 
			<input style="margin-left:50px;flex:0 0 130px;" type="text" name="email" value='<?php echo $userInfo['email']?>' readonly>
        </label>
		<br>
		<label style="width:400px;">User Name: 
			<input style="margin-left:50px;flex:0 0 130px;" type="text" name="uname" value='<?php echo $userInfo['userName']?>'>
        </label>
        <br>
        <label style="width:400px">Password:
            <input style="margin-left:50px;flex:0 0 130px;" type="password" name="pword">
		</label>
		<br>
		<label style="width:400px">Re-enter Password:
            <input style="margin-left:50px;flex:0 0 130px;" type="password" name="pwordValidation">
		</label>
        <br>
        <input style="padding:0; margin-left:14px; flex:0 0 40px;" type="submit" value="edit">		
	</form>

</body>

</html>