<?php
// Get the product data
$firstName = filter_input(INPUT_POST, 'firstName');
$lastName = filter_input(INPUT_POST, 'lastName');
$dob = filter_input(INPUT_POST, 'dob');
$email = filter_input(INPUT_POST, 'email');
$uname = filter_input(INPUT_POST, 'uname');
$pword = filter_input(INPUT_POST, 'pword');

// Validate inputs
//need to validate passwords match, validate unique username and email, and all fields filled
if ($uname == null || $pword == null ) {
    $error_message = "Invalid account data. Check all fields and try 
    again.";
    include('add_account_error.php'); 
} else { //if input is valid
    require_once('database.php');
    // Add the product to the database  
    $query = 'INSERT INTO users
                 (firstName, lastName, DOB, email, userName, password)
              VALUES
                 (:firstName, :lastName, :DOB, :email, :userName, :password)';
    $statement = $db->prepare($query);
    $statement = $db->bindValue(':firstName', $firstName);
    $statement = $db->bindValue(':lastName', $lastName);
    $statement = $db->bindValue(':DOB', $dob);
    $statement = $db->bindValue(':email', $email)
    $statement->bindValue(':username', $uname);
    $statement->bindValue(':password', $pword);
    $statement->execute();
    $statement->closeCursor();

    // Go back to login page
    include('index.php');
}
?>