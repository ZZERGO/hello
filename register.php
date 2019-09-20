<?php
session_start();

$cfg = include 'config.php';
$newData = $_POST;
require 'function.php';

switch ($cfg['type'])
    {
        case  'txt':
            $message = save2text($newData);
            break;
        case  'json':
            if ($_POST != null){
                $message = save2json($newData);
            }
            break;
    };



echo $message;
