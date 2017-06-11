<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserDataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'letters') ?>

    <?= $form->field($model, 'notices') ?>

    <?= $form->field($model, 'topics') ?>

    <?= $form->field($model, 'comments') ?>

    <?php // echo $form->field($model, 'follows') ?>

    <?php // echo $form->field($model, 'fans') ?>

    <?php // echo $form->field($model, 'credits1') ?>

    <?php // echo $form->field($model, 'credits2') ?>

    <?php // echo $form->field($model, 'credits3') ?>

    <?php // echo $form->field($model, 'credits4') ?>

    <?php // echo $form->field($model, 'credits5') ?>

    <?php // echo $form->field($model, 'credits6') ?>

    <?php // echo $form->field($model, 'login_count') ?>

    <?php // echo $form->field($model, 'prev_login_time') ?>

    <?php // echo $form->field($model, 'prev_login_ip') ?>

    <?php // echo $form->field($model, 'last_login_time') ?>

    <?php // echo $form->field($model, 'last_login_ip') ?>

    <?php // echo $form->field($model, 'online_time') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
