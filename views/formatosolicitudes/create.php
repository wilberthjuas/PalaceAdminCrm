<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Formatosolicitudes */

$this->title = 'Create Formatosolicitudes';
$this->params['breadcrumbs'][] = ['label' => 'Formatosolicitudes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formatosolicitudes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
