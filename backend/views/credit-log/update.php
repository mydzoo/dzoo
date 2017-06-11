<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CreditLog */

$this->title = 'Update Credit Log: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Credit Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="credit-log-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
