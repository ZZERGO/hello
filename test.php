<?php


if (!empty($_POST)) {
    if ($_POST['name']) {
        echo "<h1>Hello " . $_POST['name'] . "</h1>";
    }

    if ($_POST['age1']) {
        switch ($_POST['age1']) {
            case "over":
                echo "<h4>Способ 1:</h4> ответ Больше";
                break;
            case "less":
                echo "<h4>Способ 1:</h4> ответ меньше";
                break;
            case "exactly":
                echo "<h4>Способ 1:</h4> ответ Ровно";
                break;
        }
    }
    echo "<br>";
    if ($_POST['age2']) {
        $age = $_POST['age2'];
        if ($age > 18) {
            echo "<h4>Способ 2:</h4> ответ Ему/ей больше 18";
        } elseif ($age < 18) {
            echo "<h4>Способ 2:</h4> ответ Ему/ей меньше 18";
        } else {
            echo "<h4>Способ 2:</h4> ответ Ему/ей ровно 18";
        }

    }


    if ($_POST['color']) {
        $color = $_POST['color'];

        switch ($color) {
            case "red":
                $text = "Cтой красный свет - дороги нет!";
                break;
            case "yellow":
                $text = "Желтый свет - остановись и осмотрись";
                break;
            case "green":
                $text = "Зеленый свет - можно идти";
                break;
        }

    }



}


$oshibka = "непонятная ошибка";

echo "<h2>Hello World!</h2>";

$x = 2000;
$y = 19;
$z = $x + $y;
echo "<h2>На дворе $z год</h2>";

$Txt = "Привет, мир! вы знали что  ";
$X = 5;
$Y = 10.5;
$XY = $X + $Y;
echo "$Txt $X +  $Y =  $XY ?";


echo "<p><h3> Будем изучать тут функции</h3> </p>";
echo "<br>";
function people($t)
{
    echo "Проверим возраст покупателя при покупке сигарет";
    echo "<br>";
    echo 'Если возраст покупателя - ' . $t;
    echo "<br>";
    if ($t < 18) {
        echo "Сигареты НЕ продавать покупателю меньше 18 лет";
    } elseif ($t >= 18) {
        echo "Сигареты продавать покупателю есть 18 лет и более";
    } else {
        echo "Возраст не определен";
    }
}

echo "<br>";
people(18);


echo "<br>";
echo "<br>";

echo "<h1>Сделаем светофор</h1>";
if ($_POST['color'])
{
    $color = $_POST['color'];

    switch ($color){
        case "red":
            $text = "Cтой красный свет - дороги нет!";
            break;
        case "yellow":
            $text = "Желтый свет - остановись и осмотрись";
            break;
        case "green":
            $text = "Зеленый свет - можно идти";
            break;
    }

    echo "<h2>$text</h2>";
    echo '<a href=' . $_SERVER['REQUEST_URI'] . '><input type="button" value="Выбрать другой"></a>';

}
else {
        echo '<form action="/" method="post">
                <input type="radio" name="color" value="red">Красный<br>
                <input type="radio" name="color" value="yellow">Жёлтый<br>
                <input type="radio" name="color" value="green">Зелёный<br>
                <input type="submit" value="Выбрать" >
            </form>';
    }
echo '
    <form action="" method="post">
        <p><h1> Будем изучать тут отправку и обработку формы</h1> </p>
        <h2>Проверим ещё раз возраст покупателя при покупке сигарет более удобным способом для вас</h2>
        <h3>Способ №1</h3>
        <p><b>Ваше имя:</b><br>
            <input type="text" name="name" size="40">
        </p>
        <p><b>Каким браузером в основном пользуетесь:</b><Br>
            <input type="radio" name="browser" value="ie"> Internet Explorer<Br>
            <input type="radio" name="browser" value="opera"> Opera<Br>
            <input type="radio" name="browser" value="firefox"> Firefox<Br>
            <input type="radio" name="browser" value="chrome"> Google Chrome<Br>
        </p>
        <p>Комментарий<Br>
            <textarea name="comment" cols="40" rows="3"></textarea></p>


        <p><b>Выберите возраст покупателя</b><Br>
            <input type="radio" name="age1" value="over"> Покупателю больше 18 лет<Br>
            <input type="radio" name="age1" value="less"> Покупателю меньше 18 лет<Br>
            <input type="radio" name="age1" value="exactly"> Покупателю ровно 18 лет<Br>
        <p><input type="submit" value="Я выбрал и хочу узнать можно ли продать покупателю сигареты">
        <p><b><h3>Способ №2</h3></b></p>

        <p><b>Введите возраст покупателя</b></p>

        <input type="number" name="age2" max="100" value="15" required>

        <p><input type="submit" value="Отправить">
            <input type="reset" value="Очистить"></p>
    </form>
    ';



