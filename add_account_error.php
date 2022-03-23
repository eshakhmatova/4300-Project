<!DOCTYPE html>
<html>
    <head>
        <title>E-Commerce App</title>
        <link rel="stylesheet" type="type/css" href="stylesheet.css"/>
    </head>

    <body>
    <main>
        <h1>Error Adding Account</h1>
        <p>There was an error adding your account to the database</p>
        <p>Error message: <?php echo $error_message; ?></p>  <!--error_message in add_product.php-->
        <a href="create_account.php">Create a New Account</a>
    </main>
<footer>
	<p class="foot">&copy; <?php echo date("Y"); ?> E-Commerce App</p>
</footer>
</body>
</html>