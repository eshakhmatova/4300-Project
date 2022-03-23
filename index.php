<?php
//get all categories into $categories
require_once('database.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>E-Commerce App - Login</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <main>
     <form action="login.php" method="post">
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>User Name</label>
        <input type="text" name="uname" placeholder="User Name" required><br>
        <label>Password</label>
        <input type="password" name="pword" placeholder="Password" required><br> 
        <button type="submit">Login</button><br><br>
        <a href="create_account.php">Create an Account</a>
     </form>
    </main>
</body>
</html>