<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Entornos;
/* @var $this yii\web\View */
/* @var $model app\models\Ambientes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ambientes-form">

<?php $form = ActiveForm::begin(); ?>

<div class="panel panel-default">
<div class="panel-heading">
   <h3 class="panel-title">Ambiente</h3>
</div>
<div class="panel-body">
   <div class="row">
     <div class="col-md-3">
        <?= $form->field($model, 'ambiente')->textInput(['maxlength' => true]) ?>
     </div>
     <div class="col-md-3">
        <?= $form->field($model, 'entornos_id')->dropDownList(ArrayHelper::map(Entornos::find()->all(),'id','sistema_nombre')) ?>
     </div>
   </div>
</div>
</div>



<div class="form-group">
    <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
