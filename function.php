<?php
session_start();

function redirect($url)
{
    header('Refresh: 3, url=' . $url);
}

function save2text($data, $file=null)
{
    if ($file == null){
        $array = $GLOBALS['cfg'];
        $file =  $array[$array['type']]['register'];
    }

    foreach ($data as $key => $value)
    {
        $text .=  $key . ":" . $value . ";";
    }
    $text .= "\r\n";
    redirect('http://hello/profile.php');
    $_SESSION['user'] = $data;
    return "<h1>Регистрация успешна</h1>";
}

/*
 * проверим логин нового пользователя на совпадние с существующими
 * param $data array массив данных нового пользователя
 * param $users array массив с данными существующих пользователей
 */
function checkExistUser($data, $users)
{
    foreach ($users as $key => $value)
    {
        if ($data['login'] == $key)
        {
            return true;
        }
    }
    return false;
}

/*
 * Сохраняем данные (по умолчанию пользователя) в json
 * param $data : array  массив данных
 * param $file : string путь к файлу json, в который записываем
 */
function save2json($data, $file = null)
{
    if ($file == null){
        $array = $GLOBALS['cfg'];
        $file =  $array[$array['type']]['register'];
    }

    if (isset($data['pass'])){
        $data['pass'] = md5($data['pass']);
    }

    $users = getFromJson();
    if (is_array($users)){
        if(checkExistUser($data, $users) == true){
            redirect('/register.html');
            return "<h1>Пользователь " . $data['login'] . " уже зарегистрирован</h1>";
        }
    }
    $users[$data['login']] = $data;
    $content = json_encode($users, true);
    file_put_contents($file, $content );
    redirect('http://hello/profile.php');
    $_SESSION['user'] = $data;
    return "<h1>Регистрация успешна</h1>";
}

function getFromJson($file = null)
{
    if ($file == null){
        $array = $GLOBALS['cfg'];
        $file =  $array[$array['type']]['register'];
    }
    if (file_exists($file)){
        $content = file_get_contents($file);
        $data = json_decode($content, true);
    }

    if (is_array($data)){
        return $data;
    }
    return null;
}

function getFromText()
{

}
