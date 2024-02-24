<?php include "components/connection.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php include "style.css"; ?>
    </style>
</head>

<body>
    <?php include "components/header.php"; ?>
    <div class="contact">
        <div class="banner">
            <h1>contact us</h1>
        </div>

        <div class="title2">
            <a href="home.php">home</a><span>/contact</span>
        </div>
        <div class="form-container">
            <form action="" method="post">
                <div class="title">
                    <img src="./images/image3.jpg" alt="">
                    <h1>leave a message</h1>
                </div>
                <div class="input-field">
                    <p>Your name <sup>*</sup></p>
                    <input type="text" name="name" id="">
                </div>
                <div class="input-field">
                    <p>Your name <sup>*</sup></p>
                    <input type="email" name="email" id="">
                </div>
                <div class="input-field">
                    <p>Your email <sup>*</sup></p>
                    <input type="text" name="number" id="">
                </div>
                <div class="input-field">
                    <p>Your message <sup></sup></p>
                    <textarea name="message" id="" cols="30" rows="10"></textarea>
                </div>
                <button class="btn" name="submit-button">send</button>

            </form>
            <div class="address">
                <div class="title">
                    <img src="./images/image3.jpg" alt="">
                    <h1>contact details</h1>
                </div>
                <div class="box-container">
                    <div class="box">
                        <i class="bx bxs-map-pin"></i>
                        <div>
                            <h4>Address</h4>
                            <p>Bishambar, Dhanusha</p>
                        </div>
                    </div>
                    <div class="box">
                        <i class="bx bxs-phone-call"></i>
                        <div>
                            <h4>Phone no</h4>
                            <p>+977 9869696969</p>
                        </div>
                    </div>
                    <div class="box">
                        <i class="bx bxs-envelope"></i>
                        <div>
                            <h4>Email</h4>
                            <p>santosh.787407@smc.tu.edu.np</p>
                        </div>
                    </div>
                    <div class="box">
                        <i class="bx bxs-map-pin"></i>
                        <div>
                            <h4>Address</h4>
                            <p>Bishambar, Dhanusha</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "components/footer.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="script.js"></script>
    <?php include "components/alert.php"; ?>
</body>

</html>