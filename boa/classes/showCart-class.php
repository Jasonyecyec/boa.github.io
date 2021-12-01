<?php
 //session_start();
class ShowCart extends Database{
    private $userId;
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function showcart(){
        //SELECT from database
        $stmt = $this->connect()->prepare('SELECT order_id,product_name,unit_price FROM cart INNER JOIN users ON cart.users_id = users.user_id  WHERE cart.users_id = ?;');
        
        //execute stmt if fail return to login
        if (!$stmt->execute(array($this->userId))) {
            $stmt = null;
            header("Location: https://www.google.com/");
            exit();
        }

        //if stmt has no value return to login
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("Location: https://www.google.com/");
            exit();
        }

        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

       
        $_SESSION['cart-all'] = $user;
        $stmt = null;
    }   
}