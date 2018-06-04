<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Comentarios;
use app\models\Roles;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Formatosolicitudes */
/* @var $form yii\widgets\ActiveForm */

date_default_timezone_set('America/Cancun');
$model2 = Roles::find()->where(['id_form_solicitud'=>$model->id])->all();
$this->title = 'Detalle Solicitud';
?>


<?php $form = ActiveForm::begin(); ?>
<div class="input-sm">
<div class="panel panel-default col-md-6"  style="float:left;">

  <div class="panel-body">
    <h4>Datos del Nuevo Usuario</h4>
         <div class="form-group">
             <?= $form->field($model, 'usuario_id')->textInput(['onchange' => 'js:consultaWSUsu();','readonly'=>true,'maxlength' => true,'style'=>'width:75%;'])->label('ID del Usuario',['class'=>'col-sm-3','style'=>'padding-top:1%']); ?>

         </div>
         <div class="form-group">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true,'style'=>'width:75%;','readonly'=>true])->label('Nombre del Usuario',['class'=>'col-sm-3','style'=>'padding-top:1%']); ?>
         </div>
        <div class="form-group">
            <?= $form->field($model, 'puesto')->textInput(['maxlength' => true,'style'=>'width:75%;','readonly'=>true])->label('Puesto del Usuario',['class'=>'col-sm-3','style'=>'padding-top:1%']); ?>
        </div>
         <div class="form-group">
            <?= $form->field($model, 'departamento')->textInput(['maxlength' => true,'style'=>'width:75%;','readonly'=>true])->label('Departamento',['class'=>'col-sm-3','style'=>'padding-top:1%']); ?>
         </div>
         <div class="form-group">
           <?= $form->field($model, 'correo')->textInput(['maxlength' => true,'style'=>'width:75%;','readonly'=>true])->label('Correo',['class'=>'col-sm-3','style'=>'padding-top:1%']); ?>
         </div>
         <div class="form-group">
           <?= $form->field($model, 'usuarioRef')->textInput(['maxlength' => true,'style'=>'width:75%;','readonly'=>true])->label('Usuario Referencia',['class'=>'col-sm-3','style'=>'padding-top:1%']); ?>
         </div>
         <div class="form-group">
           <?= $form->field($model, 'comentario')->textarea(array('rows'=>3,'style'=>'resize:none;','readonly'=>true))->label('Comentario realizado en la solicitud'); ?>
         </div>
       </div>
  </div>




<div class="panel panel-default col-md-6" style="float:right;">
<?php if ($model2!=null): ?>
  <div class="panel-body">
    <h4>Roles Asignados</h4>
    <?php foreach (Roles::find()->where(['id_form_solicitud'=>$model->id])->each() as $Rol): ?>
       <div class="form-group">
        <?= $form->field($Rol, 'Descripcion')->textarea(array('rows'=>3,'style'=>'resize:none;'))->hint("Describa las actividades que desea realizar")->label('Actividades A realizar'); ?>
      </div>
      <div class="form-group">
        <label>Duración de los permisos</label>
        <?=DatePicker::widget([
        'name' => 'form_date',
        'value' => $Rol->Duracion,
        'options'=>['class'=>'form-control'],
        //'language' => 'ru',
        //'dateFormat' => 'yyyy-MM-dd',
    ]);?>
    </div>'
<?php endforeach;?>

  </div>
<?php endif;?>
</div>
</div>

<?php ActiveForm::end(); ?>

<script language="javascript">
  function consultaWSAut()
  {

                if($('#formatosolicitudes-autorizador_id').val().length != null  )
                {
                    $.ajax({
                            type: "GET",
                            url:  '<?php echo(Yii::$app->urlManager->createUrl('formatosolicitudes/obtenerempleado')); ?>',

                            data: {
                                    parametros: $('#formatosolicitudes-autorizador_id').val()
                                  },
                            success: function(data)
                            {

                                if(data!=0)
                                {
                                    var res="";
                                    res=jQuery.parseJSON(data);
                                    $('#formatosolicitudes-autorizador_nombre').val(res.NOMBRE);
                                    $('#formatosolicitudes-autorizador_puesto').val(res.JOBDESCR);

                                }
                            },
                            error: function(data)
                            {
                                alert("Error occured.please try again:"+data);
                            }

                    })


                }else
                {
                    alert('La cedula de autorizador ingresada no existe');
                }
  }
   function consultaWSSol()
  {

                if($('#formatosolicitudes-solicitante_id').val().length != null  )
                {
                    $.ajax({
                            type: "GET",
                            url:  '<?php echo(Yii::$app->urlManager->createUrl('formatosolicitudes/obtenerempleado')); ?>',

                            data: {

                                    parametros: $('#formatosolicitudes-solicitante_id').val()
                                  },


                            success: function(data)
                            {

                                if(data!=0)
                                {
                                    var res="";
                                    res=jQuery.parseJSON(data);
                                    $('#formatosolicitudes-solicitante_nombre').val(res.NOMBRE);
                                    $('#formatosolicitudes-solicitante_puesto').val(res.JOBDESCR);

                                }
                            },
                            error: function(data)
                            {
                                alert("Error occured. please try again:"+data);
                            }

                    })


                }else
                {
                    alert('La cedula del solicitante ingresada no existe!');
                }
  }

  function consultaWSUsu()
  {

                if($('#formatosolicitudes-usuario_id').val().length != null  )
                {
                    $.ajax({
                            type: "GET",
                            url:  '<?php echo(Yii::$app->urlManager->createUrl('formatosolicitudes/obtenerempleado')); ?>',

                            data: {

                                    parametros: $('#formatosolicitudes-usuario_id').val()
                                  },


                            success: function(data)
                            {

                                if(data!=0)
                                {
                                    var res="";
                                    res=jQuery.parseJSON(data);
                                    $('#formatosolicitudes-nombre').val(res.NOMBRE);
                                    $('#formatosolicitudes-puesto').val(res.JOBDESCR);
                                    $('#formatosolicitudes-departamento').val(res.DESCR);

                                }
                            },
                            error: function(data)
                            {
                                alert("Error occured.please try again:"+data);
                            }

                    })


                }else
                {
                    alert('La cedula del usuario ingresada no existe!');
                }
  }
</script>
