<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Datas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-data-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'credits1',
            'letters',
            'notices',
            'topics',
            'comments',
            // 'follows',
            // 'fans',
            // 'credits2',
            // 'credits3',
            // 'credits4',
            // 'credits5',
            // 'credits6',
            // 'login_count',
            // 'prev_login_time:datetime',
            // 'prev_login_ip',
            // 'last_login_time:datetime',
            // 'last_login_ip',
            // 'online_time:datetime',
            // 'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
