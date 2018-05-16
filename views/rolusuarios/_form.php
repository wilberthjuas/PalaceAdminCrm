<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\detail\DetailView;
use app\models\Formatosolicitudes;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Rolusuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rolusuarios-form">

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
        'model' => $modelFormato,
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

    <?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-md-5">
       <?= $form->field($model, 'rol_solicitado')->textarea(array('rows'=>2,'cols'=>4))->hint('Max 255 characters.')->label('Rol solicitado'); ?>
   </div>
   <div class="col-md-2">
   <?=
                    $form->field($model, 'estatus_tiempo')
                        ->radioList(
                            [0 => 'Definido', 1 => 'Indefinido'],
                            [
                                'item' => function($index, $label, $name, $checked, $value) {

                                    $return = '<label class="modal-radio">';
                                    $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" id="fecha_'.$index.'"onclick="mostrarCampoFecha();'.'". >';
                                    $return .= '<i></i>';
                                    $return .= '<span>' . ucwords($label) . '</span>';
                                    $return .= '</label>';

                                    return $return;
                                }
                            ]
                        )
                    ->label('Estatus');
                    ?>
   </div>
   <div class="col-md-5" id="fecha_v" style="display:none">
        <label class="control-label">Fecha de vencimiento</label>';
            <?= DatePicker::widget([
                 'model' => $model,
                 'attribute' => 'fecha_vencimiento',
                 'options' => ['placeholder' => 'Fecha de vencimiento ...','id'=>'Fecha_ven'],
                 'pluginOptions' => [
                 'format' => 'yyyy-mm-dd',
                 'autoclose'=>true]]);
            ?>
   </div>
</div>

<br>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<script type="text/javascript">
<!--
   function mostrarCampoFecha(){
//Si la opcion con id Conocido_1 (dentro del documento > formulario con name fcontacto >     y a la vez dentro del array de Conocido) esta activada
if (document.getElementById('fecha_0').checked == false) {
//muestra (cambiando la propiedad display del estilo) el div con id 'desdeotro'
document.getElementById('fecha_v').style.display='block';
//por el contrario, si no esta seleccionada
} else if(document.getElementById('fecha_0').checked == true) {
//oculta el div con id 'desdeotro'
document.getElementById('fecha_v').style.display='none';
}
}
-->


$(document).on('ready',function(){       
       
        $.ajax({                        
           type: "POST",                 
           url: '<?php echo(Yii::$app->urlManager->createUrl('rolusuarios/lists')); ?>',                     
           data: $("#chat-box").serialize(), 
           success: function(data)             
           {
             $('#chat-box').html(data);               
           }
       });
});
</script>
