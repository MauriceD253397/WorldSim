<?php
session_start();

require('config/DatabaseConnector.php');
require('PostHandler.php');

$hashedPass = md5($pass_login);
$getID = "SELECT `id` FROM `tbl_login` WHERE (`username` = '$user_login' OR `email` = '$email_login') AND `password` = '$hashedPass'";

$uncountedUsername = $database->query($getID)->fetchAll();

$countedUsername = count($uncountedUsername);

if($countedUsername >= 1)
{
  foreach ($uncountedUsername as $uncountedUsername)
  $user_id = $uncountedUsername["id"];
    $input_last_login = "UPDATE `tbl_login` SET `last_login` = CURRENT_TIMESTAMP WHERE `id` = $user_id";
    $database->query($input_last_login);
    $_SESSION['login'] = $user_login;
    ?>

    <script type='text/javascript'>
        setTimeout(function () {
            window.location.replace("../public/index.php");
        },0);
    </script>

    <?php
}
else {
?>
    <script type='text/javascript'>
        setTimeout(function () {
            window.location.replace("../public/login.php");
        },0);
    </script>
<?php
}
?>
