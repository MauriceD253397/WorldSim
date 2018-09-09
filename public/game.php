<!doctype html>
<?php session_start();
require('../app/config/DatabaseConnector.php');
if (isset($_SESSION['login']))
{
  if (isset($_SESSION['game']))
  {
    $game_id = $_SESSION['game'];
    $user_name = $_SESSION['login'];
    ?>

<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/game.css">
    <link rel="stylesheet" type="text/css" href="css/gamethemes/defaulttheme.css">
    <link rel="alternate stylesheet" type="text/css" href="css/gamethemes/darktheme.css" title="Dark Theme">
	  <link rel="alternate stylesheet" type="text/css" href="css/gamethemes/bluetheme.css" title="Blue Theme" />
    <link rel="alternate stylesheet" type="text/css" href="css/gamethemes/redtheme.css" title="Red Theme">
    <link rel="alternate stylesheet" type="text/css" href="css/gamethemes/christmastheme.css" title="Christmas Theme">

    <script type="text/javascript" src="scripts/styleswitcher.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <?php
    $getGameStats = "SELECT `tbl_savegames`.`population`, `tbl_savegames`.`mana`, `tbl_savegames`.`turn` FROM `tbl_savegames` WHERE `tbl_savegames`.`game_id` = $game_id";
    $game_stats = $database->query($getGameStats)->fetchAll();
    ?>
    <script type="text/javascript">
      var turn = <?php
      foreach ($game_stats as $gStats) {
        echo $gStats["turn"];
      }?>;
      var peopleborn = 0;
      var peopledied = 0;
      var population = <?php
      foreach ($game_stats as $gStats) {
        echo $gStats["population"];
      }?>;
      var mana = <?php
      foreach ($game_stats as $gStats) {
        echo $gStats["mana"];
      }?>;

      function clearConsole()
      {
        document.getElementById('consoleTextArea').innerHTML = "";
      }

      function nextTurn()
      {
        turn++;
        peopleborn = 0;
        peopledied = 0;
        population += peopleborn - peopledied;
        mana += 0;
        setStats();
        var events = new Array();
        var allEvents = "";
        events[0] = "Population changes: " + peopleborn + " born and " + peopledied + " died";
        events[1] = "Current population: " + population;
        events[2] = "Mana: " + mana;
        for (var i = 0; i < events.length; i++) {
          allEvents += "<li>" + events[i] + "</li>";
        }
        document.getElementById('header_bar_game_turn').innerHTML = "Turn: " + turn;
        document.getElementById('header_bar_game_population').innerHTML = "Population: " + population;
        document.getElementById('header_bar_game_mana').innerHTML = "Mana: " + mana;
        document.getElementById('consoleTextArea').innerHTML = "<ul>" + allEvents + "</ul>";
      }

      function setStats()
      {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "../app/SetGameStatsHandler.php?p="+population, true);
        xmlhttp.send();
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "../app/SetGameStatsHandler.php?m="+mana, true);
        xmlhttp.send();
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "../app/SetGameStatsHandler.php?t="+turn, true);
        xmlhttp.send();
      }
    </script>
</head>

<body>

    <div class="header_bar_game">
      <?php
      $getGameName = "SELECT `tbl_savegames`.`game_name` FROM `tbl_savegames` WHERE `tbl_savegames`.`game_id` = $game_id";
      $game_name = $database->query($getGameName)->fetchAll();?>
      <div class="header_bar_game_name"><div></div><span><?php foreach ($game_name as $gName) { echo $gName["game_name"]; }?></span><div></div></div>
      <div id="header_bar_game_turn">Turn: <?php foreach ($game_stats as $gStats) { echo $gStats["turn"]; }?></div>
      <div id="header_bar_game_population">Population: <?php foreach ($game_stats as $gStats) { echo $gStats["population"]; }?></div>
      <div id="header_bar_game_mana">Mana: <?php foreach ($game_stats as $gStats) { echo $gStats["mana"]; }?></div>
      <?php
      ?>
      <a href="#settings"><div class="settings_button_sub"><div></div><span>Settings</span><div></div></div></a>
      <a href="../app/QuitGameHandler.php"><div class="quit_button"><div></div><span>Quit</span><div></div></div></a>
    </div>

    <div id="settings" class="settings_overlay">
    	<div class="settings_popup">
    		<a class="close_settings" href="#">&times;</a>
    		<div class="settings_content">
          <h1>Settings</h1>
          <hr>
          <h2>Themes</h2>
          <form method="post">
            <a href="#" onclick="setActiveStyleSheet('default'); return false;">Default Theme</a><br>
            <a href="#" onclick="setActiveStyleSheet('Dark Theme'); return false;">Dark Theme</a><br>
            <a href="#" onclick="setActiveStyleSheet('Blue Theme'); return false;">Blue Theme</a><br>
            <a href="#" onclick="setActiveStyleSheet('Red Theme'); return false;">Red Theme</a><br>
            <a href="#" onclick="setActiveStyleSheet('Christmas Theme'); return false;">Christmas Theme</a><br>
          </form>
          <br>
          <hr>
          <h2>Save Game</h2>
          <form method="post">
            <input type="hidden" value="<?php echo $game_id?>" name="save_id" />
            <input type="submit" name="submit" value="Save Game" disabled>
          </form>
          <br>
          <hr>
          <h2>Rename Save</h2>
          <form action="../app/RenameSaveHandler.php" method="post">
            <input type="text" name="save_name" placeholder="New Save Name" required maxlength="20" minlength="3" autocomplete="off">
            <input type="submit" name="submit" value="Rename">
          </form>
          <br>
          <hr>
          <h2>Delete Save</h2>
          <form action="../app/LoadSaveHandler.php" method="post">
            <input type="hidden" value="<?php echo $game_id?>" name="save_id" />
            <input type="submit" name="submit" value="Delete Save">
          </form>
    		</div>
    	</div>
    </div>

    <div class="playArea">

      <div class="console">

        <div class="titlebar">
          <div class="consoleTitle">Console</div>
          <div></div>
          <div class="consoleClear">
            <a onclick="clearConsole()">
              <div>Clear</div>
            </a>
          </div>
        </div>

        <div id="consoleTextArea">
          The console displays all events that have happened in your last turn.
        </div>
      </div>

      <a onclick="nextTurn()">
        <div>Next Turn</div>
      </a>

    </div>

  </body>


</html><?php
  }
  else
  { ?>
  <script type='text/javascript'>
      setTimeout(function () {
          window.location.replace("../public/savegames.php");
      },0);</script>
      <?php
    }
}
else
{?>
<script type='text/javascript'>
    setTimeout(function () {
        window.location.replace("../public/login.php");
    },0);</script>
    <?php
}?>
