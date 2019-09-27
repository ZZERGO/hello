<?php
session_start();

/*
 * проверим данные (логин) нового пользователя с существующими на совпадение
 * @param $newUser Array массив данных нового пользователя
 * @return bool
 */
function checkExistUser(Array $newUser = null)
{
    if ($newUser == null){
        if ($_POST){
            $newUser = $_POST;
        } else {
            $newUser = [];
        }
    }
    $existUsers = getFromJson();

    if ($existUsers !== null){
        foreach ($existUsers as $user){
            if ($user['login'] == $newUser['login']){
                return true;
            }
        }
    }
    return false;
}


/*
 * Сохраняем данные (по умолчанию пользователя) в json
 * @param Array $data  массив данных
 * @param  String $file путь к файлу json, в который записываем
 */
function save2json($data, $file = null)
{
    if ($file == null){
        $file = $GLOBALS['config']['db_file'];
    }
    $users = getFromJson();
    if (checkExistUser() == false){
        $data['pass'] = hash('sha256', $data['pass']);
        $users [] = $data;
        $json = json_encode($users);
        file_put_contents($file, $json);

        $_SESSION['user'] = $data;
        $profile = $GLOBALS['config']['url']['profile'];
        redirect(0, $profile);
        return;
    }
    redirect(2, '/register.html');
    $GLOBALS['message'] =  "<h1>Пользователь с логином " . $data['login'] . " уже зарегистрирован</h1>";
}


/*
 * Получаем данные в виде массива из файла json
 * @param string $file путь к файлу
 * @return []
 */
function getFromJson($file = null)
{
    if ($file == null){
        $file = $GLOBALS['config']['db_file'];
    }
    $string = file_get_contents($file);
    $array = json_decode($string, true);
    return $array;
}

/*
 * Перенаправляем на другой адрес с задержкой
 * @param int $time время задержки в сеундах
 * @param string $url путь для редиректа
 */
function redirect($time = 3, $url = '/')
{
    header('Refresh: ' . $time . ', url=' . $url);
}
