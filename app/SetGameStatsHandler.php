<?php

require('config/DatabaseConnector.php');
session_start();

if (isset($_SESSION['login']))
{
  if (isset($_SESSION['game']))
  {
    $game_id = $_SESSION['game'];

    // get the p parameter from URL
    $game_population = $_REQUEST["p"];
    if (!$game_population == 0)
    {
      $setGameStats = "UPDATE `tbl_savegames` SET `population` = $game_population WHERE `tbl_savegames`.`game_id` = $game_id";
      $database->query($setGameStats);
    }

    // set user highscore
    /*$getUserScore = "SELECT `tbl_login`.`score` FROM `tbl_login` WHERE `tbl_login`.`id` = (SELECT `tbl_savegames`.`user_id` FROM `tbl_savegames` WHERE `tbl_savegames`.`game_id` = $game_id)";
    $userScore = $database->query($getUserScore)->fetchAll();
    foreach ($userScore as $uScore) {
      $score = $uScore;
      if ($game_population > $score)
      {
        $setUserScore = "INSERT INTO `tbl_login` (`score`) VALUES ($game_population) WHERE `tbl_login`.`id` = (SELECT `tbl_savegames`.`user_id` FROM `tbl_savegames` WHERE `tbl_savegames`.`game_id` = $game_id)";
        $database->query($setUserScore)->fetchAll();
      }
    }*/

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
  }
}
?>
