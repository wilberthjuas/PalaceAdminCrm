<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Portales */

$this->title = 'Create Portales';
$this->params['breadcrumbs'][] = ['label' => 'Portales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
