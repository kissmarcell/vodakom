<?php
    require("../misc/userManager.php");

    $username = $_POST["user"];
    $password = $_POST["pass"];
    $password_again = $_POST["pass2"];

    if( empty($username) ||
        empty($password) ||
        empty($password_again)
    ){
        header("Location: /vodakom/login.php?error=reg_empty");
        die();
    }

    if($password != $password_again){
        header("Location: /vodakom/login.php?error=password_not_same");
        die();
    }

    if(strlen($password) < 8){
        header("Location: /vodakom/login.php?error=short_password");
        die();
    }

    $login = new UserManager();

    if($login->usernameTaken($username)){
        header("Location: /vodakom/login.php?error=username_taken");
        die();
    }

    $login->register(
        $username,
        $password
    );
    $login->login(
        $username,
        $password
    );
    $_SESSION["login"] = serialize($login);
    header("Location: /vodakom?PHPSESSID=".session_id());
?>