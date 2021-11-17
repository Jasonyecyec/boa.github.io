<?php

class Login extends Database
{

    protected function getUser($email,$pass){
        $stmt = $this->connect()->prepare('SELECT pass FROM users WHERE email = ?; OR pass = ?;');
        
        //execute stmt if fail return to login
        if (!$stmt->execute(array($email,$pass))) {
            $stmt = null;
            header("Location: ../pages/login.html?error=stmtfailed");
            exit();
        }

        //if stmt has no value return to login
        if($stmt->rowCount() == 0){
            $stmt = null;
            header("Location: ../pages/login.html?error=usernotexist");
            exit();
        } 

        //fetch the hash password from stmt then compare it to pass
        $passHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkpass = password_verify($pass, $passHashed[0]["pass"]);

        //if checkpass is true run another stmt else return to login
        if($checkpass){

            //prepare another stmt, select all
            $stmt1 = $this->connect()->prepare('SELECT * FROM users WHERE email = ? OR pass = ?;');

            //execute stmt1 if fail return to login
            if (!$stmt1->execute(array($email,$pass))) {
                $stmt1 = null;
                header("Location: ../pages/login.html?error=stmtfailed");
                exit();
            }

            //if stmt has no value return to login
            if($stmt1->rowCount() == 0){
                $stmt1 = null;
                header("Location: ../pages/login.html?error=noUser");
                exit();
            } 

            //store to user and start a global session
            $user = $stmt1->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION['first-name'] = $user[0]["first_name"];
            $_SESSION['last-name'] = $user[0]["last_name"];


        }else{
            $stmt = null;
            header("Location: ../pages/login.html?error=wrongpassword");
            exit();
        }

        $stmt = null;
    }




}
