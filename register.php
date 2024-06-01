<?php
require_once ('user.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User();
    $result = $user->create_user($username, $password);
    if (isset($result['error'])) {
        echo $result['error'];
    } else {
        echo $result['success'];
    }
}
?>
