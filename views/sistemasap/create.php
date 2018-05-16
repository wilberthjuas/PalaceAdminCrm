<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sistemasap */

$this->title = 'Create Sistemasap';
$this->params['breadcrumbs'][] = ['label' => 'Sistemasaps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sistemasap-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
