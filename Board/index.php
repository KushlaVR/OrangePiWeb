<?php
include 'utils.php';

$model = new Model();

$model->header = 'includes/header.php';
$model->body = 'includes/body.php';
$model->footer = 'includes/footer.php';
$model->custom = 'includes/custom.php';

renderPartial('includes/index.php', $model);

?>
