<?php
if(!isset($_SESSION["login"])){
    header("Location: /vodakom/login.php?PHPSESSID=".session_id());
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
                    <li class="account"><a href="#">
                    <?php
                        if(isset($_SESSION["login"])){
                            echo $login->username;
                        }
                        else{
                            echo "Nem vagy belépve!";
                        }
                    ?>
                    </a></li>
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
        <pre><h5>&copy; Magyar Vodakom Nyrt.</h5></pre>
    </footer>
</body>

</html>