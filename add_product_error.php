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
                <li> <a href="">About</a></li>
                <li> <a href="">Contact</a></li>
                <li> <a href="account.php">Account</a></li>
            </ul>
        </nav>
        <img src="./images/cart.png" width="30px" height="30px">
    </div>
    <main>
        <h1>Error Adding Product</h1>
        <p>There was an error adding a product to the database</p>
        <p>Error message: <?php echo $error_message; ?></p>  <!--error_message in add_product.php-->
        <a href="add_product_form.php">Add Product</a>
    </main>

</body>

</html>