<?php
session_start();
if (!(isset($_SESSION['user']))){
    echo '<a href="login.html"><input type="button" value="Вход"> </a>';
    echo '<a href="register.html"><input type="button" value="Регистрация"> </a>';
} else {
    echo '<a href="/index.php?do=logout"><input type="button" value="Выход"> </a>';
}

if (isset($_GET['logout'])){
    unset($_SESSION['user']);
    session_destroy();
}

$user = $_SESSION['user'];

echo "<h1>Привет, " . $user['name'] . "</h1>";
$avatar_path = $user['avatar'];


echo '<img src="' . $avatar_path . '"';
echo "<br>";
echo "<p>Мой логин: <b>" . $user['login'] .  "</b></p>";
echo "<p>Мой Email: <b>" . $user['email'] .  "</b></p>";
echo "<p>Мой день рождения: <b>" . $user['date'] .  "</b></p>";

echo "<a href=\"/\"><input type=\"button\" value=\"На главную\"></a>";