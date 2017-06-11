<?php

use yii\bootstrap\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TopicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Topics';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="topic-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Topic', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'circle_id',
            'user_id',
            'title',
            'summary',
            // 'keywords',
            // 'description',
            // 'imgs',
            // 'views',
            // 'comments',
            // 'likes',
            // 'heats',
            // 'collects',
            // 'rewards',
            // 'created_at',
            // 'updated_at',
            // 'status',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {like}',
                'buttons' => [
                    'like' => function ($url, $model, $key) {
                        return Html::a(
                            Html::icon('heart-empty'),
                            ['collect', 'id' => $model->id],
                            [
                                'title' => '收藏',
                                'data' => [
                                    'method' => 'post',
                                ],
                            ]
                        );
                    },
                ],
            ],
        ],
    ]); ?>
</div>
