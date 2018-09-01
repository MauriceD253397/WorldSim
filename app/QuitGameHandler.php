<?php

require('config/DatabaseConnector.php');
session_start(); // session moet gek genoeg ALTIJD gestart worden.
$game_id = $_SESSION['game'];
  $input_last_opened = "UPDATE `tbl_savegames` SET `date_last_opened` = CURRENT_TIMESTAMP WHERE `tbl_savegames`.`game_id` = $game_id;";
  $database->query($input_last_opened);
$_SESSION['game'] = NULL;
// Nu maken we de session null en vernietigen we de session

?>

<script type='text/javascript'>
    setTimeout(function () {
        window.location.replace("../public/savegames.php");
    },0);</script>
