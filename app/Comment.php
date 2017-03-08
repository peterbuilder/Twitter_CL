<?php

/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 06.02.17
 * Time: 20:19
 */
class Comment
{
    private $id;
    private $userId;
    private $postId;
    private $creationDate;
    private $text;
    private $username;

    /**
     * Comment constructor.
     * @param $id
     * @param $userId
     * @param $postId
     * @param $creationDate
     * @param $text
     */
    public function __construct()
    {
        $this->id = -1;
        $this->userId = '';
        $this->postId = '';
        $this->creationDate = '';
        $this->text = '';
        $this->username = '';
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getPostId()
    {
        return $this->postId;
    }

    public function setPostId($postId)
    {
        $this->postId = $postId;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    static public function loadCommentById(Connection $connection, $id)
    {
        $sql = "SELECT * FROM comment WHERE id=$id";
        $result = $connection->query($sql);

        if($result && $result->num_rows == 1) {
            $row = $result->fetch_assoc();

            $loadedComment = new Comment();
            $loadedComment->id = $row['id'];
            $loadedComment->userId = $row['userId'];
            $loadedComment->postId = $row['postId'];
            $loadedComment->text = $row['text'];
            $loadedComment->creationDate = $row['creationDate'];

            return $loadedComment;
        }
    }

    static public function loadAllCommentsByPostId(Connection $connection, $postId)
    {
        $sql = "SELECT c.id, c.userId, c.postId, c.creationDate, c.text, u.username 
                FROM comment 
                as c 
                JOIN user 
                as u 
                ON c.userId = u.id 
                AND postId=$postId";
        $result = $connection->query($sql);

        if($result && $result->num_rows != 0) {
            $array = [];

            foreach ($result as $row) {
                $loadedComment = new Comment();
                $loadedComment->id = $row['id'];
                $loadedComment->userId = $row['userId'];
                $loadedComment->postId = $row['postId'];
                $loadedComment->text = $row['text'];
                $loadedComment->creationDate = $row['creationDate'];
                $loadedComment->username = $row['username'];
                $array[] = $loadedComment;
            }

            return $array;
        } else {
            return $array = [];
        }
    }

    static public function commentToHTML($text, $username, $date)
    {
        echo '<div class="commentClass">';
            echo '<div class="commentText">';
                echo $text;
            echo '</div>';
            echo '<div class="commentUsername">';
                echo $username;
            echo '</div>';
            echo '<div class="commentDate">';
                echo $date;
            echo '</div>';
        echo '</div>';
    }

    static public function showAllComments(Connection $connection, array $comments)
    {
        foreach($comments as $comment)
        {
            $text = $comment->getText();
            $username= $comment->getUsername();
            $date = $comment->getCreationDate();
            Comment::commentToHTML($text, $username, $date);
        }
    }

}

