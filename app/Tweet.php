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
    private $creationData;

    /**
     * Tweet constructor.
     */
    public function __construct()
    {
        $this->id = -1;
        $this->userId = -1;
        $this->text = '';
        $this->creationData = '';
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
    public function getCreationData(): string
    {
        return $this->creationData;
    }

    /**
     * @param string $creationData
     */
    public function setCreationData(string $creationData)
    {
        $this->creationData = $creationData;
    }




}