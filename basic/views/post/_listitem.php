<?php
    use yii\helpers\Html;

?>
<div class="row">
    <h3><?= Html::a($model['title'], ['post/view', 'id' => $model['id']]); ?></h3>
    <p><?= $model['text'] ?></p>
</div>
