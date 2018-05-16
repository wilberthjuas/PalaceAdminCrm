<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\RolusuariosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rolusuarios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'rol_solicitado') ?>

    <?= $form->field($model, 'estatus_tiempo') ?>

    <?= $form->field($model, 'fecha_vencimiento') ?>

    <?= $form->field($model, 'solicitudAlta_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
