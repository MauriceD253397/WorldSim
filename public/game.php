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

    ?>

    // the game

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
