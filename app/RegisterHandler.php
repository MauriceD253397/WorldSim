<?php
require('PostHandler.php');
require('config/DatabaseConnector.php');

$userLength = false; // hier maken we alle variables aan die we willen checken bij de if statements.
$userExist = false;
$passLength = false;
$passCapital = false;
$passNumber = false;

$user_register = $_POST['user_register'];
$email_register = $_POST['email_register'];
$pass_register = $_POST['pass_register'];

$hashedPass = md5($pass_register);

if(strlen($user_register) >= 3) { //strlen is functie voor grootte van string.
    $userLength = true;
}
else{
    // deze javascript code maakt een pop up.
    ?>

    <script type='text/javascript'>
        setTimeout(function () { // username too short
            window.location.replace("../public/login.php");
        },0);</script>

    <?php
}

function getUserAmount($user_register, $database)
{

    $getUsernameDatabaseQuery = "SELECT `username` FROM `tbl_login` WHERE `username` = '$user_register'";

    $resultsUncounted = $database->query($getUsernameDatabaseQuery) ->fetchAll();

    return count($resultsUncounted);
}
function inputAccountData($user_register, $hashedPass, $email_register, $database)
{
    $inputAccountQuery = "INSERT INTO `tbl_login` (`id`, `username`, `password`, `email`) VALUES (NULL, '$user_register', '$hashedPass', '$email_register');";

    $database->query($inputAccountQuery);

}


if(getUserAmount($user_register,$database) < 1)
{
    $userExist = true;
}

else{
    ?>

    <script type='text/javascript'>
        setTimeout(function () { // username already exists
            window.location.replace("../public/login.php");
        },0);</script>

    <?php
}

if(strlen($pass_register) >= 7)
{
    $passLength = true;
}

else{
    ?>

    <script type='text/javascript'>
        setTimeout(function () { // password too short
            window.location.replace("../public/login.php");
        },0);</script>

    <?php
}

if ( preg_match("#[0-9]+#", $pass_register) ) // preg match is ingewikkeld maar kort gezecht kijkt het of er een bepaald ding in zit, of niet in zit.
{
    $passNumber = true;
}

else {


    ?>

    <script type='text/javascript'>
        setTimeout(function () { // password doesn't contain a number
            window.location.replace("../public/login.php");
        }, 0);</script>

    <?php
}

if (preg_match("#[A-Z]+#", $pass_register))
{
    $passCapital = true;
}

else{
    ?>

    <script type='text/javascript'>
        setTimeout(function () { // password doesn't contain a captial letter
            window.location.replace("../public/login.php");
        },0);</script>

    <?php
}

?>
<pre>
    <h2>if you read this have a nice day ;)</h2>
    <?php
    /*
var_dump($userLength);
var_dump($userExist);
var_dump($passLength);
var_dump($passCapital);
var_dump($passNumber);
var_dump($passEqual);
*/
    ?>
</pre>
<?php
if ($userLength  == true && $userExist == true && $passLength == true && $passCapital == true && $passNumber == true ) {

    inputAccountData($user_register,$hashedPass,$email_register,$database);

    session_start();
    $_SESSION['login'] = $user_login;
    ?>
    <script type='text/javascript'>
        setTimeout(function () {
            window.location.replace("../public/index.php");
        });</script>


<?php
}
// we hoeven nu geen else te maken omdat we al een else bij alle andere fouten hebben gedaan.
?>
