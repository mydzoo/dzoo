<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TopicCollect */

$this->title = 'Create Topic Collect';
$this->params['breadcrumbs'][] = ['label' => 'Topic Collects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="topic-collect-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
