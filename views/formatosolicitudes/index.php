<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\FormatosolicitudesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Formatosolicitudes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formatosolicitudes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Formatosolicitudes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'autorizador_id',
            'autorizador_nombre',
            'autorizador_puesto',
            'solicitante_id',
            //'solicitante_nombre',
            //'solicitante_puesto',
            //'usuario_id',
            //'nombre',
            //'puesto',
            //'departamento',
            //'correo',
            //'comentario',

            ['class' => 'yii\grid\ActionColumn',
              'template'=> '{view} {update} {delete} {addRol}',
              'buttons'=> [
                  'addRol'=>function($url,$model,$key){
                      return $model->id != '' ? Html::a(
                          '<span class="fa fa-user-plus" style="font-size:16px"></span>', 
                          Url::to(['rolusuarios/create', 'id' => $model->id])) :'';
                  }
              ]
        ],

        ],
    ]); ?>
</div>
