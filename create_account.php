<?php
//get all categories into $categories
require_once('database.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> Goose Egg - Create An Account </title>
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
        <!--
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
        -->
    </div>

    <div class="container">
        <h1>Create an Account</h1>
        <form action="add_account.php" method="post" id="account">
            <div class="formGrid">
                <div class="gridItem">
                    <label style="width:400px;">First Name: 
                        <input style="margin-left:50px;flex:0 0 130px;" type="text" name="firstName">
                    </label>
                    <br>
                    <label style="width:400px;">Last Name: 
                        <input style="margin-left:50px;flex:0 0 130px;" type="text" name="lastName">
                    </label>
                    <br>
                    <label style="width:400px;">Birthdate: 
                        <input style="margin-left:60px;flex:0 0 200px;" type="date" name="dob">
                    </label>
                    <br>
                    <label style="width:400px;">Email Address: 
                        <input style="margin-left:20px;flex:0 0 130px;" type="text" name="email">
                    </label>
                    <br>
                    <label style="width:400px;">User Name: 
                        <input style="margin-left:45px;flex:0 0 130px;" type="text" name="uname">
                    </label>
                    <br>
                    <label style='width:400px;'>About Me:
                        <textarea name="aboutMe" rows="2" cols="40"></textarea>
                    </label>
                    <br>
                    <label style="width:400px">Password:
                        <br>
                        <input style="margin-left:50px;flex:0 0 130px;" type="password" name="pword">
                    </label>
                    <br>
                    <label style="width:400px">Re-enter Password:
                        <input style="margin-left:50px;flex:0 0 130px;" type="password" name="pwordValidation">
                    </label>
                    <br>
                    <input style="padding:0; margin-left:14px; flex:0 0 40px;" type="submit" value="Save">		
                </div>
                <div class="gridItem">
                    <div class="imgGallery">
                        <!--Displays images-->
                    </div>
                    <label>Profile Picture:
                        <input type="file" id="chooseFile" name = "imageFile">
                    </label>
                </div>
            </div>
        </form>
        <a class="style" href="index.php">Login Page</a>
    </div>
        
        
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
                            $($.parseHTML('<img>')).attr({'src': event.target.result, 'class': 'imageUp'}).appendTo(imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#chooseFile').on('change', function () {
                multiImgPreview(this, 'div.imgGallery');
            });
        });
    </script>




</body>
<footer>
	<p class="foot">&copy; <?php echo date("Y"); ?> E-Commerce App</p>
</footer>
</html>