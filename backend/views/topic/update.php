<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CircleTopic */

$this->title = 'Update Circle Topic: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Circle Topics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="circle-topic-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
