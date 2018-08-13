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
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $(".signUpTab").click(function() {
        $(".signUpContent").show();
        $(".loginContent").hide();
        $(".signUpTab").addClass('activeTab');
        $(".loginTab").removeClass('activeTab');
      });
      $(".loginTab").click(function() {
        $(".loginContent").show();
        $(".signUpContent").hide();
        $(".loginTab").addClass('activeTab');
        $(".signUpTab").removeClass('activeTab');
      });
    });
  </script>
</head>

<body>
    <div class="containerLoginSignUp">
        
        <!--<div class="registerTerms">
            <ul>
                <li>Make sure you follow your username is at least 3 characters long.</li>
                <li>Make sure your password is at least 7 characters long and has a number in it.</li>
                <li>Make sure you enter a valid e-mail.</li>
            </ul>
        </div>-->
        
        <div class="loginSignUpButtons">
            <a href="#" class="loginTab activeTab">Login</a>
            <a href="#" class="signUpTab">Sign Up</a>
        </div>

        <div class="loginContent">
            <form action="../app/LoginHandler.php" method="post">
                <input type="text" name="user_login" placeholder="Username/E-mail" required autofocus>
                <input type="password" name="pass_login" placeholder="Password" required>
                <input id="submit" type="submit" value="Log in">
            </form>
        </div>

        <div class="signUpContent">
            <form action="../app/RegisterHandler.php" method="post">
                <input type="text" name="user_register" placeholder="Enter your username here" required autofocus>
                <input type="email" name="email_register" placeholder="Enter your e-mail here" required>
                <input type="password" name="pass_register" placeholder="Enter your password here" required>
                <input type="password" name="confirm_pass_register" placeholder="Confirm your password here" required>
                <label class="containerCheckmark"><input class="formcss" type="checkbox" name="terms_register" value="unchecked" required>
                    <span class="checkmark"></span></label>
                <span style="margin-left: 100px; color: white;">I accept the<a id="toa" href="https://termsfeed.com/terms-conditions/063c799df46d17583bb0844688a86cad" style="color:#0062ff;">Terms and Conditions</a></span>
                <input id="submit" type="submit" value="Create your account!">
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
