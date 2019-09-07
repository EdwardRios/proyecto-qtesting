<?php

include_once 'ApiWallet.php';



$api = new ApiWallet();

if(isset($_GET['funds'])){

    $funds = $_GET['funds'];
}



$api->getAll();