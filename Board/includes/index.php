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
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="48">
    <div class="container-fluid bg-1 text-center">
        <nav class="navbar bg-1 fixed-top">
            <div class="container">
                <div class="" id="myNavbar">
                    <ul class="nav navbar-right">
                        <li>
                            <a href="#mabout">МОЖЛТВОСІ</a>
                        </li>
                        <li>
                            <a href="#mcontrol">КЕРУВАННЯ</a>
                        </li>
                        <li>
                            <a href="#mview">ВИГЛЯД</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <br />
        <br />
        <?php renderPartial($model->header); ?>
        <br />
        <br />
    </div>

    <div class="container-fluid bg-2" id="mabout">
        <br />
        <br />
        <?php renderPartial($model->menu); ?>
        <br />
        <br />
    </div>
    <div class="container" id="mcontrol">
        <br />
        <br />
        <?php renderPartial($model->body); ?>
    </div>
    <div class="container-fluid bg-3 text-center" id="mview">
        <br />
        <br />
        <?php renderPartial($model->footer); ?>
        <br />
        <br />
    </div>
</body>
</html>

