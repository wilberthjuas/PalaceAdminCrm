<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Rolusuarios */

$this->title = 'Create Rolusuarios';
$this->params['breadcrumbs'][] = ['label' => 'Rolusuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rolusuarios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelFormato' => $modelFormato,
    ]) ?>

</div>
