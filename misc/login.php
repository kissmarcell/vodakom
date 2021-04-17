<?php
    require("../misc/userManager.php");

    $username = $_POST["user"];
    $password = $_POST["pass"];

    if( empty($username) ||
        empty($password)
    ){
        header("Location: /vodakom/login.php?error=login_empty");
        die();
    }

    $login = new UserManager();
    if($login->login($username, $password)){
        $_SESSION["login"] = serialize($login);
        header("Location: /vodakom?PHPSESSID=".session_id());
    }
    else{
        header("Location: /vodakom/login.php?error=wrong_credentials");
    }
?>