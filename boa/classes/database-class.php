<?php

 class Database{
     
    //function to connect to database
     protected function connect(){
         try{
            $username = "root";
            $password = "";
            $db = new PDO('mysql:host=localhost;dbname=boa',$username,$password);
            return $db;
         }catch(PDOException $e){
            print "Error!! : ". $e->getMessage()."</br>";
            die();  
         }
     }
 }