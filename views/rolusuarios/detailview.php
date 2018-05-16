<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Formatosolicitudes */

$this->title = 'Asignar Rol';
$this->params['breadcrumbs'][] = ['label' => 'Formatosolicitudes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formatosolicitudes-view">

    <h1><?= Html::encode($this->title) ?></h1>
<br>
<?php $attributes = [
     [
       'group' =>true,
       'label' => 'Datos de autorizador',
       'rowOptions' =>['class'=>'info']
     ],
  [
    'columns'=>[
        [
            'attribute' => 'autorizador_nombre',
            'label' => 'Nombre del autorizador',
            'displayOnly'=>true,
            'valueColOptions'=>['style' =>'width:30%']
        ],
        [
            'attribute' => 'autorizador_puesto',
            'label' => 'Puesto del autorizador',
            'displayOnly'=>true,
            'valueColOptions'=>['style' =>'width:30%']
        ]
        ]
  ],
  [
    'group' =>true,
    'label' => 'Datos del Solicitante',
    'rowOptions' =>['class'=>'info']
  ],
  [
    'columns'=>[
        [
            'attribute' => 'solicitante_nombre',
            'label' => 'Nombre del solicitante',
            'displayOnly'=>true,
            'valueColOptions'=>['style' =>'width:30%']
        ],
        [
            'attribute' => 'solicitante_puesto',
            'label' => 'Puesto del solicitante',
            'displayOnly'=>true,
            'valueColOptions'=>['style' =>'width:30%']
        ]
        ]
  ],
  [
    'group' =>true,
    'label' => 'Datos del usuario',
    'rowOptions' =>['class'=>'info']
  ],
  [
    'columns'=>[
        [
            'attribute' => 'nombre',
            'label' => 'Nombre del usuario',
            'displayOnly'=>true,
            'valueColOptions'=>['style' =>'width:30%']
        ],
        [
            'attribute' => 'puesto',
            'label' => 'Puesto del usuario',
            'displayOnly'=>true,
            'valueColOptions'=>['style' =>'width:30%']
        ]
               ],
               
            ],
  [
    'columns'=>[
        [
            'attribute' => 'departamento',
            'label' => 'Departamento del usuario',
            'displayOnly'=>true,
            'valueColOptions'=>['style' =>'width:30%']
        ],
        [
            'attribute' => 'correo',
            'label' => 'Correo del usuario',
            'displayOnly'=>true,
            'valueColOptions'=>['style' =>'width:30%']
        ]
                ]
  ]
 ];
?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => $attributes,
        'mode' => 'view',
        'bordered' =>true,
        'striped' => true,
        'condensed' =>true,
        'responsive' =>true,
        'hover' => true,
        'hAlign'=>DetailView::ALIGN_RIGHT,
        'vAlign'=>DetailView::ALIGN_TOP,
        'fadeDelay'=>2,
        'deleteOptions'=>[ // your ajax delete parameters
            'params' => ['id' => 1000, 'kvdelete'=>true],
        ],
        'container' => ['id'=>'kv-demo'],
       // 'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
       ]) 
    ?>


    <div class="row">
       <div class="col-md-6">
       
       </div>
    
    </div>


</div>
