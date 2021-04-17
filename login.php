<?php
    require("misc/userManager.php");
    if(isset($_SESSION["login"])){
        header("Location: /vodakom?PHPSESSID=".session_id());
}
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/navibar.css">
    <link rel="stylesheet" href="css/promo.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/table.css">
    <title>Vodakom</title>
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <meta name="theme-color" content="#40d657">
</head>

<body>
    <header>
        <nav>
            <div class="navigacio">
                <ul>
                    <li>
                        <a class="nav-img" href="index.php">
                            <img src="img/favicon/favicon-96x96.png" alt="Vodakom" title="Vodakom" height="60">
                        </a>
                    </li>
                    <li><a href="otthoni.php">Otthoni</a></li>
                    <li><a href="mobil.php">Mobil</a></li>
                    <?php
                        if(isset($_SESSION["login"])){
                            echo "<li><a class=\"account\" id=\"aktual\" href=\"misc/logout.php\">Kilépés</a></li>";
                        }
                        else{
                            echo "<li><a class=\"account\" id=\"aktual\" href=\"login.php\">Belépés</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <form action="misc/login.php" method="post" style="float:left">
            <figure>
                <img src="kepek/prof.png" width="150">
                <figcaption>Bejelentkezés</figcaption>
            </figure>
            <div style="text-align: right; width: 400px;">
                <fieldset>
                    <legend>Sikertelen belépés esetén: login@vodakom.hu
                    <?=(isset($_GET["error"]) && $_GET["error"] == "wrong_credentials") ? "<br><b>Hibás bejelentkezési adatok!</b>" : ""?>
                    <?=(isset($_GET["error"]) && $_GET["error"] == "login_empty") ? "<br><b>Valamely mező nem került kitöltésre!</b>" : ""?>
                    </legend>
                    <label for="user1">Felhasználónév: </label>
                    <input type="text" name="user" id="user1" required><br>
                    <label for="pass1">Jelszó:</label>
                    <input type="password" name="pass" id="pass1" required><br>
                </fieldset>
            </div>
            <input type="submit" class="myGomb" value="Bejelentkezés">
        </form>
        <form action="misc/register.php" method="post" style="float:right">
            <figure>
                <img src="kepek/prof.png" width="150">
                <figcaption>Regisztráció</figcaption>
            </figure>
            <div style="text-align: right; width: 400px;">
                <fieldset>
                    <legend>Hibás adatok rögzítése esetén: registration@vodakom.hu<br>
                    <?=(isset($_GET["error"]) && $_GET["error"] == "password_not_same") ? "<br><b>A két jelszó nem egyezik!</b>" : ""?>
                    <?=(isset($_GET["error"]) && $_GET["error"] == "username_taken") ? "<br><b>A felhasználónév már foglalt!</b>" : ""?>
                    <?=(isset($_GET["error"]) && $_GET["error"] == "reg_empty") ? "<br><b>Valamely mező nem került kitöltésre!</b>" : ""?>
                    <?=(isset($_GET["error"]) && $_GET["error"] == "short_password") ? "<br><b>A megadott jelszó nincs legalább 8 karakter hosszú!</b>" : ""?>
                    </legend>
                    <label for="user2">Felhasználónév: </label>
                    <input type="text" name="user" id="user2" required><br>
                    <label for="pass">Jelszó: </label>
                    <input type="password" name="pass" id="pass" placeholder="legalább 8 karakter" required><br>
                    <label for="pass2">Ismételt jelszó:</label>
                    <input type="password" name="pass2" id="pass2" placeholder="legalább 8 karakter" required><br>
                    <label for="profile_pic">Profilkép:</label>
                    <input type="file" name="profile_pic" id="profile_pic" required><br>
                    <input type="hidden" name="source" value="internet">
                </fieldset>
            </div>
            <input type="submit" class="myGomb" value="Regisztráció">
        </form>
    </main>
</body>

</html>