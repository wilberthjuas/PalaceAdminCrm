<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Formatosolicitudes */

$this->title = "Solicitud de Creación Usuario";
$this->params['breadcrumbs'][] = ['label' => 'Solicitudes Pendientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formatosolicitudes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
    $var="";
      if ('status'==0){
        $var= 'No Revisado';
      }
      ?>


    <?= DetailView::widget([
       'model' => $model,
       'attributes' => [
           'usuario_id',
           'nombre',
           'puesto',
           'departamento',
           'correo',
           'comentario',
           'usuarioRef',
           'fecha_solicitud',
           'hora_solcitud',  // description attribute in HTML
       [                      // the owner name of the model
           'label' => 'Status',
           'value' => $var,
       ],
       ],
    ]
  ) ?>

</div>
