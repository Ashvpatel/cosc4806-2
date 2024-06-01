<?php
session_start();
require_once ('user.php');

$user = new User();
$user_list = $user->get_all_users();

if (isset($_SESSION['username'])) {
    echo "<h1>Welcome, " . htmlspecialchars($_SESSION['username']) . "!</h1>";
    echo '<p><a href="logout.php">Logout</a></p>';
} else {
    echo '<p><a href="register.php">Register</a></p>';
    echo '<p><a href="login.php">Login</a></p>';
}


echo "<pre>";
print_r ($user_list);

?>