<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\EntornosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Entornos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entornos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Entornos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'sistema_nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
