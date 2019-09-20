<?php
session_start();

$newData = $_POST;
$cfg = include 'config.php';
require 'function.php';
$file = $cfg[$cfg['type']]['register'];

switch ($cfg['type'])
{
    case  'txt':
        $users = getFromText();
        break;
    case  'json':
        $users = getFromJson();
        break;
};

$flagUser = false;

foreach ($users as $user)
{
    if ($newData['login'] == $user['login'])
    {
        $flagUser = true;
        if (md5($newData['pass']) == $user['pass'])
        {
            $_SESSION['user'] = $user;
            $flagPass = true;
            redirect('http://hello/profile.php');
            echo "<h1>Успешный вход</h1>";
        } else {
            redirect('http://hello/login.html');
            echo "<h1>Неверный пароль</h1>";
        }
    }
}

if (!($flagUser)){
    redirect('http://hello/login.html');
    echo "<h1>Пользователь " . $newData['login'] . " не найден</h1>";
}



