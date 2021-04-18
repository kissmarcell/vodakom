<?php
    require("misc/userManager.php");
    if(isset($_SESSION["login"])){
        $login = unserialize($_SESSION["login"]);
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
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/fooldal.css">
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
                        <a class="nav-img aktual" href="index.php">
                            <img src="img/favicon/favicon-96x96.png" alt="Vodakom" title="Vodakom" height="60">
                        </a>
                    </li>
                    <li><a href="otthoni.php">Otthoni</a></li>
                    <li><a href="mobil.php">Mobil</a></li>
                    <li>
                    <?php
                        if(isset($_SESSION["login"])){
                            echo "<a class=\"account\" href=\"misc/logout.php\">Kilépés</a>";
                        }
                        else{
                            echo "<a class=\"account\" href=\"login.php\">Belépés</a>";
                        }
                        ?>
                    </li>
                    <li class="account" >
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
        <div class="virus">
            <div class="bord"><img class="kep" alt="warning" src="kepek/warning.png"></div>
            <article>
                <p><mark style="color:white"><b><cite>Fontos tudnivalók a vészhelyzet idején </cite></b></mark><br><br></p>

                <p><b>Online könnyen, gyorsan és a jelenlegi helyzetben is biztonságosan tudod megrendelni szolgáltatásod és intézni ügyeid.</b> Online rendelés esetén a <wbr>házhozszállítás<wbr>, a szolgáltatás bekötése és javítása zavartalanul üzemel.
                    2021.
                    <em>március 8. és 22.</em> között a <strong>Vodakom üzletek csak ügyfélszolgálati tevékenység céljából tartanak nyitva.</strong></p>
                <p>Azok a diákok és pedagógusok, akik a kormány által elrendelt digitális munkarendű alap- és középfokú oktatásban tanulnak vagy tanítanak díjmentes <wbr>otthoni internetszolgáltatásban<wbr> részesülnek.
                </p>
                <aside>
                    Információk a kormányrendelettel kapcsolatban <a href="https://net.jogtar.hu/jogszabaly?docid=A2000501.KOR&dbnum=1" target="_blank"><i>itt</i></a> érhetőek el.
                </aside>
            </article>
        </div>
        <img class="menumap2" src="kepek/menumap.jpg" style="width: 70%;" alt="Menu" usemap="#menumap">

        <map name="menumap">
  <area shape="rect" coords="100,200,460,460" href="otthoni.php" alt="Otthoni">
  <area shape="rect" coords="540,20,720,250" href="mobil.php" alt="Mobil">
</map>
        <section>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/4n6-DLPTLjc" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <video width="560" height="315" controls>
            <source src="Videos/Vodafone.mp4" type="video/mp4"></video>
        </section>
        <div>
            <table>
                <caption>Díjak és kedvezmények</caption>
                <tr>
                    <th id="muvelet">Művelet</th>
                    <th id="osszeg">Összeg</th>
                </tr>
                <tr>
                    <td headers="muvelet">Fizetési felszólító SMS / email / levél</td>
                    <td headers="osszeg">+500 Ft / alkalom</td>
                </tr>
                <tr>
                    <td headers="muvelet">Visszakapcsolás számlatartozás esetén</td>
                    <td headers="osszeg">+12500 Ft / alkalom</td>
                </tr>
                <tr>
                    <td headers="muvelet">Könyörgés telefonos ügyfélszolgálatunkon egy folyamat meggyorsításáért </td>
                    <td headers="osszeg">+2500 Ft / alkalom</td>
                </tr>
                <tr>
                    <td headers="muvelet">ELTE hallgatói jogviszony</td>
                    <td headers="osszeg">+4700 Ft / hó</td>
                </tr>
                <tr>
                    <td headers="muvelet">SZTE Webtervezés gyakorlatvezetői pozíció</td>
                    <td headers="osszeg">-5000 Ft / hó</td>
                </tr>
            </table>
        </div>
    </main>
    <footer>
        <?php if(isset($_SESSION["login"])){echo "Regisztrációd időpontja: ".$login->getDate()."<br>";}?><q cite="https://www.youtube.com/watch?v=sTymrKGVBwU" style="letter-spacing: 1px;">Három bizonyosság van az életben: a becsület, a halál és a másnaposság</q> ~ Yasuo<br> <h5>&copy; Magyar Vodakom Nyrt.</h5>
    </footer>
</body>

</html>