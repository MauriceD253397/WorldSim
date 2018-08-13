<?php


require('config/DatabaseConnector.php');
require('PostHandler.php');

$hashedPass = md5($pass_login);
$getUsername = "SELECT * FROM `tbl_login` WHERE `username` = '$user_login' OR `email` = '$email_login' AND `password` = '$hashedPass'";
//$getUsername = "SELECT * FROM `tbl_login` WHERE `username` = `password` = '$hashedPass' AND ('$user_login' OR `username` = '$email_login')";

$uncountedUsername = $database->query($getUsername)->fetchAll();

$countedUsername = count($uncountedUsername);

if($countedUsername >= 1)
{
    session_start();
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