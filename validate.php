<?php
session_start();
require_once ('user.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User();
    $authenticated_user = $user->validate_user($username, $password);

    if ($authenticated_user) {
        $_SESSION['authenticated'] = 1;
        $_SESSION['username'] = $authenticated_user['username'];
        header("Location: index.php");
        exit();
    } 
    else {
        echo 'Invalid username or password';
    }
}
?>