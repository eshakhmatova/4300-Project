<?php
session_start();
//gets inputs from add product form
$name = filter_input(INPUT_POST, 'name');
$desc = filter_input(INPUT_POST, 'description');
$category = filter_input(INPUT_POST, 'cat');
//$auction = filter_input(INPUT_POST, 'auction');
$price = filter_input(INPUT_POST, 'price');

//validate inputs
if ($name == null || $price == null) {
    $error_message = "Invalid product data. Check all fields and try again.";
    include('add_product_error.php');
}
else {
    require_once('database.php');
    $query = 'INSERT INTO product (userId, name, description, categoryId, price, createDate)
                VALUES (:userId, :name, :description, :categoryId, :price, CURRENT_TIMESTAMP)';
    //$query = 'INSERT INTO product (userId, name, description, categoryId, auction, price, createDate)
    //            VALUES (:userId, :name, :description, :categoryId, :auction, :price, CURRENT_TIMESTAMP)';
    $statement = $db->prepare($query);
    $statement->bindValue(':userId', $_SESSION['userID']);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':description', $desc);
    $statement->bindValue(':categoryId', $category);
    //$statement->bindValue(':auction', $auction);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();

            //CHANGE TO VIEW PRODUCT!!!!!!!!! after that page is complete
    //if product input valid, takes user back to their account page
    include('account.php');
}

?>