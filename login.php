<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up - Sign In</title>
    <link rel="stylesheet" href="css/loginStyle.css">
</head>
<body>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/loginStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
</head>
<body>
<main class="main">
    <div class="container b-container" id="b-container">
        <form class="form" id="b-form" method="post" action="index.html">
            <h2 class="form_title title">Ruang Baca JTI</h2>
            <span class="form__span">Input your username and password</span>
            <input class="form__input" type="text" placeholder="Username" name="Username">
            <input class="form__input" type="password" placeholder="Password" name="password">
            <button class="form__button button switch-btn" name="signin">SIGN IN</button>
        </form>
    </div>
    <div class="switch" id="switch-cnt">
        <div class="switch__circle"></div>
        <div class="switch__circle switch__circle--t"></div>
        <div class="switch__container" id="switch-c1">
            <h2 class="switch__title title">Welcome Back !</h2>
            <p class="switch__description description">To keep connected with us please login with your personal
                info</p>
        </div>
    </div>
</main>
</body>
</html>
<script src="js/loginJs.js"></script>
</body>
</html>