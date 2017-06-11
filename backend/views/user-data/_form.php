<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'letters')->textInput() ?>

    <?= $form->field($model, 'notices')->textInput() ?>

    <?= $form->field($model, 'topics')->textInput() ?>

    <?= $form->field($model, 'comments')->textInput() ?>

    <?= $form->field($model, 'follows')->textInput() ?>

    <?= $form->field($model, 'fans')->textInput() ?>

    <?= $form->field($model, 'credits1')->textInput() ?>

    <?= $form->field($model, 'credits2')->textInput() ?>

    <?= $form->field($model, 'credits3')->textInput() ?>

    <?= $form->field($model, 'credits4')->textInput() ?>

    <?= $form->field($model, 'credits5')->textInput() ?>

    <?= $form->field($model, 'credits6')->textInput() ?>

    <?= $form->field($model, 'login_count')->textInput() ?>

    <?= $form->field($model, 'prev_login_time')->textInput() ?>

    <?= $form->field($model, 'prev_login_ip')->textInput() ?>

    <?= $form->field($model, 'last_login_time')->textInput() ?>

    <?= $form->field($model, 'last_login_ip')->textInput() ?>

    <?= $form->field($model, 'online_time')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
