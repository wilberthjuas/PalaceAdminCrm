<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Ambientes;

/* @var $this yii\web\View */
/* @var $model app\models\Portales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portales-form">

<?php $form = ActiveForm::begin(); ?>

<div class="panel panel-default">
<div class="panel-heading">
   <h3 class="panel-title">Portales</h3>
</div>
<div class="panel-body">
   <div class="row">
     <div class="col-md-3">
        <?= $form->field($model, 'portal_nombre')->textInput(['maxlength' => true]) ?>
     </div>
     <div class="col-md-3">
        <?= $form->field($model, 'ambientes_id')->dropDownList(ArrayHelper::map(Ambientes::find()->all(),'id','ambiente'))  ?>
     </div>
   </div>
</div>
</div>

<div class="form-group">
    <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
