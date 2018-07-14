<?php

/**
 * template short summary.
 *
 * template description.
 *
 * @version 1.0
 * @author Віталік
 */

?>

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
        <?php renderPartial($model->header); ?>
    </div>

    <div class="container-fluid bg-2">
        <?php renderPartial($model->body); ?>
    </div>
    <div class="container">
        <?php renderPartial($model->custom); ?>
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

