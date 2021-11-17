<?php

if(isset($_POST["submit"])){

    //Grabbing the data from signup form
    $fname = $_POST['first-name'];
    $lname = $_POST['last-name'];
    $email = $_POST['email'];
    $phone = $_POST['phone-num'];
    $address = $_POST['address'];
    $birthdate = date('Y-m-d',strtotime($_POST['birthdate']));
    $gender = $_POST['gender'];
    $pass= $_POST['password'];
    $repass = $_POST['re-password'];

    //Instantiate  Signup control class  
    include "../classes/database-class.php";
    include "../classes/signup-class.php";
    include "../classes/signup-control-class.php";

    $Signup = new SignupControl($fname, $lname,$email, $phone, $address, $birthdate, $gender, $pass, $repass);

    //Running error handlers and user signup
    $Signup->SignupUser();

    //Going back to front page if signup success
    header("Location: ../index.php?error=none");
    
}