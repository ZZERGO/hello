<?php
session_start();
if ($_GET['do'] == 'logout'){
    unset($_SESSION['user']);
    session_destroy();
}

if (!(isset($_SESSION['user']))){
    echo '<a href="login.html"><input type="button" value="Вход"> </a>';
    echo '<a href="register.html"><input type="button" value="Регистрация"> </a>';
} else {
    echo '<a href="/index.php?do=logout"><input type="button" value="Выход"> </a>';
    echo '<a href="/profile.php"><input type="button" value="Профиль"> </a>';

}






