<?php

class CartControl extends Cart{

    private $product_name;
    private $product_color;
    private $product_size;
    private $product_price;
    private $user_id;

    public function __construct( $product_name,$product_color,$product_size, $product_price, $user_id){
        $this->product_name = $product_name;
        $this->product_color = $product_color;
        $this->product_size = $product_size;
        $this->product_price = $product_price;
        $this->user_id = $user_id;

    }
  
    public function addToCart(){
        $this->addCart($this->product_name,$this->product_color, $this->product_size, $this->product_price, $this->user_id);
    }

}