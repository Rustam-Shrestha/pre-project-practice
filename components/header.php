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
            <i class="bx bx-user" id="user-btn"></i>
            <a href="wishlist.php" class="cart-btn"> <i class="bx bx-heart"></i><sup>0</sup></a>
            <a href="cart.php" class="cart-btn"> <i class="bx bx-cart-download"></i><sup>0</sup></a>
            <i class="bx-list-plus bx" id="menu-btn" style="font-size:2rem;"></i>

        </div>
        <div class="user-box">
            <p>username: <span>
                    <!-- <?php $_SESSION['user_name'] ?> -->
                </span></p>
            <p>Email: <span>
                    <!-- <?php $_SESSION['user_email'] ?> -->
                </span></p>
            <a href="login.php" class="btn">Log in</a>
            <a href="register.php" class="btn">Register</a>
            <form method="post">
                <button type="submit" name="logout" class="logout-btn">log out</button>
            </form>
        </div>
    </div>
</header>