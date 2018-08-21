<?php
require('../app/config/DatabaseConnector.php');
session_start();
if (isset($_SESSION['login']))
{
  if (isset($_SESSION['game']))
  {
    $game = $_SESSION['game'];
    $getGameID = "SELECT `tbl_savegames`.`game_id` FROM `tbl_savegames` WHERE `tbl_savegames`.`game_id` = $game ORDER BY `tbl_savegames`.`game_id` ASC";
    $game_id = $database->query($getGameID)->fetchAll();
    foreach ($game_id as $gID) {
      // ...
    }
    ?>

    // the game

    // quit game session

    <?php
  }
  else
  <script type='text/javascript'>
      setTimeout(function () {
          window.location.replace("../public/savegames.php");
      },0);</script>
}
else
<script type='text/javascript'>
    setTimeout(function () {
        window.location.replace("../public/login.php");
    },0);</script>
?>
