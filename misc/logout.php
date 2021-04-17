<?php
require("../misc/userManager.php");
session_destroy();
header("Location: /vodakom/login.php")
?>