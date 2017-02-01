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

                $array[] = $loadedTweet;
            }
            return $array;
        }
    }

}
