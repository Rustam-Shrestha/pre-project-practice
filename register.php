<style>
    <?php include "style.css"; ?>
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rustam-register</title>
</head>

<body>
    <?php include "components/header.php";
    session_start();
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        $user_id = '';
    }

    //registering user
    
    if (isset($_POST['submit'])) {
        $id = uniq_poet();
        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $pass = $_POST['pass'];
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);
        $cpass = $_POST['cpass'];
        $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

        $query = "SELECT * FROM `users` WHERE email= ?";
        $select_user = $con->prepare($query);
        // a pdo execute function needs an array of ? values as an input
        $select_user->execute([$email]);
        $row = $select_user->fetch(PDO::FETCH_ASSOC);
        // if found same email in the database then do this
        if ($select_user->rowCount() > 0) {
            $message[] = "email already exists in the database";
        } else {
            if ($pass != $cpass) {
                $message[] = "email already exists in the database";
            }else{
                $query = "INSERT INTO `users` (id, name, email, password) VALUES(?,?,?,?)";
                $insert_user = $con->prepare($query);
                // a pdo execute function needs an array of ? values as an input
                $select_user->execute([$id, $name, $email, $password]);

            }
        }
    }
    ?>
    <div class="form-container">
        <div class="title">
            <img src="./images/image4.jpg" alt="">
            <h1>Register with us</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum sequi odio delectus vel laudantium alias
                deleniti architecto culpa ad, veniam molestias. Aspernatur!</p>

        </div>
        <form action="" method="post">
            <div class="input-field">
                <p>Your Name </p>
                <input type="text" name="name" placeholder="Enter your name" max-length="40">
            </div>
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
            <div class="input-field">
                <p>Confirm Password </p>
                <input type="password" name="cpass" placeholder="Enter your name" max-length="40"
                    oninput="this.value = this.value.replace(/\s/g, '')">
            </div>
            <input class="btn" type="submit" name="submit" value="register now">
            <p>already have an account? <a href="login.php">Log in</a></p>
        </form>
    </div>

</body>

</html>