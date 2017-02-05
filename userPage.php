<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 03.02.17
 * Time: 18:59
 */

session_start();
include 'app/Authorization.php';

switch(true)
{
    case ($_SERVER['REQUEST_METHOD'] == "POST"):
                                            include 'app/Connection.php';

                                            $connection = new Connection();
                                            Authorization::logIn($connection);

                                            if(isset($_SESSION['logged']))
                                            {
                                                echo 'Zalogowano: ';
                                                echo $_SESSION['logged'] . '<br>';
                                                echo '<form>';
                                                echo '<button type="submit" formaction="index.php">Powrót</button>';
                                                echo '<form>';
                                                header('Refresh: 2; url=index.php');
                                            } else
                                                {
                                                    echo 'Błąd logowania';
                                                    echo '<form>';
                                                    echo '<button type="submit" formaction="index.php">Powrót</button>';
                                                    echo '<form>';
                                                    header('Refresh: 2; url=index.php');
                                                }
                                            break;

    case ($_SERVER['REQUEST_METHOD'] == "GET"):
                                            Authorization::logeOut();
                                            echo '<form>';
                                            echo '<button type="submit" formaction="index.php">Powrót</button>';
                                            echo '<form>';
                                            header('Refresh: 2; url=index.php');
                                            break;
}

