<?php

class SignupControl extends Signup{
    //set attributes to private 
    private $fname;
    private $lname;
    private $email;
    private $phone;
    private $address;
    private $birthdate;
    private $gender;
    private $pass;
    private $repass;

    public function __construct($fname, $lname,$email, $phone, $address, $birthdate, $gender, $pass, $repass){
        //setting constructor to attirbutes
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->birthdate = $birthdate;
        $this->gender = $gender;
        $this->pass = $pass;
        $this->repass = $repass;
    }

    //signup function 
    public function SignupUser(){
        if($this->emptyInput() == true){
            header("Location: ../pages/signup.html?error=emptyInput");
            exit();
        }

        if($this->invalidEmail() == true){
            header("Location: ../pages/signup.html?error=invalidEmail");
            exit();
        }

        if($this->passNotMatch() == true){
            header("Location: ../pages/signup.html?error=passNotMatch");
            exit();
        }

        if($this->userExist() == true){
            header("Location: ../pages/signup.html?error=userExist");
            exit();
        }

        //run the setUser from Signup class
        $this->setUser($this->fname, $this->lname, $this->email, $this->phone, $this->address, $this->gender, $this->pass, $this->birthdate);
        
    }

    //check empty field
    private function emptyInput() {
        $result = "";
        if (
            empty($this->fname) || empty($this->lname) || empty($this->email) || empty($this->phone) || empty($this->address) || empty($this->birthdate)
            || empty($this->gender) || empty($this->pass) ||  empty($this->repass)
        ) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    // if not valid email 
    private function invalidEmail() {
        $result = "";
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    // if password match
    private function passNotMatch() {
        $result = "";
        if ($this->pass !== $this->repass) {
            $result = true;
         } else {
            $result = false;
        }
         return $result;
    }

    // if user exist return true
    private function userExist() {
        $result = "";
        if ($this->checkUser($this->email,$this->phone)) {
            $result = true;
         } else {
            $result = false;
        }
         return $result;
    }


}
