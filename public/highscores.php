<?php
require('../app/config/DatabaseConnector.php');
session_start();

$getHighscoresQuery = "SELECT `tbl_login`.`score` , `tbl_login`.`username` FROM `tbl_login` ORDER BY `tbl_login`.`score` DESC, `tbl_login`.`username` DESC LIMIT 10"; // we willen natuurlijk niet alle scores laten zien, alleen de hoeveelheid dat de gebruiker aangeeft.

$Highscores = $database->query($getHighscoresQuery)->fetchAll();
$scoreString= " score:  ";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">

</head>
<body>

<div class="container">
    <ol>
      <div class="all_scores">
        <?php
        foreach($Highscores as $score) {
            ?>
            <li> <div class="score"><?php echo $score["username"].$scoreString.$score["score"]?></div></li>
            <?php
        }
        ?>
      </div>
    </ol>

</div>
</body>
</html>
