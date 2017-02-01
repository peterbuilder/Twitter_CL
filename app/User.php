<?php

/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 31.01.17
 * Time: 21:09
 */
class User
{
    private $id;
    private $username;
    private $email;
    private $hashedPassword;

    /**
     * User constructor.
     * @param $id
     */
    public function __construct()
    {
        $this->id = -1;
        $this->username = '';
        $this->email = '';
        $this->hashedPassword = '';
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @param string $hashedPassword
     */
    public function setHashedPassword(string $password)
    {
        $this->hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * @return string
     */
    public function getHashedPassword(): string
    {
        return $this->hashedPassword;
    }

    public function saveToDB(Connection $connection)
    {
        if($this->id == -1)
        {
            $sql = "INSERT INTO User (username, email, hashed_password) 
                      VALUES ('$this->username', '$this->email', '$this->hashedPassword')";
            $result = $connection->query($sql);

            if($result == true)
            {
                $this->id = $connection->insert_id();
                return true;
            }
        } else
            {
                $sql = "UPDATE User SET 
                          username=$this->username,
                          email=$this->email,
                          hashed_password=$this->hashedPassword";
                $result = $connection->query($sql);

                if($result == true)
                {
                    return true;
                } else
                    {
                     return false;
                    }
            }

    }

    public function getUserById(Connection $connection, $id)
    {
        $sql = "SELECT * FROM User WHERE id=$id";
        $result = $connection->query($id);

        if($result == true && $result->num_rows == 1)
        {
            $row = $result->fetch_assoc();

            $loadedUser = new User();
            $loadedUser->id = $row['id'];
            $loadedUser->username = $row['username'];
            $loadedUser->email = $row['email'];
            $loadedUser->hashedPassword = $row['hashed_password'];

            return $loadedUser;
        }
        return false;

    }

}