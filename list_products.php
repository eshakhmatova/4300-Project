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
$query = 'SELECT product.*, category.name AS cat, image.image
            FROM product INNER JOIN category ON category.categoryId = product.categoryId
            INNER JOIN image ON image.type = 0 AND image.typeId = product.productId
            GROUP BY product.name';
$statement = $db->prepare($query);
$statement->execute();
$products = array();
while ($row = $statement->fetch()) {
    //if current logged-in user is creator of product, add to array
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
                <li> <a href="about.html">About</a></li>
                <li> <a href="about.html">Contact</a></li>
                <li> <a href="account.php">Account</a></li>
            </ul>
        </nav>
        <img src="./images/cart.png" width="30px" height="30px">
    </div>

    <div class="container">
        <h1><?php echo $userInfo['userName']; ?>&#8216;s Products</h1>
        <form action="add_product_form.php">
             <button type="submit">Add New Product</button>
        </form>
        <?php foreach ($products as $p) : ?>
            <div class="productListing">
                <div class="productItem">
                    <img src="<?php echo $p['image']; ?>" class="thumbnail">
                </div>
                <div class="productItem">
                    <h3><?php echo $p['name']; ?> </h3>
                    <h5>$<?php echo $p['price']; ?></h5>
                    <form action="edit_product_form.php" method="POST">
                        <input type='hidden' name='productId' value='<?php echo $p['productId']; ?>'>
                        <input type='submit' name='editProduct' value='Edit'>
                    </form>
                </div>
                <div class="productItem">
                    <p><?php echo $p['description']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</body>

</html>