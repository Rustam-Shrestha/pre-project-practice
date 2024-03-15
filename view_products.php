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
    <title>view products</title>
    <style>
        <?php include "style.css"; ?>
    </style>
</head>

<body>
    <?php include "components/header.php"; ?>
    <div class="products">
        <div class="banner">
            <h1>our products us</h1>
        </div>

        <div class="title2">
            <a href="home.php">home</a><span>/products</span>
        </div>
        <section class="products">
            <div class="box-container">
                <?php
                $select_products = $con->prepare("SELECT * FROM `product`");
                $select_products->execute();
                if ($select_products->rowCount() > 0) {
                    while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <form action="" method="post" class="box">

                            <img src="image/<?= $fetch_products['image']; ?>" class='img' />
                            <div class="button">

                                <button type="submit" name="add_to_cart"> <i class="bx bx-cart"></i></button>
                                <button type="submit" name="add_wishlist" value="<?= $fetch_products['id']; ?>"> <i
                                        class="bx bx-heart"></i></button>

                                <a href="view_page.php?pid=<?php echo $fetch_products['id']; ?>" class="bx bxs-show"></a>
                            </div>
                            <h3 class="name">
                                <?= $fetch_products['name']; ?>
                            </h3>
                            <input type="hidden" name="product_id" value="<?= $fetch_products['id']; ?>">

                            <div class="flex">
                                <p class="price">price:
                                    Rs.
                                    <?= $fetch_products['price']; ?>/-
                                </p>
                                <input type="number" name="qty" required value="1" min="1" max="99" maxlength="2" class="qty">
                            </div>
                            <a href="checkout.php?get_id=<?= $fetch_products['id']; ?>" class="btn">buy now</a>

                        </form>
                        <?php
                    }
                } else {
                    echo '<p class="empty">no products added yet! </p>';
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