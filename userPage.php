<?php
session_start();
require 'app/library.php'
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/mainPage.css">
    <title>Twitter - STRONA UŻYTKOWNIKA</title>
</head>
<body>
<div id="login">
    <form action="index.php" method="post">
        <button type="submit" formaction="index.php" formmethod="get" name="logeout">Wyloguj</button>
    </form>
</div>
<div id="mainTweets">
    <h1>Twoje posty</h1>
    <?php
    if(isset($_SESSION['logged']))
    {
        $connection = new Connection();
        $userId = Tweet::getUserIdByUserName($connection);
        Tweet::showAllTweetsByUserId($connection, $userId);
    } else
        {
            echo 'Użytkownik niezalogowany';
        }

    ?>
</div>
</body>
</html>