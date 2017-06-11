<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TopicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Circle Topics';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="circle-topic-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Circle Topic', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'title',
            [
                'attribute' => 'user_id',
                'value' => function ($model, $key, $index, $column) {
                    return $model->author->username;
                },
            ],
            'collects',
            'summary',
            // 'keywords',
            // 'description',
            // 'imgs',
            // 'views',
            // 'comments',
            // 'likes',
            // 'heats',
            // 'rewards',
            // 'created_at',
            // 'updated_at',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
