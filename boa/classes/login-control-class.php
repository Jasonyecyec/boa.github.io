<?php

class LoginControl extends Login{
    private $email;
    private $pass;

    public function __construct($email, $pass){
        $this->email = $email;
        $this->pass = $pass;
    }

    public function loginUser(){
        if($this->emptyInput() == true){
            header("Location: ../pages/login.html?error=emptyInput");
            exit();
        }

        $this->getUser($this->email,$this->pass);
    }

    //check empty field
    private function emptyInput(){
        $result = "";
        if (empty($this->email) || empty($this->pass)){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

   
}
