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
            $sql = "INSERT INTO user (username, email, hashed_password) 
                      VALUES ('$this->username', '$this->email', '$this->hashedPassword')";
            $result = $connection->query($sql);

            if($result == true)
            {
                $this->id = $connection->insert_id;
                return true;
            }
        } else
            {
                $sql = "UPDATE user SET 
                            username='$this->username',
                            email='$this->email',
                            hashed_password='$this->hashedPassword'
                          WHERE id=$this->id";
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

    static public function getUserById(Connection $connection, $id)
    {
        $sql = "SELECT * FROM user WHERE id=$id";
        $result = $connection->query($sql);

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
        return null;
    }

    static public function getAllUsers(Connection $connection)
    {
        $array = [];
        $sql = "SELECT * FROM user";
        $result = $connection->query($sql);

        if($result == true && $result->num_rows != 0)
        {
            foreach($result as $row)
            {
                $loadedUser = new User();

                $loadedUser->id = $row['id'];
                $loadedUser->username = $row['username'];
                $loadedUser->email = $row['email'];
                $loadedUser->hashedPassword = $row['hashed_password'];

                $array[] = $loadedUser;
            }
            return $array;
        }
        return null;
    }

    public function delete(Connection $connection, $id)
    {
        if($this->id != -1)
        {
            $sql = "DELETE FROM user WHERE id=$id";
            $result = $connection->query($sql);

            if($result == true)
            {
                $this->id = -1;
                return true;
            } else
            {
                return false;
            }
        } else
            {
                return true;
            }
    }

}

