<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Bienvenido';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
    <h2><?= Html::img('@web/img/palace_Alta.png',['width'=>'205','align'=>'center']) ?></h2>

    <p class="align">Por favor complete los siguientes campos para iniciar sesión:</p>

            <?php $form = ActiveForm::begin(['id' => 'login-form','layout' => 'horizontal',]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->input('username', ['placeholder' => "Ingresa tu usuario"])->label(false) ?>

                <?= $form->field($model, 'password')->passwordInput(['placeholder' => "Ingresa tu contraseña"])->label(false) ?>

                <?= $form->field($model, 'rememberMe')->checkbox()->label('Recordar contraseña') ?>

                <div class="form-group">
                    <?= Html::submitButton('Iniciar Sesión', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        
