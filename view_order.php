<?php 
include "components/connection.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['user_id'])) {
    header("location: login.php");
    exit(); // It's a good practice to exit after redirecting
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['logout'])) {
    session_destroy();
    header("location: login.php");
    exit(); // Exit after redirecting
}

$get_id = isset($_GET['get_id']) ? $_GET['get_id'] : "";
if (empty($get_id)) {
    header('location: order.php');
    exit(); // Exit after redirecting
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Detail</title>

    <style>
        <?php include "style.css"; ?>
        .box{
            width:80%;
        }
    </style>
</head>

<body>
    <?php include "components/header.php"; ?>
    <div class="top">
        <div class="banner">
            <h1>Order Details</h1>
        </div>
        <div class="title2">
            <a href="home.php">Home</a><span>/ Order Detail</span>
        </div>
    </div>
    <center class="super-box">
        <?php
        $grand_total = 0;
        $select_orders = $con->prepare("SELECT * FROM `orders` WHERE id= ? LIMIT 1");
        $select_orders->execute([$get_id]);
        if ($select_orders->rowCount() > 0) {
            $fetch_order = $select_orders->fetch(PDO::FETCH_ASSOC);
            $select_product = $con->prepare("SELECT * FROM `product` WHERE id=? LIMIT 1");
            $select_product->execute([$fetch_order['product_id']]);
            if ($select_product->rowCount() > 0) {
                $fetch_product = $select_product->fetch(PDO::FETCH_ASSOC);
                $sub_total = ($fetch_order['price'] * $fetch_order['qty']);
                $grand_total += $sub_total;
                ?>
                <div class="box">
                    <div class="col">
                        <h1><?=$fetch_order['name'];?></h1>
                        <table border='1' cellspacing="0">
                            <tr>
                                <td>Email:</td>
                                <td><?=$fetch_order['email'];?> </td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td><?=$fetch_order['address'];?> </td>
                            </tr>
                            <tr>
                                <td>Payment Method:</td>
                                <td><?=$fetch_order['method'];?> </td>
                            </tr>
                            <tr>
                                <td>Date:</td>
                                <td><?=$fetch_order['date'];?> </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </center>

    <?php include "components/footer.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="script.js"></script>
    <?php include "components/alert.php"; ?>
</body>

</html>
