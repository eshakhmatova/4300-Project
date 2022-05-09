<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Goose Egg </title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
</head>

<body>

    <div class="header">


        <div className="container">
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
                <a href="./cart.html">
                    <img src="./images/cart.png" width="30px" height="30px">
                </a>

            </div>
            <div class="row">
                <div class="col-1">
                    <h1>Shop with confidence at Goose Egg!</h1>
                    <p>Home to hundreds of certified buyers and sellers!</p>
                    <a href="" class="btn">Explore &#8594;</a>
                </div>
                <div class="col-1">
                    <img src="./images/shop.jpeg">
                </div>

                <div className="col-2">

                </div>
            </div>
        </div>
    </div>
    <!--- categories --->
    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img src="./images/electronics.jpeg" width="400px" height="200px">
                </div>
                <div class="col-3">
                    <img src="./images/art.jpeg" width="400px" height="200px">
                </div>
                <div class="col-3">
                    <img src="./images/clothing.jpeg" width="400px" height="200px">
                </div>
            </div>
        </div>
    </div>
    <!-- featured --->
    <div class="small-container">
        <h2 class="title"> Featured Products </h2>
        <div class="row">
            <div class="col-4">
                <img src="./images/featured-prod-1.jpeg" width="300px" height="300px">
                <h4>iPhone 13 Pro</h4>
                <p>$999.99</p>
            </div>
            <div class="col-4">
                <img src="./images/featured-prod-3.jpg" width="300px" height="300px">
                <h4>1st Edition Charizard Pokemon Card</h4>
                <p>$999.99</p>
            </div>
            <div class="col-4">
                <img src="./images/featured-prod-2.jpeg" width="300px" height="300px">
                <h4>Nike Air Max 270</h4>
                <p>$149.99</p>
            </div>
        </div>
        <!-- latest --->
        <h2 class="title">Latest Products</h2>
        <div class="row">
            <div class="col-4">
                <img src="./images/latest-prod-1.jpeg" width="300px" height="300px">
                <h4>UGA Sweatshirt</h4>
                <p>$59.99</p>
            </div>
            <div class="col-4">
                <img src="./images/latest-prod-3.webp" width="300px" height="300px">
                <h4>PS5</h4>
                <p>599.99</p>
            </div>
            <div class="col-4">
                <img src="./images/latest-prod-2.jpeg" width="300px" height="300px">
                <h4>Airpod Max</h4>
                <p>$499.99</p>
            </div>
        </div>
    </div>
    <!--footer-->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Available on Android and iOS</p>
                    <div class="app-logo">
                        <img src="images/download-logos.png">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="images/logo.png" width="75px"></img>
                    <p>Connecting Buyers and Sellers Worldwide</p>
                </div>

                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Return Policy</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright 2022 - Goose Egg</p>
        </div>
    </div>

</body>

</html>