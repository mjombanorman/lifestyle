<?php

use kartik\widgets\FileInput;

\backend\assets\BootAsset::register($this);
?>
<div class="col-lg-3">
    <div class="row">
        <?php
        echo FileInput::widget([
            'name' => 'attachment_53',
            'pluginOptions' => [
                'showCaption' => false,
                'showRemove' => false,
                'showUpload' => false,
                'browseClass' => 'btn btn-primary btn-block',
                'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                'browseLabel' => 'Select Photo'
            ],
            'options' => ['accept' => 'image/*']
        ]);
        ?>
    </div>
</div>