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
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * @param mixed $postId
     */
    public function setPostId($postId)
    {
        $this->postId = $postId;
    }

    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param mixed $creationDate
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }



}