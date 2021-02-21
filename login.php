<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login">
        <a href="index.php"><img class="panah" src="img/panah.png" alt=""></a>
        <div><img class="imgLogin" src="img/login.png" alt=""></div>
        <div class="log">
            <form action="verify_login.php" method="POST">
            <img class="warungin" src="img/WarungIn.png" alt="">
            <input class="inputLog" type="text" name="user" placeholder="Username">
            <input class="inputLog" type="text" name="password" placeholder="Password">
            <input class="checkbox" type="checkbox" name="remember">
            Remember Me
            <button class="btn" type="submit" name="save">Login</button>
            <div class="strip"></div>
            <div class="btn goog"><img class ="google" src="img/google.png" alt="">Login With Google</div>
            <div class="btn fb"><img class="facebook" src="img/fb.png" alt="">Login With Facebook</div>
            <div class="strip"></div>
            <div class="forgot">
                <p class="ft"><a href="#">Forgot Password ?</a></p>
                <p class="ft">Don't have an account?<a href="daftar.php">Create one!</a></p>
            </div>
            </form>
        </div>
    </div>
</body>
</html>