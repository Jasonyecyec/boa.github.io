<?php
session_start();
if (isset($_POST['submit'])) {

    //Grabbing the data from signup form
    $product_name = $_POST['product-name'];
    $product_color = $_POST['product-color'];
    $product_size = $_POST['fd-size'];
    $product_price = $_POST['product-price'];
    $user_id = $_SESSION['user-id'];




    //if has session 
    if ($_SESSION['first-name']) {
        
        // header("Location: display.php");
        include "../classes/database-class.php";
        include "../classes/cart-class.php";
        include "../classes/cart-control-class.php";


        $addToCart = new CartControl( $product_name,$product_color,$product_size, $product_price, $user_id);

        //Running error handlers and user signup
        $addToCart->addToCart();

        //Going back to front page if signup success
        header("Location: ../index.php?error=none");
    } else {
        header("Location: ../pages/login.html");
        exit();
    }
}
