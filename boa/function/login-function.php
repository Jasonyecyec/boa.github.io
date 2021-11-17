<?php

if(isset($_POST["submit"])){

    //Grabbing the data from signup form
    $email = $_POST['email'];
    $pass= $_POST['password'];
    

    //Instantiate  Login control class  
    include "../classes/database-class.php";
    include "../classes/login-class.php";
    include "../classes/login-control-class.php";

    $Login = new LoginControl($email, $pass);

    //Running error handlers and user signup
    $Login->loginUser($email,$pass);

    //Going back to front page if signup success
    header("Location: ../index.php?error=none");
    
}