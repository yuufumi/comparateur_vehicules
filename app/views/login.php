<?php
session_start(); // Starting the session

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the username and password are correct (you will need to implement your own validation here)
    $username = 'youcef'; // Replace with your actual admin username
    $password = '41c1acf47bc28733557bcaa9f2ae7d9c'; // Replace with your actual admin password

    if ($_POST['uname'] == $username && md5($_POST['pass']) == $password) {
        // Set session variables
        $_SESSION['uname'] = $username;
        // Redirect to the admin page or any other authenticated page
        header("Location: admin.php");
        exit();
    } else if($_POST['uname']=== ""){
        $error = "username must be included";
    }else if($_POST['pass'] === ""){
        $error = "password must be included";
    }else{
        $error = "Oops, you're not an admin!!!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/style_login.css">
</head>
<body style="font-family: 'Oswald', sans-serif;">
    <form action="" method="post">
        <h2>LOGIN</h2>
        <?php if (isset($error)) {
        echo "<p class='error'>".$error."</p>";
        }
        ?>
        <label for="uname">User Name</label>
        <input type="text" name="uname" placeholder="Username">

        <label for="pass">Password</label>
        <input type="password" name="pass" placeholder="Password">

        <button type="submit">Login</button>
    </form>
    </body>
</html>