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

// when we place an order 
if (isset ($_POST['place_order'])) {
    // get name phone email flat street city addresstype method from form
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRIPPED);
    $phone = $_POST['phone'];
    $phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRIPPED);
    $address = $_POST['flat'] . " " . $_POST['street'] . " " . $_POST['city'];
    $address = filter_var($address, FILTER_SANITIZE_STRIPPED);
    $adtype = $_POST['address_type'];
    $adtype = filter_var($adtype, FILTER_SANITIZE_STRIPPED);
    $method = $_POST['method'];
    $method = filter_var($method, FILTER_SANITIZE_STRIPPED);


    // selecting cart items with parameters
    $verify_cart = $con->prepare("SELECT * FROM `cart` WHERE user_id =?");
    // giving user_id as parameter
    // this case will only be when we  directly do buy now from products menu
    $verify_cart->execute([$user_id]);
    // if we get get_id from url
    // basically individual product id could be got from url
    if (isset ($_GET['get_id'])) {
        // then get product from database of same id only 1 product
        $get_product = $con->prepare("SELECT * FROM `product` WHERE id =? LIMIT 1");
        $get_product->execute([$_GET['get_id']]);
        // if we get any data more than 0
        if ($get_product->rowCount() > 0) {
            // then fetch them until null
            while ($fetch_pro = $get_product->fetch(PDO::FETCH_ASSOC)) {
                // inserting to the orders database 
                $insert_order = $con->prepare("INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `address`, `address_type`, `method`, `product_id`, `price`, `qty`) VALUES (?,?,?,?,?,?,?,?,?,?,?);");
                $insert_order->execute([uniq_poet(), $user_id, $name, $phone, $email, $address, $adtype, $method, $fetch_pro['id'], $fetch_pro['price'], $fetch_pro['qty']]);
                
                header('location: order.php');
            }
        } else {
            $warning_msg[] = "something went wrong";
        }
        // now this onw condition will only work when we try buying all products from cart
        // basically weare  using verify_cart from abiove and making sure it has value
    } else if ($verify_cart->rowCount() > 0) {
        // 
        while ($fci = $verify_cart->fetch(PDO::FETCH_ASSOC)) {
            // Concatenate the values into a string
            // $alert_message = "userid: ".$user_id."ID: " . $fci['product_id'] . ", Price: " . $fci['price'] . ", Quantity: " . $fci['qty'];
            
            // // using errorchecking if any value is null or not
            // echo "<script>alert('$alert_message');</script>";
        
            // Proceed with your insertion logic or other operations
            // product id is given instead of id directly because we ftched whole product table earlier now it is cart page so id will just refer to cart id not proudct id that got me for 4 hours now i will remenber it
            $insert_order = $con->prepare("INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `address`, `address_type`, `method`, `product_id`, `price`, `qty`) VALUES (?,?,?,?,?,?,?,?,?,?,?);");
            $insert_order->execute([uniq_poet(), $user_id, $name, $phone, $email, $address, $adtype, $method, $fci['product_id'], $fci['price'], $fci['qty']]);
        }
        
        // Redirect to order.php after the loop completes
        header('location: order.php');
        
        if ($insert_order) {
            $delete_cart_id = $con->prepare("DELETE FROM `cart` WHERE user_id=?");
            $delete_cart_id->execute([$user_id]);
            header('location: order.php');
        }
    } else {

        $warning_msg[] = "something went wrong";
    }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout page</title>
    <style>
        <?php include "style.css"; ?>
        .checkout {
            width: 80%;
            margin: 0 auto;
            line-height: 4;
        }

        .checkout input,
        .checkout select,
        .checkout p,
        .checkout h3 {
            width: 80vw;
            height: 40px;
            border-radius: 20px;
            font-size: 18px;
        }

        .flexy {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            border: 2px solid green;
        }

        .summary {
            margin: 19px 0;
            border: 2px solid green;
        }
    </style>
</head>

