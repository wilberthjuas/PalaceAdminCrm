<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
/*use yii\widgets\ActiveForm;*/
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\behaviors\AttributeBehavior;
use \yii\db\ActiveRecord;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
       <div class="alert alert-info" role="alert">
         <p>Bienvenido al sistema de registro de usuarios</p>
       </div>

        
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-md-6 col-md-offset-5">
                <h4>Solicitud</h4>
                    <?= Html::a('<i class="fa fa-file-text"></i>',['formatosolicitudes/create'], ['class' => 'btn btn-info btn-lg','style'=>"font-size:54px"]) ?>
            </div>
        </div>

    </div>
</div>
