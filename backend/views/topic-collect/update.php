<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TopicCollect */

$this->title = 'Update Topic Collect: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Topic Collects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="topic-collect-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