<body>
    <?php include "components/header.php"; ?>


    <div class="checkout">
        <div class="title">
            <br>
            <br>
            <br>
            <br>
            <img style="width:40px; height:40px;" src="images/image1.jpg" alt="logo">
            <div class="summary">
                <h3>My bag</h3>
                <div class="box-container">
                    <?php
                    $grand_total = 0;
                    if (isset ($_GET['get_id'])) {
                        $select_get = $con->prepare("SELECT * FROM `product` WHERE id =?");
                        $select_get->execute([$_GET['get_id']]);
                        while ($fetch_get = $select_get->fetch(PDO::FETCH_ASSOC)) {
                            $sub_total = $fetch_get['price'];
                            $grand_total += $sub_total;


                            ?>
                            <div class="flex flexy">
                                <!-- $fetch_get['image'];?> put the image source here like that-->
                                <img style="width:200px; height:200px;" src="images/smsung.png" alt="">
                                <div>
                                    <h3 class="name">
                                        <?= $fetch_get['name']; ?>
                                    </h3>
                                    <p class="price">
                                        <?= $fetch_get['price']; ?>/-
                                    </p>
                                </div>
                            </div>

                            <?php

                        }
                    } else {
                        $select_cart = $con->prepare("SELECT * FROM `cart` WHERE user_id=?");
                        $select_cart->execute([$user_id]);
                        if ($select_cart->rowCount() > 0) {
                            while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
                                $select_products = $con->prepare("SELECT * FROM `product` WHERE id=?");
                                $select_products->execute([$fetch_cart['product_id']]);
                                $fetch_product = $select_products->fetch(PDO::FETCH_ASSOC);
                                $sub_total = ($fetch_cart['qty'] * $fetch_product['price']);
                                $grand_total += $sub_total;
                                ?>
                                <div class="flex flexy">
                                    <!-- use $fetch_product['image'] -->
                                    <div>
                                        <img style="width:200px; height:200px;" src="images/smsung.png" alt="not found prod pic">
                                        <h3 class="name">
                                            <?= $fetch_product['name']; ?>
                                        </h3>
                                        <p class="price">
                                            <?= $fetch_cart['qty']; ?> x
                                            <?= $fetch_product['price']; ?>
                                        </p>

                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "<p>no products added yet</p>";
                        }
                    }
                    ?>
                </div>
                <div class="grand-total"><span>total payable: </span> Rs.
                    <?= $grand_total; ?>/-
                </div>
            </div>
            <h1>checkout summary</h1>
            <p>you are paying for all the products now get your credit cards or wallet ready or go away</p>
            <?php

            echo "thid is  userid";
            echo $user_id;
            ?>
        </div>
        <div class="row">
            <form action="" method="post">
                <h3>Billing details</h3>
                <div class="flex">
                    <div class="box">
                        <div class="input-field">
                            <p>Name: <span>*</span></p>
                            <input type="text" name="name" required maxlength="80" placeholder="enter your name"
                                class="input">

                        </div>
                        <div class="input-field">
                            <p>Number: <span>*</span></p>

                            <input type="number" name="phone" required maxlength="10" placeholder="enter your number"
                                class="input">

                        </div>
                        <div class="input-field">
                            <p>Email: <span>*</span></p>

                            <input type="email" name="email" required maxlength="120" placeholder="enter your email"
                                class="input">

                        </div>
                        <div class="input-field">
                            <p>payment method: <span>*</span></p>
                            <select name="method" class="input">
                                <option value="cash on delivery">cash on delivery</option>
                                <option value="Debit/credit card">Debit/credit card</option>
                                <option value="ime pay or esewa">Ime pay or esewa</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <p>Address type: <span>*</span></p>
                            <select name="address_type" class="input">
                                <option value="Home">Home</option>
                                <option value="Office">Office</option>

                            </select>
                        </div>
                        <div class="box">
                            <div class="input-field">
                                <p>address line 01: <span>*</span></p>

                                <input type="text" name="flat" required maxlength="120" placeholder="eg flat no 420"
                                    class="input">

                            </div>
                            <div class="input-field">
                                <p>address line 02: <span>*</span></p>

                                <input type="text" name="street" required maxlength="120"
                                    placeholder="eg 5th avenue street" class="input">

                            </div>
                            <div class="input-field">
                                <p>city name: <span>*</span></p>

                                <input type="text" name="city" required maxlength="120" placeholder="eg Kathmandu"
                                    class="input">

                            </div>


                        </div>

                    </div>
                </div>
                <button type="submit" name="place_order" class="btn">order now</button>
            </form>
        </div>
    </div>
    <?php include "components/footer.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="script.js"></script>
    <?php include "components/alert.php"; ?>
</body>

</html>