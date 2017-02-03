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
<div id="login">
    <form>
        <input type="text" name="username" placeholder="Nazwa użytkownika">
        <input type="text" name="password" placeholder="Hasło">
        <input type="submit" value="Zaloguj">
    </form>
</div>
<div id="mainTweets">
    <h1>Strona Główna</h1>
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
