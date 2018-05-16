<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ambientes */

$this->title = 'Create Ambientes';
$this->params['breadcrumbs'][] = ['label' => 'Ambientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ambientes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
