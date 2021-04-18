<?php

    require("misc/userManager.php");
    $login = new UserManager();
    if(isset($_SESSION["login"])){
        $login = unserialize($_SESSION["login"]);
    }
    else{
        header("Location: /vodakom/login.php?PHPSESSID=".session_id());
    }

if($_GET["service"] == "home"){
    if($_GET["internet"]) $login->setService("home", "internet", $_GET["internet"]);
    if($_GET["tv"]) $login->setService("home", "tv", $_GET["tv"]);
    if($_GET["telefon"]) $login->setService("home", "telephone", $_GET["telefon"]);
}

if($_GET["service"] == "mobile"){
    if($_GET["mobil"]) $login->setService("mobile", "talk", $_GET["mobil"]);
    if($_GET["net"]) $login->setService("mobile", "data", $_GET["net"]);
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
                            echo "<li><a class=\"account\" href=\"misc/logout.php\">Kilépés</a></li>";
                        }
                        else{
                            echo "<li><a class=\"account\" href=\"login.php\">Belépés</a></li>";
                        }
                    ?>
                    <li class="account">
                    <?php
                        if(isset($_SESSION["login"])){
                            echo "<a style=\"padding:12px\" href=\"#\">";
                            echo "<img style=\"margin-right: 10px\" width=\"40\" height=\"40\" alt=\"Profilkép\" src=\"pics/". $login->getProfPic()."\">";

                            echo $login->username;
                            echo "</a>";
                        }
                        else{
                            echo "<a href=\"#\">";
                            echo "Nem vagy belépve!";
                            echo "</a>";
                        }
                    ?>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <a href="index.php">
            <h1 id="myGomb">Köszönjük rendelését!</h1>
        </a>
    </main>
    <footer>

        <p style="text-align: center; padding:25px;">A vásárlás napját követő 14 munkanapon belül lehetősége van a vásárlástól való elállásra.<br>
            <input type="checkbox" id="aszf" name="aszf"><label for="aszf">
    Megrendelésével elfogadta az Általános Szerődési Feltételeinket, amiről további részletes információt sehol nem talál.</label><br> Kérjük ha rendeléssel kapcsolatos kérdése van, vagy leszeretné mondani a rendelését, kérjük keresse fel a központi ügyintézői
            telefonszámunkat ami nincs.</p><br>
            <pre>&copy; Magyar Vodakom Nyrt.</pre>
    </footer>
</body>

</html>