<?php
require('../app/config/DatabaseConnector.php');
session_start();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div class="container">
    <pre>
    <?php

        $getHighscoresQuery = "SELECT `name` , `highscore` FROM `tbl_highscores` WHERE `id` <= 10"; // we willen natuurlijk niet alle scores laten zien, alleen de hoeveelheid dat de gebruiker aangeeft.

        $Highscores = $database->query($getHighscoresQuery)->fetchAll();

        var_dump($Highscores[0]);
        var_dump($Highscores);
        ?>
    </pre>
        <ul>
        <?
        foreach($Highscores as $scores)       // nu laten we voor iedere
        {
            var_dump($scores);
        ?>

            <li></li>
         <?php
        }
        ?>
        </ul>
</div>

</body>
</html>
