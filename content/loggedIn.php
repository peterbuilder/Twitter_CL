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
    <form action="userPage.php" method="post">
        <button type="submit" formaction="userPage.php" formmethod="get" name="logeout">Wyloguj</button>
    </form>
</div>
<div id="mainTweets">
    <h1>Strona Główna</h1>
    <?php
        $connection = new Connection();
        Tweet::showAllTweets($connection);
        Tweet::addTweet($connection);

    ?>
    <form action="#" method="post">
        <input type="text" id="addTweet" maxlength="140"
            placeholder="Treść Tweeta" name="tweetText">
        <input type="submit" value="Wyślij">
    <form>
</div>
</body>
</html>