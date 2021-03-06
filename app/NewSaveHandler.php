<?php
require('PostHandler.php');
require('config/DatabaseConnector.php');
session_start();

if (isset($_SESSION['login']))
{
  $saveNameLength = false;
  $save_nameNotExist = false;

$user_login = $_SESSION['login'];
  $getUserID = "SELECT * FROM `tbl_login` WHERE `tbl_login`.`username` = '$user_login'";
  $user_id = $database->query($getUserID)->fetchAll();

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

function getSaveAmount($user_id, $save_name, $database)
{
  foreach ($user_id as $uid) {
    $userIDNumber = $uid["id"];
    $getSaveNameDatabaseQuery = "SELECT `game_name` FROM `tbl_savegames` WHERE `game_name` = '$save_name' AND `user_id` = $userIDNumber";
  }

    $resultsUncounted = $database->query($getSaveNameDatabaseQuery) ->fetchAll();

      return count($resultsUncounted);
  }

  if(getSaveAmount($user_id, $save_name,$database) < 1)
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
            window.location.replace("../public/game.php");
        },0);</script>
    <?php
  }
  else
  {
    ?>
    <script type='text/javascript'>
        setTimeout(function () {
            window.location.replace("../public/savegames.php");
        },0);</script>
    <?php
  }
}
else
{
  ?>
  <script type='text/javascript'>
      setTimeout(function () {
          window.location.replace("../public/login.php");
      },0);</script>
  <?php
}
