<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SistemasapSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sistemasaps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sistemasap-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sistemasap', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'sistemas',
            'ambientes',
            'portales',
            'solicitudAlta_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
