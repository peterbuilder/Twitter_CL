<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/mainPage.css">
    <title>Twitter - STRONA GŁÓWNA</title>
</head>
<body>
<div id="login">
    <form action="#" method="post">
        <input type="text" name="username" placeholder="Nazwa użytkownika">
        <input type="password" name="password" placeholder="Hasło">
        <input type="submit" value="Zaloguj">
    </form>
</div>
<div id="mainTweets">
    <h1>Strona Główna</h1>
    <?php
        $connection = new Connection();
        Tweet::showAllTweets($connection);
    ?>
</div>
</body>
</html>