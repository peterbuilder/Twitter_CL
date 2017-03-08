<?php

/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 02.02.17
 * Time: 15:40
 */
session_start();

include 'app/library.php';

if(!isset($_SESSION['logged']))
{
    require 'content/loggedOut.php';
} else
    {
        require 'content/loggedIn.php';
    }

?>


