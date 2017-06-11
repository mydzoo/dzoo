<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CircleTopic */

$this->title = 'Create Circle Topic';
$this->params['breadcrumbs'][] = ['label' => 'Circle Topics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="circle-topic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
