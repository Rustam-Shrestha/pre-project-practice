<?php include "components/connection.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = "";
}
if (isset($_POST['logout'])) {
    session_destroy();
    header("location: login.php");
}
// adding a product in wishlist
if (isset($_POST['add_wishlist'])) {
    $id = uniq_poet();
    $product_id = $_POST['product_id'];
    $verify_wishlist = $con->prepare('SELECT * FROM `wishlist` WHERE user_id = ? AND product_id = ?');
    $verify_wishlist->execute([$user_id, $product_id]);
    $cart_num = $con->prepare('SELECT * FROM `cart` WHERE user_id = ? AND product_id = ?');
    $cart_num->execute([$user_id, $product_id]);
    if ($verify_wishlist->rowCount() > 0) {
        $warning_msg[] = 'product already exists in your wishlist';

    } else if ($cart_num->rowCount() > 0) {
        $warning_msg[] = 'product already exists in your wishlist';

    } else {
        $select_price = $con->prepare("SELECT * FROM `product` WHERE id= ? LIMIT 1");
        $select_price->execute([$product_id]);
        $fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);
        $insert_wishlist = $con->prepare("INSERT INTO `wishlist` (id, user_id, product_id, price) VALUES(?,?,?,?)");
        $insert_wishlist->execute([$id, $user_id, $product_id, $fetch_price['price']]);
        $success_msg[] = 'successfully added to cart';
    }
}


// delete from wishlist
if (isset($_POST['delete_item'])) {
    $wishlist_id = $_POST['wishlist_id'];
    $wishlist_id = filter_var($wishlist_id, );
    $verify_delete_item = $con->prepare("SELECT * FROM `wishlist` WHERE id=?");
    $verify_delete_item->execute([$wishlist_id]);
    if ($verify_delete_item->rowCount() > 0) {
        $delete_wishlist_id = $con->prepare("DELETE FROM `wishlist` WHERE id=?");
        $delete_wishlist_id->execute([$wishlist_id]);
        $success_msg[] = "successfully deleted an wishlist item";

    } else {
        $warning_msg[] = "wishlist item already deleted";
    }


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart page</title>
    <style>
        <?php include "style.css"; ?>
    </style>
</head>

<body>
    <?php include "components/header.php"; ?>
    <div class="products">
        <div class="banner">
            <h1>product detail</h1>
        </div>

        <div class="title2">
            <a href="home.php">home</a><span>/my cart</span>
        </div>
        <section class="products">
            <h1 class="title">Products added in cart</h1>
            <div class="box-container">
                <?php
                $grand_total = 0;
                $select_cart = $con->prepare("SELECT * FROM `cart` WHERE user_id= ?");
                $select_cart->execute([$user_id]);
                if ($select_cart->rowCount()) {
                    while ($fetch_carts = $select_cart->fetch(PDO::FETCH_ASSOC)) {

                        $select_products = $con->prepare("SELECT * FROM `product` WHERE id= ?");
                        $select_products->execute([$fetch_wishlist["product_id"]]);
                        if ($select_products->rowCount() > 0) {
                            $fetch_products = $select_products->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <form action="" method="post" class="box">
                                <input type="hidden" name="cart_id" value="<?= $fetch_carts['id'] ?>">
                                <img src="image/<?= $fetch_products['image']; ?>" alt="" class="img">
                                <h3 class="name">
                                    <?= $fetch_products['name']; ?>
                                </h3>
                                <div class="flex">
                                    <p class="price">price: Rs.
                                        <?= $fetch_products['price'] ?>/-
                                    </p>
                                </div>


                            </form>

                            <?php
                            $grand_total += $fetch_wishlist['price'];
                        }
                    }
                } else {
                    echo "<p class='empty'>no products added yet </p>";
                }
                ?>
            </div>


        </section>
    </div>
    <?php include "components/footer.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="script.js"></script>
    <?php include "components/alert.php"; ?>
</body>

</html>