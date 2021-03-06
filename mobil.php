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
                    <li><a href="mobil.php" class="aktual">Mobil</a></li>
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
        <form action="megrendeles.php">
            <div class="main_table">
                <div class="table_caption">
                    <blockquote cite="telekom.hu">Vobil szolgáltatás</blockquote>
                </div>
                <div class="table_th"><b>Vobil S</b></div>
                <div class="table_th"><b>Vobil M</b></div>
                <div class="table_th"><b>Vobil L</b></div>
                <div class="table_th"><b>Vobil XL</b></div>
                <div class="table_th"><b>Vobil MEGA</b></div>
                <div class="table_td">
                    <label for="mobil1"><span class="perc">15Ft/perc</span><br><br><br><br><br></label>
                    <p><label for="mobil1">annyit fizetsz amennyit telefonálsz</label></p>
                    <label for="mobil1"><u><b>300 Ft</b></u></label>
                    <input type="radio" id="mobil1" name="mobil" value="s" <?=$login->checked("mobile", "talk", "s")?>>
                </div>
                <div class="table_td">
                    <label for="mobil2"><span class="perc">15Ft/perc</span><br><br><br>
                    100 perc vagy SMS<br><br></label>
                    <p><label for="mobil2">belföldön és EU roaming helyzetben</label></p>
                    <label for="mobil2"><u><b>600 Ft</b></u></label>
                    <input type="radio" id="mobil2" name="mobil" value="m" <?=$login->checked("mobile", "talk", "m")?>>
                </div>
                <div class="table_td">
                    <label for="mobil3"><span class="perc">korlátlan</span><br>
                    hálózaton belül<br><br>
                    60 perc vagy SMS<br><br></label>
                    <p><label for="mobil3">belföldön és EU roaming helyzetben</label></p>
                    <label for="mobil3"><u><b>1450 Ft</b></u></label>
                    <input type="radio" id="mobil3" name="mobil" value="l" <?=$login->checked("mobile", "talk", "l")?>>
                </div>
                <div class="table_td">
                    <label for="mobil4"><span class="perc">korlátlan</span><br>
                    belföldön<br><br>
                    <br><br></label>
                    <p><label for="mobil4">Illetve EU roaming helyzetből belföldre</label></p>
                    <label for="mobil4"><u><b>3490 Ft</b></u></label>
                    <input type="radio" id="mobil4" name="mobil" value="xl" <?=$login->checked("mobile", "talk", "xl")?>>
                </div>
                <div class="table_td">
                    <label for="mobil5"><span class="perc">korlátlan</span><br>
                    Bárhogyan<br><br><br>
                    <br></label>
                    <p><label for="mobil5">EU roaming helyzetben egy percért sem kell fizetnie</label></p>
                    <label for="mobil5"><u><b>4750 Ft</b></u></label>
                    <input type="radio" id="mobil5" name="mobil" value="mega" <?=$login->checked("mobile", "talk", "mega")?>>
                </div>
                <div class="table_td">
                    <label for="net1"><b>Vobil Net 1GB</b><br></label>
                    <p><label for="net1">belföldön és az EU-ban</label></p>
                    <p><label for="net1">korlátlan belföldön:</label></p>
                    <label for="net1"><img src="kepek/fb.png"  alt="Facebook" title="Facebook">
                    <img src="kepek/mes.png"  alt="Messenger" title="Facebook"><br><br><br>
                    <u><b>490 Ft</b></u></label>
                    <input type="radio" id="net1" name="net" value="s" <?=$login->checked("mobile", "data", "s")?>>
                </div>
                <div class="table_td"><label for="net2"><b>Vobil Net 2GB</b></label>
                    <p><label for="net2">belföldön és az EU-ban</label></p>
                    <p><label for="net2">korlátlan belföldön:</label></p>
                    <label for="net2"><img src="kepek/fb.png"  alt="Facebook" title="Facebook">
                <img src="kepek/mes.png"  alt="Messenger" title="Facebook">
                <img src="kepek/insta.png"  alt="Instagram" title="Instagram"><br><br><br>
                <u><b>990 Ft</b></u></label>
                    <input type="radio" id="net2" name="net" value="m" <?=$login->checked("mobile", "data", "m")?>>
                </div>
                <div class="table_td"><b>Vobil Net 5GB</b>
                    <p><label for="net3">belföldön és az EU-ban</label></p>
                    <p><label for="net3">korlátlan belföldön:</label></p>
                    <label for="net3"><img src="kepek/fb.png"  alt="Facebook" title="Facebook">
                <img src="kepek/mes.png"  alt="Messenger" title="Messenger">
                <img src="kepek/insta.png"  alt="Instagram" title="Instagram">
                <img src="kepek/itunes.png"  alt="ITunes" title="ITunes">
                <img src="kepek/whatsup.png"  alt="WhatsApp" title="Whatsapp">
                <img src="kepek/viber.png"  alt="Viber" title="Viber"><br><br><br>
                <u><b>2490 Ft</b></u></label>
                    <input type="radio" id="net3" name="net" value="l" <?=$login->checked("mobile", "data", "l")?>>
                </div>
                <div class="table_td"><label for="net4"><b>Vobil Net 15GB</b></label>
                    <p><label for="net4">belföldön és az EU-ban</label></p>
                    <p><label for="net4">korlátlan belföldön:</label></p>
                    <label for="net4"><img src="kepek/fb.png"  alt="Facebook" title="Facebook">
                <img src="kepek/mes.png"  alt="Messenger" title="Messenger">
                <img src="kepek/insta.png"  alt="Instagram" title="Instagram">
                <img src="kepek/itunes.png"  alt="ITunes" title="ITunes">
                <img src="kepek/whatsup.png"  alt="WhatsApp" title="Whatsapp">
                <img src="kepek/viber.png"  alt="Viber" title="Viber">
                <img src="kepek/deezer.png"  alt="Deezer" title="Deezer">
                <img src="kepek/lol.png"  alt="League of Legends" title="League of Legends">
                <br><br><br>
                <u><b>5990 Ft</b></u></label>
                    <input type="radio" id="net4" name="net" value="xl" <?=$login->checked("mobile", "data", "xl")?>>
                </div>
                <div class="table_td"><label for="net5"><b>Vobil Net Korlátlan</b></label>
                    <p><label for="net5">belföldön és az EU-ban</label></p>
                    <br><label for="net5"><br>
            <img src="kepek/6g.png" class="giga" alt="6G" title="6G"><br><br><br>
            <u><b>9990 Ft</b></u></label>
                    <input type="radio" id="net5" name="net" value="mega" <?=$login->checked("mobile", "data", "mega")?>>
                </div>
                <input type="hidden" value="mobile" id="service" name="service">
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
    </main>
    <footer>
        <h5>&copy; Magyar Vodakom Nyrt.</h5>
    </footer>
</body>

</html>