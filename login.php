<?php
require_once('database.php');

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

//$sql = "SELECT * FROM users WHERE username='$uname' AND password='$pass'";
$query = "SELECT * FROM users WHERE username='$uname'";
$statement = $db->prepare($query);
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['username'] === $uname && $row['password'] === $pword) {
        include('main_menu.php');
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