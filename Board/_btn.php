<div class="row">
<div class="col-md-2">

<div class="input-group">
<div class="form-control" id="p<?php echo $model->id ?>">Port<?php echo $model->id ?></div>
<div class="input-group-append" role="group">
  <button type="button" class="btn btn-success btn-on" data-id = "<?php echo $model->id ?>" data-state="1" data-cmd = "<?php echo $model->cmd ?>">On</button>
  <button type="button" class="btn btn-light btn-off" data-id = "<?php echo $model->id ?>" data-state="0" data-cmd = "<?php echo $model->cmd ?>">Off</button>
</div>
</div>

</div>
</div>