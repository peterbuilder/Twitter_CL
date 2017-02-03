<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 01.02.17
 * Time: 21:35
 */

class Tweet
{
    private $id;
    private $userId;
    private $text;
    private $creationDate;
    private $username;


    /**
     * Tweet constructor.
     */
    public function __construct()
    {
        $this->id = -1;
        $this->userId = -1;
        $this->text = '';
        $this->creationDate = '';
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text)
    {
        if(strlen($text) <= 140)
        {
            $this->text = $text;
        } else
            {
                return false;
            }
    }

    /**
     * @return string
     */
    public function getCreationDate(): string
    {
        return $this->creationDate;
    }

    /**
     * @param string $creationDate
     */
    public function setCreationDate(string $creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }



    static public function loadTweetById(Connection $connection, $id)
    {
        $sql = "SELECT * FROM tweet WHERE id=$id";
        $result = $connection->query($sql);

        if($result == true && $result->num_rows == 1)
        {
            $row = $result->fetch_assoc();

            $loadedTweet = new Tweet();
            $loadedTweet->id = $row['id'];
            $loadedTweet->userId = $row['userId'];
            $loadedTweet->text = $row['text'];
            $loadedTweet->creationDate = $row['creationDate'];

            return $loadedTweet;
        }
        return null;
    }

    static public function loadAllTweetsByUserId(Connection $connection, $userId)
    {
        $sql = "SELECT * FROM tweet WHERE userId=$userId";
        $result = $connection->query($sql);

        if($result == true && $result->num_rows != 0)
        {
            $array = [];
            foreach($result as $row)
            {
                $loadedTweet = new Tweet();
                $loadedTweet->id = $row['id'];
                $loadedTweet->userId = $row['userId'];
                $loadedTweet->text = $row['text'];
                $loadedTweet->creationDate = $row['creationDate'];
                $loadedTweet->username = $row['username'];

                $array[] = $loadedTweet;
            }
            return $array;
        }
    }

    static public function loadAllTweets(Connection $connection)
    {
        $sql = "SELECT * FROM tweet JOIN user ON user.id = tweet.userId";
        $result = $connection->query($sql);

        if($result == true && $result->num_rows != 0)
        {
            $array = [];

            foreach($result as $row)
            {
                $loadedTweet = new Tweet();
                $loadedTweet->id = $row['id'];
                $loadedTweet->userId = $row['userId'];
                $loadedTweet->text = $row['text'];
                $loadedTweet->creationDate = $row['creationDate'];
                $loadedTweet->username = $row['username'];

                $array[] = $loadedTweet;
            }
            return $array;
        }
        return null;
    }

    public function saveToDB(Connection $connection)
    {
        if($this->id == -1)
        {
            $sql = "INSERT INTO tweet (userId, text, creationDate) 
                    VALUES ('$this->userId', '$this->text', '$this->creationDate')";
            $result = $connection->query($sql);

            if($result == true)
            {
                $this->id = $connection->insert_id;
                return true;
            }
        } else
            {
                $sql = "UPDATE tweet SET
                          userId='$this->userId',
                          text='$this->text',
                          creationDate='$this->creationDate'
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

    public function delete(Connection $connection)
    {
        if($this->id != -1)
        {
            $sql = "DELETE FROM tweet WHERE id=$this->id";
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

    static public function showTweet($text, $username, $date)
    {
        echo '<div class="tweetClass">';
            echo '<div class="tweetText">';
                echo $text;
            echo '</div>';
            echo '<div class="tweetUsername">';
                echo $username;
            echo '</div>';
            echo '<div class="tweetDate">';
                echo $date;
            echo '</div>';
        echo '</div>';

    }

}



