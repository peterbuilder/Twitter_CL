<?php

/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 31.01.17
 * Time: 15:05
 */

class Connection
{
    private $mysqli;
    public $insert_id;

    public function __construct()
    {
        require 'config.php';

        $this->mysqli = new mysqli($host, $user, $password, $database);

        if($this->mysqli->connect_error)
        {
            die('Połączenie z bazą nieudane: '.$this->mysqli->connect_error);
        } else
            {
                $this->mysqli->set_charset("utf8");
                return true;
            }
    }

    public function query($sql)
    {
        $result = $this->mysqli->query($sql);

        if($result == false)
        {
            die("Błąd zapytania: ".$this->mysqli->error);
        } else
            {
                return $result;
            }
    }
}
