<?php include "components/connection.php"; ?>

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
                $select_products = $con->prepare("SELECT * FROM product");
                $select_products->execute();
                if ($select_products->rowCount() > 0) {
                    while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <form action="" method="post" class="box">

                        <img src="image/<?=$fetch_products['image'];?>" class='img' />
                        <div class="button">
                            
                            <button type="submit" name="add_to_cart" > <i class="bx bx-cart"></i></button>
                            <button type="submit" name="add_wishlist" > <i class="bx bx-heart"></i></button>
                            <a href="viewpage.php?id=<?php echo $fetch_products['id'];?>" class="bx bxs-show"></a>
                        </div>
                        <h3 class="name"><?=$fetch_products['name'];?></h3>
                        <input type="hidden" name="product_id">
                        <div class="flex">
                            <p class="price">price: <?=$fetch_products['price'];?></p>
                            <input type="number" name="qty" required value="1" min="1" max="99" maxlength="2" class="qty">
                        </div>
                        <a href="checkout.php?get_id=<?=$fetch_products['id'];?>" class="btn">buy now</a>
                        
                        </form>
                        <?php
                    }
                }
                else{
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