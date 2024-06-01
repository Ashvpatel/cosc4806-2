<?php
require_once ('user.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User();
    $result = $user->create_user($username, $password);
    
    if (isset($result['error'])) {
        echo $result['error'];
    } 
    else {
        echo $result['success'];
    }
}
?>

< !DOCTYPE html >
    <html>
    <head>
        <title>Register</title>
    </head>
    <body>
        
        <form method="post">
            Username: <input type="text" name="username" required><br>
            Password: <input type="password" name="password" required minlength="8"><br>
            <button type="submit">Create an account</button>
        </form>
        
        <p>Password must be at least 8 characters long.</p>
        
    </body>
    </html>
