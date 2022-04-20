<?php
require_once('database.php');

//start session to save which user is currently logged in & other data related to their visit
session_start();

//validating input
if(isset($_POST['uname']) && isset($_POST['pword'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$uname = validate($_POST['uname']);
$pword = validate($_POST['pword']);

$query = "SELECT * FROM users WHERE username='$uname'";
$statement = $db->prepare($query);
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['userName'] === $uname && $row['password'] === $pword) {
        //if valid login, save current user's ID
        $_SESSION["userID"] = $row['userId'];
        include('website.php');
    }
    else{
        $error_message = "Incorrect password.";
        include('login_error.php');
    }
}
else{
    $error_message = "Incorrect username";
    include('login_error.php');
}
?>