<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FormatosolicitudesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="formatosolicitudes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'autorizador_id') ?>

    <?= $form->field($model, 'autorizador_nombre') ?>

    <?= $form->field($model, 'autorizador_puesto') ?>

    <?= $form->field($model, 'solicitante_id') ?>

    <?php // echo $form->field($model, 'solicitante_nombre') ?>

    <?php // echo $form->field($model, 'solicitante_puesto') ?>

    <?php // echo $form->field($model, 'usuario_id') ?>

    <?php // echo $form->field($model, 'nombre') ?>

    <?php // echo $form->field($model, 'puesto') ?>

    <?php // echo $form->field($model, 'departamento') ?>

    <?php // echo $form->field($model, 'correo') ?>

    <?php // echo $form->field($model, 'comentario') ?>

    <?php // echo $form->field($model, 'users_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
