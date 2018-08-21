<!doctype html>
<?php session_start();
  if (isset($_SESSION['login']))
  {
    $user_login = $_SESSION['login'];
  } ?>

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

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

  <?php
  if (isset($_SESSION['login']))
  {
      ?>



<?php
  }
  else{
?>

<script type='text/javascript'>
    setTimeout(function () {
        window.location.replace("../public/login.php");
    },0);
</script>

<?php } ?>
</div>
<script src="js/vendor/modernizr-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

<script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>
