<?php

session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];
$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error){
    return !empty($error) ? "<p class ='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm){
    return $formName === $activeForm ? 'active' : '';
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account sign in: B.I.L.Y.A.R.</title>
    
</head>



<body>
    <div class="landing-container">
        <a href="../main.php"><img class="logo-icon" src="../../assets/images/logo2.png" alt="logo"></a>

        <div class ="box <?= isActiveForm('login', $activeForm); ?>" id = "login-form">
            <form action="../components/register-login.php" method="post">
                <h1>Sign in</h1>
                <?= showError($errors['login']); ?>
                <input type = "email" name = "email" placeholder="Email" required>
                <input type="password" name = "password" placeholder="Password" required>
                <button type = "submit" name="login">Login</button>
                <p>Don't have an account? <a href="#" onclick="showForm('signup-form')">Register</a></p>
            </form>
        </div>

         <div class ="box <?= isActiveForm('register', $activeForm); ?>" id = "signup-form">
            <form action="../components/register-login.php" method="post">
                <h1>Sign up</h1>
                <?= showError($errors['register']); ?>
                <input type = "text" name = "fname" placeholder="First Name" required>
                <input type = "text" name = "lname" placeholder="Last Name" required>
                <input type = "email" name = "email" placeholder="Email" required>
                <input type="password" name = "password" placeholder="Password" required>
                <select name="gender" required>
                    <option value="">-- Gender --</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="N/A">Rather not indicate</option>
                </select>
                <button type = "submit" name="register">Sign Up</button>
                <p>Don't have an account? <a href="#" onclick="showForm('login-form')">Login</a></p>
            </form>

        </div>
    </div>
    <script src="../JS/login.js"></script>
    <?php require_once('../components/footer.php')?>
</body>



</html>
