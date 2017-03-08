<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 06.02.17
 * Time: 19:19
 */
session_start();
header('Refresh: 0; url=../index.php');
include 'library.php';
$connection = new Connection();
Tweet::addTweet($connection, $_POST['tweetText']);
