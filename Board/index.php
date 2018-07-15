<?php
include 'utils.php';

$model = new Model();

$model->header = 'includes/header.php';
$model->body = 'includes/body.php';
$model->footer = 'includes/footer.php';
$model->menu = 'includes/menu.php';

renderPartial('includes/index.php', $model);

?>
