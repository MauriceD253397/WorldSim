<?php

require('config/DatabaseConnector.php');
session_start();

$game_id = $_SESSION['game'];

// get the p parameter from URL
$game_population = $_REQUEST["p"];
if (!$game_population == 0)
{
  $setGameStats = "UPDATE `tbl_savegames` SET `population` = $game_population WHERE `tbl_savegames`.`game_id` = $game_id";
  $database->query($setGameStats);
}

// get the m parameter from URL
$game_mana = $_REQUEST["m"];
if (!$game_mana == 0)
{
  $setGameStats = "UPDATE `tbl_savegames` SET `mana` = $game_mana WHERE `tbl_savegames`.`game_id` = $game_id";
  $database->query($setGameStats);
}

// get the t parameter from URL
$game_turn = $_REQUEST["t"];
if (!$game_turn == 0)
{
  $setGameStats = "UPDATE `tbl_savegames` SET `turn` = $game_turn WHERE `tbl_savegames`.`game_id` = $game_id";
  $database->query($setGameStats);
}
?>
