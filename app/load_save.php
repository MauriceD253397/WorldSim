<?php
require('PostHandler.php');
require('config/DatabaseConnector.php');

  session_start();
$user_login = $_SESSION['login'];
$getUserID = "SELECT * FROM `tbl_login` WHERE `tbl_login`.`username` = '$user_login'";
$user_id = $database->query($getUserID)->fetchAll();
foreach ($user_id as $uid) {
  $userIDNumber = $uid["id"];
  $getExistingSaves = "SELECT `tbl_savegames`.`game_id` FROM `tbl_savegames` WHERE `tbl_savegames`.`user_id` = $userIDNumber AND `tbl_savegames`.`game_id` = $game_id ORDER BY `tbl_savegames`.`game_id` ASC";
}
$existingSaves = $database->query($getExistingSaves)->fetchAll();
$countedSaves = count($existingSaves);
if ($countedSaves == 1)
{

  session_start();
  $_SESSION['game'] = $game_id;
  ?>
  <script type='text/javascript'>
      setTimeout(function () {
          window.location.replace("../public/game.php");
      },0);</script>
  <?php
}
