<!DOCTYPE html>


<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Плата розширення Pi Extantion Board explain priject</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="./css/template.css" type="text/css" />
    <script src="./js/jquery-3.0.0.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="./js/board.js"></script>
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
    <div class="container">
        <h1>Плата розширення портів Raspbery Pi (Raspberry Pi IO Extension Board)</h1>
        <div class="row">
            <div class="col-sm-4">
                <h2>Керування виходами</h2>
                <?php include '_btns.php'; ?>
            </div>
            <div class="col-sm-8">
                <h2>Поточний стан</h2>
                <?php include '_board.php'; ?>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <a href="https://www.olx.ua/uk/obyavlenie/plata-rozshirennya-portv-raspbery-pi-raspberry-pi-io-extension-board-IDzQPdy.html" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-search"></span> Де купити?
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-3 text-center">
        <h3>Як виглядає плата?</h3>
        <br />
        <div class="row">
            <div class="col-sm-4">
                <img src="./img/board-1.jpg" alt="Image" width="300" />
                <p>Опис фкнкіцй</p>
            </div>
            <div class="col-sm-4">
                <img src="./img/board-2.jpg" alt="Image" width="300" />
                <p>Вигляд під кутом</p>
            </div>
            <div class="col-sm-4">
                <img src="./img/board-3.jpg" alt="Image" width="300" />
                <p>Вигляд з боку</p>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(onStartup)
    </script>
</body>
</html>

