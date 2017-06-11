<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\UserData */

$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'User Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-data-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_id',
            'letters',
            'notices',
            'topics',
            'comments',
            'follows',
            'fans',
            'credits1',
            'credits2',
            'credits3',
            'credits4',
            'credits5',
            'credits6',
            'login_count',
            'prev_login_time:datetime',
            'prev_login_ip',
            'last_login_time:datetime',
            'last_login_ip',
            'online_time:datetime',
            'created_at',
        ],
    ]) ?>

</div>
