<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 05.02.17
 * Time: 12:04
 */
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/mainPage.css">
    <title>Twitter - STRONA GŁÓWNA</title>
</head>
<body>
<div id="login">
    <form action="login.php" method="post">
        <button type="submit" formaction="login.php" formmethod="get" name="logeout">Wyloguj</button>
    </form>
</div>
<div id="mainTweets">
    <h1>Strona Główna</h1>
    <?php
        $connection = new Connection();
        $tweets = Tweet::loadAllTweets($connection);
        Tweet::showAllTweets($connection, $tweets);
//        Tweet::addTweet($connection, $_POST['tweetText']);
        //wywołać addTweet() na innej podstronie i potem wrócić do tej (header...)
        unset($_POST['tweetText']);

    ?>
    <form action="app/addTweet.php" method="post">
        <input type="text" id="addTweet" maxlength="140"
            placeholder="Treść Tweeta" name="tweetText">
        <input type="submit" value="Wyślij">
    <form>
</div>
</body>
</html>