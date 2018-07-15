<?php
include 'utils.php';


$model = new Model();

$model->header = 'includes/header.php';
$model->footer = 'includes/footer.php';
$model->menu = 'includes/login.php';

renderPartial('includes/index.php', $model);

?>
