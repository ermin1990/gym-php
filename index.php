<?php
require_once("config.php");

if(!isset($_SESSION['admin_id'])){
    $_SESSION['error'] = "Potrebno je da se ulogujete";
    header('location: login/');
    exit();
}

require("views/index.view.php");