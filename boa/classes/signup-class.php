<?php

class Signup extends Database
{

    protected function setUser($fname, $lname, $email, $phone, $address, $gender, $pass, $birthdate){
        $stmt = $this->connect()->prepare('INSERT INTO users(first_name, last_name, email, phone_num, user_address, gender, pass, birthdate)
            VALUES  (?,?,?,?,?,?,?,?);');

        //hash password first
        $hashedpass = password_hash($pass, PASSWORD_DEFAULT);

        //execute stmt if fail return to login
        if (!$stmt->execute(array($fname, $lname, $email, $phone, $address, $gender, $hashedpass, $birthdate))) {
            $stmt = null;
            header("Location: ../pages/signup.html?error=stmtfailed");
            exit();
        }

        //end stmt 
        $stmt = null;

        //create new stmt to fetch user data
        $stmt1 = $this->connect()->prepare('SELECT * FROM users WHERE email = ? OR pass = ?;');

        //execute stmt if fail return to login
        if (!$stmt1->execute(array($email, $pass))) {
            $stmt1 = null;
            header("Location: ../pages/login.html?error=stmtfailed");
            exit();
        }
        
         //store to user and start a global session
        $user = $stmt1->fetchAll(PDO::FETCH_ASSOC);

        session_start();
        $_SESSION['first-name'] = $user[0]["first_name"];
        $_SESSION['last-name'] = $user[0]["last_name"];

        $stmt1 = null;
    }

    // if user exist return true
    protected function checkUser($email, $phone)
    {
        $stmt = $this->connect()->prepare('SELECT email FROM users WHERE email = ? OR phone_num = ?;');

        if (!$stmt->execute(array($email, $phone))) {
            $stmt = null;
            header("Location: ../pages/signup.html?error=stmtfailed");
            exit();
        }

        $result = "";
        if ($stmt->rowCount() > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;

        $stmt = null;
    }
}
