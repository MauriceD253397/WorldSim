<?php
require('PostHandler.php');
require('config/DatabaseConnector.php');
session_start();

if (isset($_SESSION['login']))
{
  if (isset($_SESSION['game']))
  {
    $game_id = $_SESSION['game'];
    $saveNameLength = false;
    $save_nameNotExist = false;

    $user_login = $_SESSION['login'];
    $getUserID = "SELECT * FROM `tbl_login` WHERE `tbl_login`.`username` = '$user_login'";
    $user_id = $database->query($getUserID)->fetchAll();

  if((strlen($save_name) >= 3) && (strlen($save_name) <= 15)) { //strlen is functie voor grootte van string.
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

    function getSaveAmount($user_id, $save_name, $database)
    {
      foreach ($user_id as $uid) {
      $userIDNumber = $uid["id"];
      $getSaveNameDatabaseQuery = "SELECT `game_name` FROM `tbl_savegames` WHERE `game_name` = '$save_name' AND `user_id` = $userIDNumber";
    }

        $resultsUncounted = $database->query($getSaveNameDatabaseQuery)->fetchAll();

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
    if (($saveNameLength == true) && ($save_nameNotExist == true))
    {
      $updateSaveQuery = "UPDATE `tbl_savegames` SET `tbl_savegames`.`game_name` = '$save_name' WHERE `tbl_savegames`.`game_id` = $game_id";
      $database->query($updateSaveQuery);
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
