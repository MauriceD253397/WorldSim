<?php
require('PostHandler.php');
require('config/DatabaseConnector.php');

$saveNameLength = false;
$save_nameNotExist = false;

if(strlen($save_name) >= 3) { //strlen is functie voor grootte van string.
  if(strlen($save_name) <= 15) { //strlen is functie voor grootte van string.
      $saveNameLength = true;
  }
  else{
      ?>
      <script type='text/javascript'>
          setTimeout(function () {
              window.location.replace("../public/savegames.php");
          },0);</script>
      <?php
  }
}
else{
    ?>
    <script type='text/javascript'>
        setTimeout(function () {
            window.location.replace("../public/savegames.php");
        },0);</script>
    <?php
}

function getSaveAmount($save_name, $database)
{

    $getSaveNameDatabaseQuery = "SELECT `game_name` FROM `tbl_savegames` WHERE `game_name` = '$save_name'";

    $resultsUncounted = $database->query($getSaveNameDatabaseQuery) ->fetchAll();

    return count($resultsUncounted);
}

  if(getSaveAmount($save_name,$database) < 1)
  {
      $save_nameNotExist = true;
  }
  else{
      ?>
      <script type='text/javascript'>
          setTimeout(function () {
              window.location.replace("../public/savegames.php");
          },0);</script>
      <?php
  }


  $user_login = $_SESSION['login'];
  $getUserID = "SELECT * FROM `tbl_login` WHERE `tbl_login`.`username` = '$user_login'";
  $user_id = $database->query($getUserID)->fetchAll();
  foreach ($user_id as $uid) {
    $userIDNumber = $uid["id"];
    $getExistingSaves = "SELECT `tbl_savegames`.`game_id` FROM `tbl_savegames` WHERE `tbl_savegames`.`user_id` = $userIDNumber ORDER BY `tbl_savegames`.`game_id` ASC";
  }
  $existingSaves = $database->query($getExistingSaves)->fetchAll();
  $countedSaves = count($existingSaves);
  if (($countedSaves < 3) && ($saveNameLength == true) && ($save_nameNotExist == true))
  {
    foreach ($user_id as $uid) {
      $userIDNumber = $uid["id"];
    $inputSaveQuery = "INSERT INTO `tbl_savegames` (`game_id`, `user_id`, `game_name`, `date_created`, `date_last_opened`) VALUES (NULL, '$userIDNumber', '$save_name', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";
  }
    $database->query($inputSaveQuery);
    $new_game_id = $database->lastInsertId();
      $_SESSION['game'] = $new_game_id;
    ?>
    <script type='text/javascript'>
        setTimeout(function () {
            window.location.replace("../public/savegames.php");
        },0);</script>
    <?php
}


  session_start();
$user_login = $_SESSION['login'];
$getUserID = "SELECT * FROM `tbl_login` WHERE `tbl_login`.`username` = '$user_login'";
$user_id = $database->query($getUserID)->fetchAll();
foreach ($user_id as $uid) {
  $userIDNumber = $uid["id"];
  $getExistingSaves = "SELECT `tbl_savegames`.`game_id` FROM `tbl_savegames` WHERE `tbl_savegames`.`user_id` = $userIDNumber ORDER BY `tbl_savegames`.`game_id` ASC";
}
$existingSaves = $database->query($getExistingSaves)->fetchAll();
$countedSaves = count($existingSaves);
if (($countedSaves < 3) && ($saveNameLength == true) && ($save_nameNotExist == true))
{
  foreach ($user_id as $uid) {
    $userIDNumber = $uid["id"];
  $inputSaveQuery = "INSERT INTO `tbl_savegames` (`game_id`, `user_id`, `game_name`, `population`, `mana`) VALUES (NULL, '$userIDNumber', '$save_name', 0, 0);";
}
  $database->query($inputSaveQuery);
  $new_game_id = $database->lastInsertId();
    $_SESSION['game'] = $new_game_id;
  ?>
  <script type='text/javascript'>
      setTimeout(function () {
          window.location.replace("../public/game.php");
      },0);</script>
  <?php
}
