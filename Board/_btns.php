
<?php
for ($i = 1; $i <= 16; $i++) { 

    $model->id = $i;
	$model->cmd = "set";
	
	include '_btn.php';
};
?>

<button type="button" class="btn btn-success btn-read" data-cmd = "get">Read</button>
