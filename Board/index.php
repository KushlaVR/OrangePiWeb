<!DOCTYPE html>
<?php
function __autoload($class_name) {
    require_once $class_name . '.php';
}

__autoload('Board');

$values = urldecode($_GET["cmd"]);
if ($values!=NULL){
    $board = new Board;
    if ($board->isCommand($values)){
        var_dump($board);
        //$board.gpio_exec();
    }
    var_dump(json_decode($values));
    var_dump(json_decode($values, true));


}
/*

$values = urldecode($_GET["update"]);

echo $values;

var_dump(json_decode($values));
var_dump(json_decode($values, true));

//return;


//ini_set('display_errors', true); error_reporting(E_ALL); // <- for debugging purposes only

$socket=socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ( !$socket ) {
$errno = socket_last_error();
$error = sprintf('%s (%d)', socket_strerror($errno), $errno);
trigger_error($error, E_USER_ERROR);
}

if ( !socket_connect($socket, '127.0.0.1', 9001) ) {
$errno = socket_last_error($socket);
$error = sprintf('%s (%d)', socket_strerror($errno), $errno);
trigger_error($error, E_USER_ERROR);
}

$buff='P\00\00\00\e5G\1f\b9\c6\acB\84\15\e7\b3*\17\ab\00G2\n\9c\ba{\a9}\dab"\c31\ed\f7\94\fc\aeX\ab\13\r/\02\ce\83f\bc?\96q\10M\b0\f4\a0\b1\95X\d0\85\10\df$|\de$\b4\f6m\a9\ff%Z\b4\d8\aa\da\bb';
$length = strlen($buff);
$sent = socket_write($socket, $buff, $length);
if ( FALSE===$sent ) {
$errno = socket_last_error($socket);
$error = sprintf('%s (%d)', socket_strerror($errno), $errno);
trigger_error($error, E_USER_ERROR);
}
else if ( $length!==$sent ) {
$msg = sprintf('only %d of %d bytes sent', $length, $sent);
trigger_error($msg, E_USER_NOTICE);
}*/

?>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Плата розширення Pi Extantion Board explain priject</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./css/bootstrap.css" type="text/css" />
    <script src="./js/jquery-3.0.0.js"></script>
    <script src="./js/bootstrap.js"></script>
    <style>
        .bg-1 {
            background-color: #1abc9c;
            color: #ffffff;
        }

        .bg-2 {
            background-color: #474e5d;
            color: #ffffff;
        }

        .bg-3 {
            background-color: #ffffff;
            color: #555555;
        }

        .container-fluid {
            padding-top: 70px;
            padding-bottom: 70px;
        }

        .img-circle {
            border-radius: 50%;
        }
    </style>

</head>
<body>

    <div class="container-fluid bg-1 text-center">
        <h3>Привіт</h3>
        <img src="./img/my.jpg" class="img-circle" alt="Bird" width="300" height="300" />
        <h3>Я є розробник</h3>
    </div>

    <div class="container-fluid bg-2">
        <h3>Що я розробив?</h3>
        <p>
            Плата розширення портів Raspbery Pi
        </p>
        <h3>Які у плати можливості?</h3>
        <ul>
            <li>40-ка піновий розєм для підключення Raspberry</li>
            <li>Годинник рельного часу із незалежним живленням від 3,3В батарейки DS1307 (При вимкненні живлення годинник не збивається)</li>
            <li>8 чотирипінових виходів для для підключення датчиків по шині I2C (Наприклад: Компас HMC5883L, Гіроскоп MPU6050, Термометр TC74 та багато інших пристроїв) VCC лінія шини може бути підключена до 5В або 3,3В з допомогою джампера.</li>
            <li>8 трипінових вихдів для підключння датчиків по шині 1-Wire. (Наприклад: термометр DS18B20, домофонний ключ "таблетка" та ін.) VCC лінія шини може бути підключена до 5В або 3,3В з допомогою джампера.</li>
            <li>
                16 цифрових входів/виходів для підключення зовнішніх приладів, або кінцевих сенсорів (Наприклад: Поплавкові датчики рівня води, герконові кінцевики, кнопки, модуль реле на 1/2/8/16 реле).
                <br />
                Кожені вихід має відповідний світлодіод, який загоряєтьсся при активацїі відповідного виходу.
                <br />
                Виходи реалізовані на двох модулях PCF8574 на 8 портів. На платі передбачено місце під перемички для налаштування адрес модулів. Типово перемички встановлено таким чином, що адреси модулів 0x25 та 0x27.
            </li>
            <li>Кожен GPIO Raspberry виведено на окрему шину (Шина сумісна з датчиками для Arduino. Біля кожного GPIO продубльовано піни живлення і мінус).</li>
        </ul>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <a href="https://www.olx.ua/uk/obyavlenie/plata-rozshirennya-portv-raspbery-pi-raspberry-pi-io-extension-board-IDzQPdy.html" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-search"></span> Де купити?
                </a>
            </div>
            <div class="col-md-4">
                <a href="~/tests.php" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-search"></span> Керування
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-3 text-center">
        <h3>Як виглядає плата?</h3>
        <br />
        <div class="row">
            <div class="col-sm-4">
                <img src="./img/board-1.jpg" alt="Image" width="350" />
                <p>Опис фкнкіцй</p>
            </div>
            <div class="col-sm-4">
                <img src="./img/board-2.jpg" alt="Image" width="350" />
                <p>Вигляд під кутом</p>
            </div>
            <div class="col-sm-4">
                <img src="./img/board-3.jpg" alt="Image" width="350" />
                <p>Вигляд з боку</p>
            </div>
        </div>
    </div>

</body>
</html>

