<?php
require('../app/config/DatabaseConnector.php');
session_start();
$game_id = $_SESSION['game'];
foreach ($game_id as $gID) {
  echo $gID['game_id'];
}
$user_id = $_SESSION['login'];
foreach ($user_id as $uID) {
  echo $uID['id'];
}
?>
