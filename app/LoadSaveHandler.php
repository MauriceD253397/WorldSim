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
  if ($select_game == "Load Save")
  {
    $input_last_opened = "UPDATE `tbl_savegames` SET `date_last_opened` = CURRENT_TIMESTAMP WHERE `tbl_savegames`.`game_id` = $game_id;";
    $database->query($input_last_opened);
    $_SESSION['game'] = $game_id;

  ?>
  <script type='text/javascript'>
      setTimeout(function () {
          window.location.replace("../public/game.php");
      },0);</script>
  <?php
  }
  else if ($select_game == "Delete Save")
  {
    $deleteChosenSave = "DELETE FROM `tbl_savegames` WHERE `tbl_savegames`.`game_id` = $game_id;";
    $database->query($deleteChosenSave);
    $deleteChosenSave = "DELETE FROM `tbl_population` WHERE `tbl_population`.`game_id` = $game_id;";
    $database->query($deleteChosenSave);
    $_SESSION['game'] = NULL;
    ?>
    <script type='text/javascript'>
        setTimeout(function () {
            window.location.replace("../public/savegames.php");
        },0);</script>
    <?php
  }
}
