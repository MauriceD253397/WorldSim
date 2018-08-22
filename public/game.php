<!doctype html>
<html class="no-js" lang="">
<?php
require('../app/config/DatabaseConnector.php');
session_start();
if (isset($_SESSION['login']))
{
  if (isset($_SESSION['game']))
  {
    $game_id = $_SESSION['game'];
    $getGameName = "SELECT `tbl_savegames`.`game_name` FROM `tbl_savegames` WHERE `tbl_savegames`.`game_id` = $game_id";
    $game_name = $database->query($getGameName)->fetchAll();
    foreach ($game_name as $gName) {
      echo $gName["game_name"];
    }

    $getGameStats = "SELECT `tbl_savegames`.`population`, `tbl_savegames`.`mana` FROM `tbl_savegames` WHERE `tbl_savegames`.`game_id` = $game_id";
    $game_stats = $database->query($getGameStats)->fetchAll();
    foreach ($game_stats as $gStats) {
      echo " Population: ".$gStats["population"]." Mana: ".$gStats["mana"];
    }

    $user_id = $_SESSION['game'];
    $getUserScore = "SELECT `tbl_login`.`score` FROM `tbl_login` WHERE `tbl_login`.`id` = $user_id;";
    $userScore = $database->query($getUserScore)->fetchAll();
    foreach ($game_stats as $gStats) {
      foreach ($userScore as $uScore) {
        if ($gStats["population"] > $uScore["score"])
        {
          $population = $gStats["population"];
          $setUserScore = "INSERT INTO `tbl_login` (`score`) VALUES ($population)";
        }
      }
    }

    ?>

    // the game

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/game.css">
    </head>

    <body>
        <div class="container">

            <div class="console">
                
            </div>

        </div>
    </body>



    // quit game session

    <?php
  }
  else
  { ?>
  <script type='text/javascript'>
      setTimeout(function () {
          window.location.replace("../public/savegames.php");
      },0);</script>
      <?php
    }
}
else
{?>
<script type='text/javascript'>
    setTimeout(function () {
        window.location.replace("../public/login.php");
    },0);</script>
    <?php
}?>
</html>
