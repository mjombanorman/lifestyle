<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use backend\assets\BootAsset;

//BootAsset::register($this);
?>




<a href ="<?php echo Yii::$app->urlManager->createUrl('blog/posts/view', ['id' => $model->post_id]) ?> ">
    <tr>
        <td class="small-cell v-align-middle">
            <div class="checkbox check-success">
                <input id="checkbox8" type="checkbox" value="1"> <label for="checkbox8"></label>
            </div>
        </td>
        <td class="small-cell v-align-middle">
            <div class="star">
                <input checked id="checkbox9" type="checkbox" value="1"> <label for="checkbox9"></label>
            </div>
        </td>
        <td class=" v-align-middle">
            <?= $model->author->first_name ?>
        </td>
        <td class=" tablefull v-align-middle">
            <span class="muted"><a href="<?= \yii\helpers\Url::to(['view', 'id' => $model->post_id]) ?>"><?= $model->post_title ?></a></span>
        </td>
        <td class="">
            <span class="muted"><?= Yii::$app->formatter->asDate($model->post_date) ?> &nbsp
                <?= Yii::$app->formatter->asTime($model->post_date) ?></span>
        </td>
    </tr>
</a>