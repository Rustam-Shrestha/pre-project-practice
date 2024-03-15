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
// adding a product in wishlist
if (isset ($_POST['add_wishlist'])) {
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
        $success_msg[] = 'successfully added to wishlist';
    }
}

// adding a product in cart
if (isset ($_POST['add_to_cart'])) {
    $id = uniq_poet();
    $product_id = $_POST['product_id'];
    $qty = $_POST['qty'];
    $qty = filter_var($qty, FILTER_SANITIZE_NUMBER_INT);

    $verify_cart = $con->prepare('SELECT * FROM `cart` WHERE user_id = ? AND product_id = ?');
    $verify_cart->execute([$user_id, $product_id]);

    $max_cart_items = $con->prepare("SELECT * FROM `cart` WHERE user_id=? ");
    $max_cart_items->execute([$user_id]);
    if ($verify_cart->rowCount() > 0) {
        $warning_msg[] = 'product already in your cart';

    } else if ($max_cart_items->rowCount() > 20) {
        $warning_msg[] = 'cart is already full';

    } else {
        $select_price = $con->prepare("SELECT * FROM `product` WHERE id= ? LIMIT 1");
        $select_price->execute([$product_id]);
        $fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);
        $insert_cart = $con->prepare("INSERT INTO `cart` (id, user_id, product_id, price, qty) VALUES(?,?,?,?,?)");
        $insert_cart->execute([$id, $user_id, $product_id, $fetch_price['price'], $qty]);
        $success_msg[] = 'successfully added to cart';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product detail</title>
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
            <a href="home.php">home</a><span>/product_detail</span>
        </div>
        <section class="view_page">
            <?php
            if (isset ($_GET['pid'])) {
                $pid = $_GET['pid'];
                $select_product = $con->prepare("SELECT * FROM `product` WHERE id= ?");
                $select_product->execute([$pid]);
                if ($select_product->rowCount() > 0) {
                    while ($fetch_products = $select_product->fetch(PDO::FETCH_ASSOC)) {

                        ?>
                        <form method="post">
                            <img src="image/<?php echo $fetch_products['image'] ?>" alt="product picture">
                            <div class="detail">
                                <div class="price">
                                    Rs.
                                    <?php echo $fetch_products['price'] ?> /-
                                </div>
                                <div class="name">
                                    <?php echo $fetch_products['name'] ?>
                                </div>
                                <div class="product-detail">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eligendi asperiores veritatis
                                        dolor? Molestiae praesentium commodi neque id fugit doloribus voluptates quae!</p>
                                </div>
                            </div>
                            <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
                            <button class="btn" type="submit" name="add_wishlist">add to wishlist<i
                                    class="bx bx-heart"></i></button>
                            <input type="hidden" name="qty" value="1" min="0" class="quantity">
                            <button class="btn" type="submit" name="add_to_cart">add to cart<i class="bx bx-cart"></i></button>

                        </form>
                        <?php
                    }
                }
            }

            ?>
        </section>
    </div>
    <?php include "components/footer.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="script.js"></script>
    <?php include "components/alert.php"; ?>
</body>

</html>