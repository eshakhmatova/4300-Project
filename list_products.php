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

//loads all of user's products with one image in array
//array includes product id, name, description, category, price, sellbydate (to know if auction), if sold, and image
$query = 'SELECT product.productId, product.userId, product.name, product.description, category.name AS cat, product.price, product.sellByDate, product.sold, image.image
            FROM product INNER JOIN category ON category.categoryId = product.categoryId
            INNER JOIN image ON image.type = 0 AND image.typeId = product.productId
            GROUP BY product.name';
$statement = $db->prepare($query);
$statement->execute();
$products = array();
while ($row = $statement->fetch()) {
    if($row['userId'] == $userId)
        array_push($products, $row);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Goose Egg - <?php echo $userInfo['userName']; ?>&#8216;s Products' </title>
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
                <li> <a href="">About</a></li>
                <li> <a href="">Contact</a></li>
                <li> <a href="account.php">Account</a></li>
            </ul>
        </nav>
        <img src="./images/cart.png" width="30px" height="30px">
    </div>
    <h1><?php echo $userInfo['userName']; ?>&#8216;s Products</h1>
    
    <?php foreach ($products as $p) : ?>
        <div style='border-style: solid; margin:15px;'>
            <img src="<?php echo $p['image']; ?>">
            <h3><?php echo $p['name']; ?> </h3>
            <p><?php echo $p['description']; ?></p>
            <h5>$<?php echo $p['price']; ?></h5>
            <form action="edit_product_form.php" method="POST">
                <input type='hidden' name='productId' value='<?php echo $p['productId']; ?>'>
                <input type='submit' name='editProduct' value='Edit'>
            </form>
        </div>
    <?php endforeach; ?>

</body>

</html>