<?php
include 'utils.php';

$model = new Model();

$model->header = 'includes/header.php';
$model->body = 'includes/_404.php';

renderPartial('includes/index.php', $model);

?>
