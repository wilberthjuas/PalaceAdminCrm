<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\assets;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AmbientesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ambientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ambientes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ambientes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ambiente',
            'entornos_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
