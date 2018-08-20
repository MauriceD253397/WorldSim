<?php

session_start(); // session moet gek genoeg ALTIJD gestart worden.

$_SESSION['login'] = NULL;
// Nu maken we de session null en vernietigen we de session
session_destroy();

?>

<script type='text/javascript'>
    setTimeout(function () {
        window.location.replace("../public/index.php");
    },0);</script>
