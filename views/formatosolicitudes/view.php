<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Formatosolicitudes */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Formatosolicitudes', 'url' => ['index']];
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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'autorizador_id',
            'autorizador_nombre',
            'autorizador_puesto',
            'solicitante_id',
            'solicitante_nombre',
            'solicitante_puesto',
            'usuario_id',
            'nombre',
            'puesto',
            'departamento',
            'correo',
            'comentario',
            'users_id',
        ],
    ]) ?>

</div>
