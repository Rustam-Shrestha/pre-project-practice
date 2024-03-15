<!DOCTYPE html>
<html lang="en">

<?php
include "components/connection.php";
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = "";
}
include "components/header.php";
//registering user

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRIPPED);
    $pass = $_POST['pass'];
    $pass = filter_var($pass, FILTER_SANITIZE_STRIPPED);

    $query = "SELECT * FROM `users` WHERE email= ? AND password= ?";
    $select_user = $con->prepare($query);
    $select_user->execute([$email, $pass]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);
    if ($select_user->rowCount() > 0) {
        $_SESSION['user_id'] = $row["id"];
        echo $row["id"];
        $_SESSION['user_name'] = $row["name"];
        $_SESSION['user_email'] = $row["email"];
        header("location: home.php");
    } else {
        $message[] = "incorrenct username and password";
    }
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" conntent="width=device-width, initial-scale=1.0">
    <title>Rustam-register</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        <?php include "style.css";
        ?>
    </style>
</head>

<body>
    <div class="form-container">
        <div class="title">
            <img src="./images/image4.jpg" alt="">
            <h1>Log in with us</h1>
            <p>Lorem ipsum dolor sit amet, connsectetur adipisicing elit. Illum sequi odio delectus vel laudantium alias
                deleniti architecto culpa ad, veniam molestias. Aspernatur!</p>

        </div>
        <form action="" method="post">

            <div class="input-field">
                <p>Email </p>
                <input type="text" name="email" placeholder="Enter your email" max-length="40"
                    oninput="this.value = this.value.replace(/\s/g, '')">
            </div>
            <div class="input-field">
                <p>Password </p>
                <input type="password" name="pass" placeholder="Enter your name" max-length="40"
                    oninput="this.value = this.value.replace(/\s/g, '')">
            </div>

            <input class="btn" type="submit" name="submit" value="login">
            <p>don't have an account? <a href="register.php">sign up</a></p>
        </form>
    </div>
    <script src="script.js"></script>
</body>

</html>