<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 03.02.17
 * Time: 16:27
 */

class Authorization
{
    static public function logIn(Connection $connection)
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT hashed_password FROM user WHERE username='$username'";
        $result = $connection->query($sql);
        $result = $result->fetch_assoc();
        $hashedPassword = $result['hashed_password'];

        if(password_verify($password, $hashedPassword))
        {
            $_SESSION['logged'] = $username;
            return true;
        } else
            {
                return false;
            }
    }
}

