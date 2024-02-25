<!DOCTYPE html>
<html lang="en">
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
?>

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
    <div class="main">
        <section class="home-section">

            <div class="slider">
                <!-- slide1 start -->
                <div class="slider__slider slide1">
                    <div class="overlay"></div>
                    <div class="slide-detail">
                        <h1>Lorem, ipsum dolor.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa aperiam, est illum itaque aut,
                            a
                            earum temporibus ab animi ratione, sunt ipsa!</p>
                        <a href="view_products.php" class="btn">shop now</a>
                        <div class="hero-dec-top"></div>
                        <div class="hero-dec-bottom"></div>
                    </div>
                </div>
                <!-- slide1 end -->

                <!-- slide2 start -->
                <div class="slider__slider slide2">
                    <div class="overlay"></div>
                    <div class="slide-detail">
                        <h1>Lorem, ipsum dolor.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa aperiam, est illum itaque aut,
                            a
                            earum temporibus ab animi ratione, sunt ipsa!</p>
                        <a href="view_products.php" class="btn">shop now</a>
                        <div class="hero-dec-top"></div>
                        <div class="hero-dec-bottom"></div>
                    </div>
                </div>
                <!-- slide2 end -->

                <!-- slide3 start -->
                <div class="slider__slider slide3">
                    <div class="overlay"></div>
                    <div class="slide-detail">
                        <h1>Lorem, ipsum dolor.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa aperiam, est illum itaque aut,
                            a
                            earum temporibus ab animi ratione, sunt ipsa!</p>
                        <a href="view_products.php" class="btn">shop now</a>
                        <div class="hero-dec-top"></div>
                        <div class="hero-dec-bottom"></div>
                    </div>
                </div>
                <!-- slide3 END -->

                <!-- slide4 start -->
                <div class="slider__slider slide4">
                    <div class="overlay"></div>
                    <div class="slide-detail">
                        <h1>Lorem, ipsum dolor.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa aperiam, est illum itaque aut,
                            a
                            earum temporibus ab animi ratione, sunt ipsa!</p>
                        <a href="view_products.php" class="btn">shop now</a>
                        <div class="hero-dec-top"></div>
                        <div class="hero-dec-bottom"></div>
                    </div>
                </div>
                <!-- slide4 end -->

                <!-- slide5 start -->
                <div class="slider__slider slide5">
                    <div class="overlay"></div>
                    <div class="slide-detail">
                        <h1>Lorem, ipsum dolor.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa aperiam, est illum itaque aut,
                            a
                            earum temporibus ab animi ratione, sunt ipsa!</p>
                        <a href="view_products.php" class="btn">shop now</a>
                        <div class="hero-dec-top"></div>
                        <div class="hero-dec-bottom"></div>
                    </div>
                </div>
                <!-- slide5 end -->

                <!-- home slider end -->
                <div class="left-arrow"><i class="bx bxs-left-arrow"></i></div>
                <div class="right-arrow"><i class="bx bxs-right-arrow"></i></div>
            </div>
        </section>
        <section class="thumb">
            <div class="box-container">
                <div class="box">
                    <img src="./images/image1.jpg" alt="image1">
                    <h3>green tea</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sed non! </p>
                    <i class="bx bx-chevron-right"></i>
                </div>
                <div class="box">
                    <img src="./images/image2.jpg" alt="image2">
                    <h3>green tea</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sed non! </p>
                    <i class="bx bx-chevron-right"></i>
                </div>
                <div class="box">
                    <img src="./images/image3.jpg" alt="image3">
                    <h3>green tea</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sed non! </p>
                    <i class="bx bx-chevron-right"></i>
                </div>
                <div class="box">
                    <img src="./images/image4.jpg" alt="image4">
                    <h3>green tea</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sed non! </p>
                    <i class="bx bx-chevron-right"></i>
                </div>
                <div class="box">
                    <img src="./images/image2.jpg" alt="image5">
                    <h3>green tea</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sed non! </p>
                    <i class="bx bx-chevron-right"></i>
                </div>
            </div>
        </section>
        <section class="container">
            <div class="box-container">
                <div class="box">
                    <img src="./images/image1.jpg" alt="image1">
                </div>
                <div class="box">
                    <img style="width:40px; height:40px;" src="./images/image1.jpg" alt="image1">
                    <span>firstimg</span>
                    <h1>save upto 4% off</h1>
                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                </div>

            </div>
        </section>
        <section class="shop">
            <div class="title">

                <h1>Trending products</h1>
            </div>
            <div class="row">
                <!-- <img src="./images/image4.jpg" alt="img4"> -->

                <div class="top-footer">
                    An apple a day keeps the doctor away
                </div>
                <div class="box-container">

                    <div class="box">
                        <div class="img-box">
                            <img src="./images/image1.jpg" alt="img1">
                        </div>
                        <strong>Lorem ipsum dolor sit. amet oius</strong>
                        <a class="btn" href="view_products.php">shop now</a>
                    </div>
                    <div class="box">
                        <div class="img-box">
                            <img src="./images/image2.jpg" alt="img2">
                        </div>
                        <strong>Lorem ipsum dolor sit. amet oius</strong>
                        <a class="btn" href="view_products.php">shop now</a>
                    </div>
                    <div class="box">
                        <div class="img-box">
                            <img src="./images/image2.jpg" alt="img2">
                        </div>
                        <strong>Lorem ipsum dolor sit. amet oius</strong>
                        <a class="btn" href="view_products.php">shop now</a>
                    </div>
                    <div class="box">
                        <div class="img-box">
                            <img src="./images/image3.jpg" alt="img3">
                        </div>
                        <strong>Lorem ipsum dolor sit. amet oius</strong>
                        <a class="btn" href="view_products.php">shop now</a>
                    </div>
                    <div class="box">
                        <div class="img-box">
                            <img src="./images/image4.jpg" alt="img4">
                        </div>
                        <strong>Lorem ipsum dolor sit. amet oius</strong>
                        <a class="btn" href="view_products.php">shop now</a>
                    </div>
                    <div class="box">
                        <div class="img-box">
                            <img src="./images/image1.jpg" alt="img1">
                        </div>
                        <strong>Lorem ipsum dolor sit. amet oius</strong>
                        <a class="btn" href="view_products.php">shop now</a>
                    </div>


                </div>
            </div>
        </section>

        <section class="shop-category">
            <div class="box-container">
                <div class="box">
                    <img style="width:50%;height:300px" src="./images/image2.jpg" alt="image2">
                    <div class="details">
                        <span>BIG OFFERS</span>
                        <h1>extra 4% discounts</h1>
                        <a class="btn" href="view_products.php">shop now</a>
                    </div>
                </div>
                <div class="box">
                    <img style="width:50%;height:300px" src="./images/image1.jpg" alt="image1">
                    <div class="details">
                        <span>Value offer</span>
                        <h1>Friuits with nutri-checher</h1>
                        <a class="btn" href="view_products.php">shop now</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include "components/footer.php"; ?>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="script.js"></script>
    <?php include "components/alert.php"; ?>
</body>

</html>