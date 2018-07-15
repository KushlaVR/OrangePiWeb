<?php

/**
 * custom short summary.
 *
 * custom description.
 *
 * @version 1.0
 * @author Віталік
 */

?>

<h1>Плата розширення портів Raspbery Pi (Raspberry Pi IO Extension Board)</h1>
<div class="row">
    <div class="col-sm-4">
        <h2>Керування виходами</h2>
        <?php renderPartial('includes/_btns.php'); ?>
    </div>
    <div class="col-sm-8">
        <h2>Поточний стан</h2>
        <?php renderPartial('includes/_board.php'); ?>
        <a href="https://www.olx.ua/uk/obyavlenie/plata-rozshirennya-portv-raspbery-pi-raspberry-pi-io-extension-board-IDzQPdy.html" class="btn btn-primary btn-lg">
            <span class="glyphicon glyphicon-search"></span> Де купити?
        </a>
    </div>
</div>
<script>
        $(document).ready(onStartup)
</script>