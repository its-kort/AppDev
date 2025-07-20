<?php 

session_start();
require_once 'config-login.php';

if (isset($_POST['register'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $gender = $_POST['gender'];

    $checkEmail = $conn->query("SELECT email FROM users WHERE email = '$email'");
    if ($checkEmail->num_rows > 0){
        $_SESSION['register_error'] = 'Email is already registered!';
        $_SESSION['active_form'] = 'register';
    } else {
    $conn->query("INSERT INTO users(first_name, last_name, email, password, gender) VALUES ('$fname', '$lname', '$email', '$password', '$gender')");
    }

    header("Location: ../pages/login.php");
    exit();
}

if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['fname'] = $user['first_name'];
            $_SESSION['lname'] = $user['last_name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['gender'] = $user['gender'];
            exit();
        }
    }
    
    $_SESSION['login_error'] = 'Incorrect email or password';
    $_SESSION['active_form'] = 'login';
    header("Location: ../pages/login.php");
    exit();
}
?>