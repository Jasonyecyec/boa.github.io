<?php
session_start();
$show = $_SESSION['cart-all'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cart-style.css">
    <title>CART</title>
</head>

<body>
    <?php
    if (isset($_SESSION['user-id'])) {
        include "../classes/database-class.php";
        include "../classes/showCart-class.php";

        $cart = new ShowCart($_SESSION['user-id']);

        $cart->showcart();
    } else {
        header("Location: login.html");
    }
    ?>
    <!----- NAVBAR ----->
    <nav>
        <!----- NAVBAR CONTAINER ----->
        <div class="navbar-container">
            <!----- LOGO ----->
            <div class="logo">
                <a href="../index.php"> <img src="../BOA-Files/HOME/BOA-logo.png" alt="logo"> </a>
            </div>

            <div>
                <!---- NAVBAR ICON ----->
                <div class="navbar">
                    <ul>
                        <li><a href=""><img src="../BOA-Files/HOME/user.png" alt=""></a></li>
                        <li><a href="../HomePage/homePage.html"><img src="../BOA-Files/HOME/homeicon.png" alt=""></a>
                        </li>
                        <li><a href=""><img src="../BOA-Files/HOME/carticon.png" alt=""></a></li>
                        <li><a href=""><img src="../BOA-Files/HOME/contactus.png" alt=""></a></li>
                    </ul>
                </div>

                <!----- SEARCHBAR ----->
                <div class="search">
                    <label for="search-function"></label>
                    <input type="text" id="search-function">
                </div>
            </div>
        </div>
    </nav>
    <!----- END OF NAVBAR ----->

    <section>
        <h1>my shopping cart</h1>

        <div class="item-description">
            <ul>
                <li>products</li>
                <li>unit price</li>
                <li>quantity</li>
                <li>total price</li>
            </ul>
        </div>
    </section>
    <main>

        <!-- test -->
        <?php
        for ($i = 0; $i < count($show); $i++) {
        ?>
            <div class="cart-container">

                <div class="products-container s">
                    <div class="check-container">
                        s
                    </div>

                    <div class="image-container">
                        <img src="../boa-files/CART/1.png" alt="" class="product-image">
                    </div>

                    <div class="details-container">
                        <div class="product-name-container">
                            <p class="product-name"> <?php echo $show[$i]["product_name"]; ?></p>
                        </div>

                        <div class="">

                        </div>
                    </div>
                </div>

                <div class="unit-price-container a">
                    <p class="size1"> <?php echo $show[$i]["unit_price"]; ?></p>
                </div>

                <div class="quantity-container s">
                    s
                </div>

                <div class="totalPrice-container a">
                    s
                </div>
            </div>
        <?php
        }
        ?>

    </main>

    <section>
        <div class="bottom-container">
            <div class="bottom-fixed">
                <p>sdsd</p>
            </div>
        </div>

    </section>



</body>

</html>