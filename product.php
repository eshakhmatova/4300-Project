<?php
//get all categories into $categories
require_once('database.php');
//session_start();

//loads product information
$productId = $_SESSION['productId'];
$queryProduct = 'SELECT * FROM product WHERE productId = :productId';
$statement = $db->prepare($queryProduct);
$statement->bindValue(':productId', $productId);
$statement->execute();
$productInfo = $statement->fetch();

//loads all associated image in array
$query = 'SELECT * FROM image WHERE typeId = :typeId';
$statement = $db->prepare($query);
$statement->bindValue(':typeId', $productId);
$statement->execute();
$image = array();
while ($row = $statement->fetch()) {
    array_push($image, $row['image']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Goose Egg - <?php echo $productInfo['name']; ?> </title>
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
    <?php foreach ($image as $i): ?>
        <img src="<?php echo $i; ?>">
    <?php endforeach; ?>
    <h1><?php echo $productInfo['name']; ?><h1>
    <h3>$<?php echo $productInfo['price']; ?></h3>
    <p><?php echo $productInfo['description']; ?></p>

</body>

</html>