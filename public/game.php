<!doctype html>
<?php session_start();
require('../app/config/DatabaseConnector.php');
if (isset($_SESSION['login']))
{
  if (isset($_SESSION['game']))
  {
    ?>
<html class="no-js" lang="">

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
    <div class="header_bar_game">
    <?php
    $game_id = $_SESSION['game'];
    $getGameName = "SELECT `tbl_savegames`.`game_name` FROM `tbl_savegames` WHERE `tbl_savegames`.`game_id` = $game_id";
    $game_name = $database->query($getGameName)->fetchAll();
    foreach ($game_name as $gName) {
      ?><div class="header_bar_game_name"><div></div><span><?php echo $gName["game_name"];?></span><div></div></div><?php
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
    <a href="../app/QuitGameHandler.php"><div class="quit_button"><div></div><span>Quit</span><div></div></div></a>
    </div>
    <div id="settings" class="settings_overlay">
    	<div class="settings_popup">
    		<a class="close_settings" href="#">&times;</a>
    		<div class="settings_content">
          <h1>Settings</h1>
          <hr>
          <h2>Game Colour</h2>
          <form method="post">
            <input type="radio" name="colour_1" required>
            <input type="radio" name="colour_1" required>
            <input type="radio" name="colour_1" required>
            <input type="radio" name="colour_1" required>
            <input type="radio" name="colour_1" required>
            <input id="submit" type="submit" value="Change Colour">
          </form>
          <hr>
          <h2>Rename Save</h2>
          <form method="post">
            <input type="text" name="save_name" placeholder="New Save Name" required maxlength="20" minlength="3">
            <input id="submit" type="submit" value="Rename">
          </form>
          <hr>
          <h2>Delete Save</h2>
          <form method="post">
            <input id="submit" type="submit" value="Delete Save">
          </form>
    		</div>
    	</div>
    </div>
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


    </html><?php
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
