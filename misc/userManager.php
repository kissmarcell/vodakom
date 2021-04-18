<?php

ini_set("session.use_cookies", 0);
ini_set("session.use_only_cookies", 0);
ini_set("session.use_trans_sid", 1);
ini_set("session.cache_limiter", "");
session_start();

class UserManager{

    public $users = "no";
    public $username = "";

    function __construct(){
        try{
            if(!file_exists(__DIR__."\..\data\users.data")){
                throw new RuntimeException("Az adatbázis nem található!");
            }
            $this->users = unserialize(file_get_contents(__DIR__."\..\data\users.data"));
        }
        catch (RuntimeException $e){
            echo "HIBA: ".$e;
            die();
        }
    }

    function pushChanges(){
        $encoded = serialize($this->users);
        $f = fopen(__DIR__."\..\data\users.data", "w");
        fwrite($f, $encoded);
        fclose($f);
    }

    function login($username, $password){
        foreach($this->users as $user){
            if(
                $username == $user["username"] &&
                md5($password) == $user["password"]
            )
            {
                $this->username = $user["username"];
                return true;
            }
        }
        return false;
    }

    function register($username, $password, $image){
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone("Europe/Budapest"));
        $user = [
            "username" => $username,
            "password"=> md5($password),
            "date"=> $date,
            "services"=> [
                "mobile" => [
                    "talk"=> "",
                    "data"=> ""
                ],
                "home"=> [
                    "internet" => "",
                    "tv" => "",
                    "telephone" => ""
                ]
            ]
        ];
        $allowed = ["jpg", "jpeg", "png"];
        $extension = strtolower(pathinfo($image["name"], PATHINFO_EXTENSION));
        if (in_array($extension, $allowed)) {
            if ($image["error"] === 0) {
                if ($image["size"] <= 31457280) {
                    $target = "../pics/" . $username.".".$extension;
                    $user["profile_pic"] = $username.".".$extension;
                    move_uploaded_file($image["tmp_name"], $target);
                }
            }
        }
        if(!$this->users) {
            $this->users = [];
        }
        array_push($this->users, $user);
        $this->pushChanges();
    }

    function setService($segment, $service, $value){
        foreach($this->users as &$user){
            if($user["username"] == $this->username){
                $user["services"][$segment][$service] = $value;
            }
        }
        print_r($this->users);
        $this->pushChanges();
    }

    function getService($segment, $service){
        foreach($this->users as $user){
            if($user["username"] == $this->username){
                return $user["services"][$segment][$service];
            }
        }
    }

    function checked($segment, $service, $package){
        if(!$this->username) return "";
        return ($this->getService($segment, $service) == $package) ? "checked" : "";
    }

    function usernameTaken($username){
        if(!$this->users) return false;
        foreach($this->users as $user){
            if($user["username"] == $username){
                return true;
            }
        }
        return false;
    }

    function getDate(){
        if(!$this->users) return false;
        foreach($this->users as $user){
            if($user["username"] == $this->username){
                return $user["date"]->format('Y. m. d. H:i');
            }
        }
    }

    function getProfPic(){
        if(!$this->users) return false;
        foreach($this->users as $user){
            if($user["username"] == $this->username){
                return $user["profile_pic"];
            }
        }
    }
}
?>