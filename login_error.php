<!DOCTYPE html>
<html>
    <head>
        <title>E-Commerce App</title>
        <link rel="stylesheet" type="type/css" href="stylesheet.css"/>
    </head>

    <body>
    <main>
        <h1>Error Logging In</h1>
        <p>There was an error logging in.</p>
        <p>Error message: <?php echo $error_message; ?></p>  <!--error_message in add_product.php-->
        <a href="index.php">Log In</a>
    </main>
<footer>
	<p class="foot">&copy; <?php echo date("Y"); ?> E-Commerce App</p>
</footer>
</body>
</html>