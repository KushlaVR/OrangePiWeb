
<?php
for ($i = 1; $i <= 16; $i++) {

    $model->id = $i;
	$model->cmd = "set";

	include 'includes/_btn.php';
};
?>
