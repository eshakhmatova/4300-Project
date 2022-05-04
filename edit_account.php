<?php
require_once('database.php');
session_start();
$userId = $_SESSION['userID'];
$query = 'SELECT * FROM users WHERE userId = :userId';
$statement = $db->prepare($query);
$statement->bindValue(':userId', $userId);
$statement->execute();
$userInfo = $statement->fetch();
$statement->closeCursor();
// Get the account data
$firstName = filter_input(INPUT_POST, 'firstName');
$lastName = filter_input(INPUT_POST, 'lastName');
$dob = filter_input(INPUT_POST, 'dob');
$uname = filter_input(INPUT_POST, 'uname');
$aboutMe = filter_input(INPUT_POST, 'aboutMe');
$pword = filter_input(INPUT_POST, 'pword');
$pwordValidation = filter_input(INPUT_POST, 'pwordValidation');



// Validate inputs
//need to validate passwords match, validate unique username and email, and all fields filled
if ($pwordValidation != $pword) {
    echo "Passwords do not match.";
} else { //if input is valid
    // Add the product to the database 
    $query = 'UPDATE users
                SET firstName = :firstName, lastName = :lastName, DOB = :DOB, userName = :userName, aboutMe = :aboutMe
                WHERE userId = :userId';
    $statement = $db->prepare($query);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':DOB', $dob);
    $statement->bindValue(':userName', $uname);
    $statement->bindValue(':aboutMe', $aboutMe);
    $statement->bindValue(':userId', $userId);
    $statement->execute();
    $statement->closeCursor();

    if(!empty($pword)) {
        $query = 'UPDATE users SET password = :password WHERE userId = :userId';
        $statement = $db->prepare($query);
        $statement->bindValue(':password', $pword);
        $statement->bindValue(':userId', $userId);
        $statement->execute();
        $statement->closeCursor();
    }

    include('profile.php');
}
?>