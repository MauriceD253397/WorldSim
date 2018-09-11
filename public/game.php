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
    $getGameStats = "SELECT `tbl_savegames`.`turn`, `tbl_savegames`.`mana`, `tbl_savegames`.`population`, `tbl_savegames`.`male_pop` FROM `tbl_savegames` WHERE `tbl_savegames`.`game_id` = $game_id";
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
      var male_population_percentage = <?php
      foreach ($game_stats as $gStats) {
        $male_pop_percentage = number_format((float) ($gStats["male_pop"]/$gStats["population"]*100), 1);
        echo $male_pop_percentage;
      }?>;
      var female_population_percentage = <?php
      foreach ($game_stats as $gStats) {
        echo (100-$male_pop_percentage);
      }?>;
      var mana = <?php
      foreach ($game_stats as $gStats) {
        echo $gStats["mana"];
      }?>;

      var events = new Array();
      var allEvents = "";

      function clearConsole()
      {
        document.getElementById('consoleTextArea').innerHTML = "";
      }

      function nextTurn()
      {
        // ADD GAME ID CHECK
        turn++;
        peopleborn = 0;
        peopledied = 0;
        population += peopleborn - peopledied;
        // ADD MALE POPULATION CHANGES
        // ADD FEMALE POPULATION CHANGES
        mana += 0;
        setStats();
        events[0] = "Population changes: " + peopleborn + " born and " + peopledied + " died";
        events[1] = "Current population: " + population;
        events[2] = "Mana: " + mana;
        events[3] = "This is a very long sentence for testing purposes.";
        events[4] = "A B C D E F G H I J K L M N O P Q R S T U V W X Y Z";
        events[5] = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        events[6] = "";
        events[7] = "";
        events[8] = "";
        events[9] = "";
        events[10] = "";
        events[11] = "";
        events[12] = "";
        events[13] = "";
        events[14] = "";
        events[15] = "";
        events[16] = "";
        events[17] = "";
        events[18] = "";
        events[19] = "";
        events[20] = "";
        events[21] = "";
        events[22] = "";
        events[23] = "";
        events[24] = "";
        events[25] = "";
        events[26] = "";
        events[27] = "";
        events[28] = "";
        events[29] = "";
        events[30] = "";
        for (var i = 0; i < events.length; i++) {
          allEvents += "<li>" + events[i] + "</li>";
        }
        displayStats();
      }

      function displayStats()
      {
        document.getElementById('game_stats_turn').innerHTML = "Turn: " + turn;
        document.getElementById('game_stats_population').innerHTML = "Population: " + population;
        document.getElementById('maleperc').innerHTML = male_population_percentage;
        if (male_population_percentage < 45.0) { document.getElementById('maleperc').style.color="red"; }
        else { document.getElementById('maleperc').style.color="green"; }
        document.getElementById('femaleperc').innerHTML = female_population_percentage;
        if (female_population_percentage < 45.0) { document.getElementById('femaleperc').style.color="red"; }
        else { document.getElementById('femaleperc').style.color="green"; }
        document.getElementById('game_stats_mana').innerHTML = "Mana: " + mana;
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

<body onload="displayStats();">

    <div class="header_bar_game">
      <?php
      $getGameName = "SELECT `tbl_savegames`.`game_name` FROM `tbl_savegames` WHERE `tbl_savegames`.`game_id` = $game_id";
      $game_name = $database->query($getGameName)->fetchAll();?>
      <div class="header_bar_game_name"><div></div><span><?php foreach ($game_name as $gName) { echo $gName["game_name"]; }?></span><div></div></div>
      <div></div>
      <div class="header_bar_game_rightsub">
        <a href="#settings"><div class="settings_button_sub"><div></div><span>Settings</span><div></div></div></a>
        <a href="../app/QuitGameHandler.php"><div class="quit_button"><div></div><span>Quit</span><div></div></div></a>
      </div>
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

      <div class="left_column">

        <div class="game_stats">
          <div id="game_stats_turn">Turn: -</div>
          <div id="game_stats_population">Population: -</div>
          <div id="game_stats_population_mf">Male/Female: <span id="maleperc">-</span> / <span id="femaleperc">-</span></div>
          <div id="game_stats_mana">Mana: -</div>
        </div>

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

          <div class="consoleTextAreaOne">
            <div id="consoleTextArea">
              The console displays all events that have happened in your last turn.
            </div>
          </div>
        </div>
      </div>

      <div class="middle_column">
        <div class="gui"></div>
        <div class="event_buttons"></div>
      </div>

      <div class="right_column">

        <div class="god_powers">
          <div class="gpower" onclick=""><div></div><span class="positive">X% more males<br>for Y weeks</span><span>- Z mana</span><div></div></div>
          <div class="gpower"><div></div><span class="positive">X% more females<br>for Y weeks</span><span>- Z mana</span><div></div></div>
          <div class="gpower"><div></div><span class="positive">X% better yield<br>for Y weeks</span><span>- Z mana</span><div></div></div>
          <div class="gpower"><div></div><span class="negative">X% worse yield<br>for Y weeks</span><span>+ Z mana</span><div></div></div>
          <div class="gpower"><div></div><span>5</span><span></span><div></div></div>
          <div class="gpower"><div></div><span>6</span><span></span><div></div></div>
          <div class="gpower"><div></div><span>7</span><span></span><div></div></div>
          <div class="gpower"><div></div><span>8</span><span></span><div></div></div>
          <div class="gpower"><div></div><span>9</span><span></span><div></div></div>
          <div class="gpower"><div></div><span>10</span><span></span><div></div></div>
        </div>

        <div class="next_turn_button" onclick="nextTurn()">
          <div></div>
            <span>End Turn</span>
          <div></div>
        </div>
      </div>

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
