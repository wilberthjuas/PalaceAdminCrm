<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Entornos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entornos-form">

<?php $form = ActiveForm::begin(); ?>

<div class="panel panel-default">
<div class="panel-heading">
 <h3 class="panel-title">Entorno</h3>
</div>
 <div class="panel-body">
     <div class="row">
        <div class="col-md-2">
           <?= $form->field($model, 'sistema_nombre')->textInput(['maxlength' => true]) ?>
        </div>
     </div>
 </div>
</div>


<div class="form-group">
    <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>

