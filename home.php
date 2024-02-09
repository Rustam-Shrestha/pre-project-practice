<?php include "components/connection.php"; ?>

<!DOCTYPE html>
<html lang="en">

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

                <div class="slider__slider slide1">
                    <div class="overlay"></div>
                    <div class="slide-detail">
                        <h1>Lorem, ipsum dolor.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa aperiam, est illum itaque aut,
                            a
                            earum temporibus ab animi ratione, sunt ipsa!</p>
                        <a href="view_products.php" class="btn">shop now</a>
                        <div class="here-dec-top"></div>
                        <div class="here-dec-bottom"></div>
                    </div>
                    <!-- slide1 end -->
                </div>

                <div class="slider__slider slide2">
                    <div class="overlay"></div>
                    <div class="slide-detail">
                        <h1>Lorem, ipsum dolor.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa aperiam, est illum itaque aut,
                            a earum temporibus ab animi ratione, sunt ipsa!</p>
                        <a href="view_products.php" class="btn">shop now</a>
                        <div class="here-dec-top"></div>
                        <div class="here-dec-bottom"></div>
                    </div>
                    <!-- slide2 end -->
                </div>

                <div class="slider__slider slide3">
                    <div class="overlay"></div>
                    <div class="slide-detail">
                        <h1>Lorem, ipsum dolor.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa aperiam, est illum itaque aut,
                            a
                            earum temporibus ab animi ratione, sunt ipsa!</p>
                        <a href="view_products.php" class="btn">shop now</a>
                        <div class="here-dec-top"></div>
                        <div class="here-dec-bottom"></div>
                    </div>
                    <!-- slide3 end -->
                </div>

                <div class="slider__slider slide4">
                    <div class="overlay"></div>
                    <div class="slide-detail">
                        <h1>Lorem, ipsum dolor.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa aperiam, est illum itaque aut,
                            a
                            earum temporibus ab animi ratione, sunt ipsa!</p>
                        <a href="view_products.php" class="btn">shop now</a>
                        <div class="here-dec-top"></div>
                        <div class="here-dec-bottom"></div>
                    </div>
                    <!-- slide4 end -->
                </div>

                <div class="slider__slider slide5">
                    <div class="overlay"></div>
                    <div class="slide-detail">
                        <h1>Lorem, ipsum dolor.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa aperiam, est illum itaque aut,
                            a
                            earum temporibus ab animi ratione, sunt ipsa!</p>
                        <a href="view_products.php" class="btn">shop now</a>
                        <div class="here-dec-top"></div>
                        <div class="here-dec-bottom"></div>
                    </div>
                    <!-- slide5 end -->
                </div>

                <!-- home slider end -->
                <div class="left-arrow"><i class="bx bxs-left-arrow"></i></div>
                <div class="right-arrow"><i class="bx bxs-right-arrow"></i></div>
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