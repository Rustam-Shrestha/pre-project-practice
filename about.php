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
    <div class="banner">
        <h1>About us</h1>
    </div>
    <div class="title2">
        <a href="home.php">home</a><span>/about</span>
    </div>
    <div class="about-category">
        <div class="box">
            <img src="./images/image3.jpg" alt="">
            <div class="detail">
                <span>fruit</span>
                <h1>lemon</h1>
                <a href="view_products.php" class="btn">shop now</a>
            </div>
        </div>
        <div class="box">
            <img src="./images/image4.jpg" alt="">
            <div class="detail">
                <span>fruit</span>
                <h1>Raspberry</h1>
                <a href="view_products.php" class="btn">shop now</a>
            </div>
        </div>
        <div class="box">
            <img src="./images/image2.jpg" alt="">
            <div class="detail">
                <span>fruit</span>
                <h1>Mulberry</h1>
                <a href="view_products.php" class="btn">shop now</a>
            </div>
        </div>
        <div class="box">
            <img src="./images/image1.jpg" alt="">
            <div class="detail">
                <span>fruit</span>
                <h1>graves</h1>
                <a href="view_products.php" class="btn">shop now</a>
            </div>
        </div>

    </div>
    <div class="about">
        <div class="row">
            <div class="img-box">
                <img src="./images/image1.jpg" alt="">
            </div>
            <div class="detail">
                <h1>Lorem ipsum dolor sit amet.</h1>
                <b>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam reiciendis exercitationem quae quaerat?
                    Vel, distinctio. Similique reiciendis enim iusto aspernatur distinctio illo voluptatum, aperiam
                    delectus cupiditate ea.</b>
                <a href="view_products.php" class="btn"></a>
            </div>
        </div>
    </div>
    <?php include "components/footer.php"; ?>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="script.js"></script>
    <?php include "components/alert.php"; ?>
</body>

</html>