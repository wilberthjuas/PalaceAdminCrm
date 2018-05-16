<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Entornos */

$this->title = 'Create Entornos';
$this->params['breadcrumbs'][] = ['label' => 'Entornos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entornos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
