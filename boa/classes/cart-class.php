<?php
class Cart extends Database{

    protected function addCart($product_name, $product_color, $product_size, $product_price,$user_id){
        $stmt = $this->connect()->prepare('INSERT INTO cart(product_name, variation_color, clothes_size, unit_price, users_id)
        VALUES  (?,?,?,?,(SELECT user_id FROM users WHERE user_id = ?));');

        //execute stmt if fail return to login
        if (!$stmt->execute(array($product_name, $product_color, $product_size, $product_price, $user_id))) {
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }

        //end stmt 
        $stmt = null;
    }
}