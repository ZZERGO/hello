<?php
session_start();

$config = require 'config.php';
$data = $_POST;
require 'function.php';


save2json($_POST);


if ($message !== null){
    echo $message;
}

