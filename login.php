<?php
session_start();

$userData = $_POST;
$config = require 'config.php';
include 'function.php';
$url_login = $config['url']['login'];
$url_profile = $config['url']['profile'];

$flagUser = false;

$users = getFromJson();

foreach ($users as $user)
{
    if ($userData['login'] == $user['login'])
    {
        $flagUser = true;
        if (hash('sha256',$userData['pass']) == $user['pass'])
        {
            $_SESSION['user'] = $user;
            $flagPass = true;
            redirect(2,$url_profile);
            echo "<h1>Успешный вход</h1>";
        } else {
            redirect(2,$url_login);
            echo "<h1>Неверный пароль</h1>";
        }
    }
}

if (!($flagUser)){
    redirect(2,$url_login);
    echo "<h1>Пользователь " . $newData['login'] . " не найден</h1>";
}



