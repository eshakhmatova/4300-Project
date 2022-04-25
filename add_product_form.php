<?php 
//retrieves all categories in database
require('database.php');
session_start();
$query = 'SELECT * FROM category ORDER BY categoryId';
$statement = $db->prepare($query);
$statement->execute();
$categories= $statement->fetchAll();
$statement->closeCursor();
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

    <h1>List a Product</h1>
    <form action = "add_product.php" method="post" id="add_product_form" enctype="multipart/form-data">
        <label> Product Images:
            <input type="file" id="chooseFile" name = "imageFile[]" multiple>
        </label>
        <div class="imgGallery">
            <!--Displays images-->
        </div>
        <br>
        <label>Product Name:
            <input type="text" required name="name">
        </label>
        <br>
        <label>Product Description:
            <textarea name="description" rows="4" cols="100"></textarea>
        </label>
        <br>
        <label>Category:
            <select name = "cat" required>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category['categoryId']; ?>">
                        <?php echo $category['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>
        <br>
        <!--MAYBE NEED BETTER WAY FOR PRICE INPUT, NEED TO VALIDATE INPUT-->
        <label>Price: 
            <br>
            <input type="number" required name="price" min="0" step="0.01">
        </label>
        <br>
        <label>Auction
            <input type="checkbox" id="auction" name="auction" onClick="toggleDate()">
        </label>
        <br>
        <label id="sellByDate" style="display:none"> Sell by Date:
            <input type="datetime-local" name="sellByDate">
        </label>
        <input type="submit" value="Add Product"><br>
    </form>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(function () {
            // Multiple images preview with JavaScript
            var multiImgPreview = function (input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function (event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#chooseFile').on('change', function () {
                multiImgPreview(this, 'div.imgGallery');
            });
        });

        function toggleDate() {
            var sellByDate = document.getElementById("sellByDate");
            sellByDate.style.display = auction.checked ? "block" : "none";
        }
    </script>
</body>

</html>