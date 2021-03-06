<?php
    require("misc/userManager.php");
    $login = new UserManager();
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
    <link rel="stylesheet" href="css/mobil.css">
    <link rel="stylesheet" href="css/otthoni.css">
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
                <li><a href="otthoni.php" class="aktual">Otthoni</a></li>
                <li><a href="mobil.php">Mobil</a></li>
                <?php
                    if(isset($_SESSION["login"])){
                        echo "<li><a class=\"account\" href=\"misc/logout.php\">Kilépés</a></li>";
                    }
                    else{
                        echo "<li><a class=\"account\" href=\"login.php\">Belépés</a></li>";
                    }
                ?>
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
    <section>
        <form action="megrendeles.php" method="get">
            <div class="main_table">
                    <div class="table_caption"><blockquote cite="telekom.hu">V-Home szolgáltatás</blockquote></div>
                
                    <div class="table_td_csomag"> Internet</div>
                    <div style="display:flex">
                    <div class="table_td_otthoni">
                        <p class="promo-title"><label for="internet1"><b>Kb. használhatatlan</b></label></p>
                        <p><label for="internet1">Használd ki a korlátlan vezetékes internet nyújtotta lehetőségeket.</label></p>
                        <p>
                            <label for="internet1">
                                Kínált: <b>↓ 150 Mbps / ↑ 15 Mbps</b><br>
                                Garantált: <b>↓ 0 Mbps / ↑ 0 Mbps</b>
                            </label>
                        </p>
                        <label for="internet1"><b><u>3990 Ft:</u></b></label>
                        <input type="radio" id="internet1" name="internet" value="s" <?=$login->checked("home", "internet", "s")?>>
                    </div>
                    <div class="table_td_otthoni">
                        <p class="promo-title"><label for="internet2"><b>Ezt úgysem választja senki</b></label></p>
                        <p><label for="internet2">Használd ki a korlátlan vezetékes internet nyújtotta lehetőségeket.</label></p>
                        <p>
                            <label for="internet2">
                                Kínált: <b>↓ 300 Mbps / ↑ 30 Mbps</b><br>
                                Garantált:<b> ↓ 1 Mbps / ↑ 0 Mbps</b><br> Megjelenhetnek cicás GIF-ek a weboldalain
                            </label>
                        </p>
                        <label for="internet2"><b><u>6990 Ft:</u></b> </label>
                        <input type="radio" id="internet2" name="internet" value="m" <?=$login->checked("home", "internet", "m")?>>
                    </div>
                    <div class="table_td_otthoni">
                        <p class="promo-title"><label for="internet3"><b>Anya, <q>Fortnite</q> streamer leszek</b></label></p>
                        <p><label for="internet3">Használd ki a korlátlan vezetékes internet nyújtotta lehetőségeket.</label></p>
                        <p>
                            <label for="internet3">
                                Kínált:<b> ↓ 2000 Mbps / ↑ 200 Mbps</b><br>
                                Garantált:<b> ↓ 250 Mbps / ↑ 40 Mbps</b><br>
                                0-24 ingyenes helyszíni szerviz élőzenével
                            </label>
                        </p>
                        <label for="internet3"><b><u>10990 Ft:</u></b> </label>
                        <input type="radio" id="internet3" name="internet" value="l" <?=$login->checked("home", "internet", "l")?>>
                    </div>
                    </div>
                    <div class="table_td_csomag">
                        Televízió
                    </div>
                    <div style="display:flex">
                    <div class="table_td_otthoni">
                        <p class="promo-title"><label for="tv1"><b>Minden ami fontos</b></label></p>
                        <p>
                            <label for="tv1">
                                Garantált folyamatos szolgáltatás<br>
                                <b>M1</b>, <b>M2</b>, <b>M4</b>, <b>M5</b>, <b>Duna TV</b> csatornák
                            </label>
                        </p>
                        <label for="tv1"><b><u>3490 Ft:</u></b> </label>
                        <input type="radio" id="tv1" name="tv" value="s" <?=$login->checked("home", "tv", "s")?>><br>
                    </div>
                    <div class="table_td_otthoni">
                        <p class="promo-title"><label for="tv2"><b>Majdnem minden</b></label></p>
                        <p>
                            <label for="tv2">
                                Ingyenes <b>HBO GO</b> szolgáltatás<br>
                                <b>35 SD + 20 HD</b> csatorna
                            </label>
                        </p>
                        <label for="tv2"><b><u>4990 Ft:</u></b></label>
                        <input type="radio" id="tv2" name="tv" value="m" <?=$login->checked("home", "tv", "m")?>>
                    </div>
                    <div class="table_td_otthoni">
                        <p class="promo-title"><label for="tv3"> <b> Fullos</b></label></p>
                        <p>
                            <label for="tv3">
                                Ingyenes <b>Netflix</b> szolgáltatás<br>
                                <b>115 SD</b> + <b>64 HD</b> csatorna
                            </label>
                        </p>
                        <label for="tv3"><b><u>6990 Ft:</u></b></label>
                        <input type="radio" id="tv3" name="tv" value="l" <?=$login->checked("home", "tv", "l")?>>
                    </div>
                </div>
                <div class="table_td_csomag">
                    Telefon
                </div>
                <div style="display:flex"> 
                
                <div class="table_td_otthoni">
                        <p class="promo-title"><label for="telefon1"><b>Csak hogy legyen</b></label></p>
                        <p>
                            <label for="telefon1">
                                Lehet vele telefonálni<br>
                                Alap percdíj <b>150Ft/perc</b>
                            </label>
                        </p>
                        <label for="telefon1"><b><u>Ingyenes:</u></b></label>
                        <input type="radio" id="telefon1" name="telefon" value="s" <?=$login->checked("home", "telephone", "s")?>>
                    </div>
                    <div class="table_td_otthoni">
                        <p class="promo-title"><label for="telefon2"><b>Néha néha</b></label></p>
                        <p>
                            <label for="telefon2">
                                Lehet vele telefonálni<br>
                                Vezetékes hálózaton belül korlátlanul<br>
                                Alap percdíj <b>30Ft/perc</b>
                            </label>
                        </p>
                        <label for="telefon2"><b><u>1990Ft:</u></b></label>
                        <input type="radio" id="telefon2" name="telefon" value="m" <?=$login->checked("home", "telephone", "m")?>>
                    </div>
                    <div class="table_td_otthoni">
                        <p class="promo-title"><label for="telefon3"><b>Nagymamák kedvence</b></label></p>
                        <p>
                            <label for="telefon3">
                                Korlátlanul lehet vele telefonálni
                                Minden vezetékes hálózatban <b>korlátlanul telefonálhat</b>
                            </label>
                        </p>
                        <label for="telefon3"><b><u>3990Ft:</u></b> </label>
                        <input type="radio" id="telefon3" name="telefon" value="l" <?=$login->checked("home", "telephone", "l")?>>
                    </div>
                </div>
                <input type="hidden" value="home" id="service" name="service">
                <?php
                    if($login->username){
                        echo "<div class=\"table_td_gomb\">
                        <input type=\"submit\" class=\"myGomb\" value=\"Megrendelem\">
                        </div>";
                    }
                ?>
                
                <div class="table_td_gomb">
                    <input type="reset" class="myGomb">
                </div>
            </div>
            </form>
        </section>
        </main>
        <footer>
            <h5>&copy; Magyar Vodakom Nyrt.</h5> 
        </footer>
</body>
</html>