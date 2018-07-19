<?php if (! class_exists($className)) return; ?>

<div class="row">
    <div class="col-sm-12">
        <div class="input-group">
            <div class="form-control" id="p<?php echo $model->id ?>">
                <label>
                    Port<?php echo $model->id ?>
                </label>
                <label class="switch float-right">
                    <input type="checkbox"
                        class="checkbox cb-p<?php echo $model->id ?>"
                        data-id="<?php echo $model->id ?>"
                        data-cmd="<?php echo $model->cmd ?>" />
                    <span class="slider"></span>
                </label>
            </div>
        </div>

    </div>
</div>