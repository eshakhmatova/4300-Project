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
                <li> <a href="">Products</a></li>
                <li> <a href="">About</a></li>
                <li> <a href="">Contact</a></li>
                <li> <a href="account.php">Account</a></li>
            </ul>
        </nav>
        <img src="./images/cart.png" width="30px" height="30px">
    </div>
    <h1><?php echo $userInfo['userName']; ?>&#8216;s Profile<h1>
    
    <a href='add_product_form.php'>List a Product</a>

</body>

</html>