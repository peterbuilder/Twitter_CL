<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 02.02.17
 * Time: 15:40
 */

include 'app/library.php';

$connection = new Connection();
$tweets = Tweet::loadAllTweets($connection);
//var_dump($tweets);
?>

<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/mainPage.css">
    <title>Twitter - STRONA GŁÓWNA</title>
</head>
<body>
<p>Strona Główna</p>
<div id="mainTweets">
    <?php
        foreach($tweets as $tweet)
        {
            $text = $tweet->getText();
            $username= $tweet->getUsername();
            $date = $tweet->getCreationDate();
            Tweet::showTweet($text, $username, $date);
        }
    ?>
</div>
</body>
</html>
