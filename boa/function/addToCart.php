<?php
session_start();
if(isset($_POST['submit'])){
    
    //if has session 
    if($_SESSION['first-name']){
        header("Location: https://www.google.com/");
    }else{
        header("Location: ../pages/login.html");
        exit();
    }
}
