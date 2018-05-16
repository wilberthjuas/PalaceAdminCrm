<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rolusuarios */

$this->title = 'Update Rolusuarios: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Rolusuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rolusuarios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelFormato' => $modelFormato,
    ]) ?>

</div>
