<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sistemasap */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sistemasap-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sistemas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ambientes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'portales')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'solicitudAlta_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
