<header class="header">
    <div class="flex">
        <a href="home.php">
            <img style="width:40px; height:40px" src="./images/image1.jpg" alt="linker" class="logo">
        </a>
        <nav class="navbar">
            <a href="home.php">home</a>
            <a href="view_products.php">products</a>
            <a href="order.php">orders</a>
            <a href="about.php">about us</a>
            <a href="contact.php">contact us</a>
        </nav>
        <div class="icons">
            <i class="bx bx-user" id="user-btn" alt="user icon"></i>
            <?php
            $count_wishlist_items = $con->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
            $total_wishlist_items = $count_wishlist_items->rowCount();
            ?>
            <a href="wishlist.php" class="cart-btn"> <i class="bx bx-heart"></i><sup>
                    <?= $total_wishlist_items ?>
                </sup></a>
            <?php
            $count_cart_items = $con->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_items = $count_cart_items->rowCount();
            ?>
            <a href="cart.php" class="cart-btn"> <i class="bx bx-cart-download"></i><sup>
                    <?= $total_cart_items ?>
                </sup></a>
            <i class="bx-list-plus bx" id="menu-btn" style="font-size:2rem;"></i>

        </div>
        <div class="user-box">
            <p>username: <span>
                    <?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : ""; ?>
                </span></p>
            <p>Email: <span>
                    <?php echo isset($_SESSION['user_email']) ? $_SESSION['user_email'] : ""; ?>
                </span></p>
            <a href="login.php" class="btn">Log in</a>
            <a href="register.php" class="btn">Register</a>
            <form method="post">
                <button type="submit" name="logout" class="logout-btn">log out</button>
            </form>
        </div>
    </div>
</header>