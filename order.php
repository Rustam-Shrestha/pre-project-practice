<?php include "components/connection.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (isset ($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = "";
}
if (isset ($_POST['logout'])) {
    session_destroy();
    header("location: login.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my orders</title>
    <style>
        <?php include "style.css"; ?>
    </style>
</head>

<body>
    <?php include "components/header.php"; ?>
    <center class="top">

        <div class="banner">
            <h1>My orders</h1>
        </div>

        <div class="title2">
            <a href="home.php">home</a><span>/orders</span>
        </div>
        <div class="each-item">
            <br><br><br><br><br><br><br><br>
            <img style="width:40px; height:40px;" src="images/image1.jpg" alt="logo">
            <h1>my orders</h1>
            <p>This is list of things you have ordered from our outlet</p>
        </div>
    </center>
    <div class="super-box">
        <div class="box-container">
            <div class="products">
                <?php
                $select_orders = $con->prepare("SELECT * FROM `orders` WHERE user_id = ? ORDER BY DATE DESC");
                $select_orders->execute([$user_id]);
                if ($select_orders->rowCount() > 0) {
                    while ($fetch_order = $select_orders->fetch(PDO::FETCH_ASSOC)) {
                        $select_products = $con->prepare("SELECT * FROM `product` WHERE id=?");
                        $select_products->execute([$fetch_order['product_id']]);
                        if ($select_products->rowCount() > 0) {
                            while ($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {

                                ?>
                                <div class="box" <?php if ($fetch_order['status'] == 'cancel') {
                                    echo 'style="border:2px solid red; "';
                                }

                                ?>>
                                    <a href="view_order.php?get_id=<?= $fetch_order['id']; ?>">
                                        <p class="date"> <i class="bi bi-calender-fill"></i><span>
                                                <?= $fetch_order['date']; ?>
                                            </span></p>
                                        <!-- source should be #fetch_product['image'] -->
                                        <img src="images/samsung.jpg" alt="this is productimage" class="image">
                                        <div class="row">
                                            <h3 class="name">
                                                <?= $fetch_order['name'] ?>
                                            </h3>
                                            <p class="price">price: Rs.
                                                <?= $fetch_order['price'] ?> x
                                                <?= $fetch_order['qty'] ?> kg
                                            </p>
                                            <p class="status" style="color:<?php if ($fetch_order['status'] == 'delivered') {
                                                echo 'green';
                                            } else if ($fetch_order['status'] == 'canceled') {
                                                echo "red";
                                            } else {
                                                echo "orange";
                                            } ?>">
                                            </p>
                                        </div>
                                    </a>

                                </div>
                                <?php
                            }
                        }
                    }
                } else {
                    echo '<p class="empty">notihing ordered yet</p>';
                }

                ?>
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