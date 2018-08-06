<!doctype html>
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
    <div class="registerAndLoginContainer">
        <div class="register">
            <div class="registerTerms">
                <ul>
                    <li>Make sure you follow your username is at least 3 characters long.</li>
                    <li>Make sure your password is at least 7 characters long and has a number in it.</li>
                    <li>Make sure you enter a valid e-mail.</li>
                </ul>
            </div>
            <form action="../app/RegisterHandler.php" method="post">
                <h2>Register</h2>
                <label for="user_register">Username</label>
                <input type="text" name="user_register" placeholder="Enter your username here" required="required">
                <label for="user_email">E-mail</label>
                <input type="text" name="email_register" placeholder="Enter your e-mail here" required="required">
                <label for="user_password">Password</label>
                <input type="password" name="pass_register" placeholder="Enter your password here" required="required">
                <input id="formcss" type="checkbox" name="terms_register" value="unchecked" required="required">I accept the
                <a id="toa" href="https://termsfeed.com/terms-conditions/063c799df46d17583bb0844688a86cad">Terms of conditions</a>
                <input id="submit" type="submit" value="Create your account!">
            </form>
        </div>

        <div class="login">
            <form action="../app/LoginHandler.php" method="post">
                <h2>Login</h2>
                <input type="text" name="user_login" placeholder="Username/E-mail" required="required">
                <input type="password" name="pass_login" placeholder="Password"  required="required">
                <input id="submit" type="submit" value="Log in">
            </form>
        </div>

    </div>
    <script src="js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>
