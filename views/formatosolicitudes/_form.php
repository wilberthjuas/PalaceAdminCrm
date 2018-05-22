<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use app\models\Comentarios;
use app\models\Sistemasap;
use app\models\Entornos;
use app\models\Ambientes;
use app\models\Portales;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Formatosolicitudes */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container-fluid">


<?php $form = ActiveForm::begin(); ?>
<div class="panel panel-success">
<div class="panel-heading">
    <h3 class="panel-title">Datos de Autorizador</h3>
</div>
  <div class="panel-body">
      <div class="row">
          <div class="col-md-2">
              <?= $form->field($model, 'autorizador_id')->textInput(['onchange' => 'js:consultaWSAut();','maxlength' => true])->label('ID del Autorizador'); ?>
         </div>
         <div class="col-md-5">
              <?= $form->field($model, 'autorizador_nombre')->textInput(['maxlength' => true])->label('Nombre del Autorizador');?>
         </div>
         <div class="col-md-5">
              <?= $form->field($model, 'autorizador_puesto')->textInput(['maxlength' => true])->label('Puesto del Autoriador') ?>
         </div>
      </div>
  </div>
</div>


<div class="panel panel-success">
<div class="panel-heading">
   <h3 class="panel-title">Datos del solicitante</h3>
</div>
   <div class="panel-body">
      <div class="row">
          <div class="col-md-2">
              <?= $form->field($model, 'solicitante_id')->textInput(['onchange' => 'js:consultaWSSol();','maxlength' => true])->label('ID del Solicitante'); ?>
          </div>
         <div class="col-md-5">
              <?= $form->field($model, 'solicitante_nombre')->textInput(['maxlength' => true])->label('Nombre del Solicitante'); ?>
         </div>
         <div class="col-md-5">
             <?= $form->field($model, 'solicitante_puesto')->textInput(['maxlength' => true])->label('Puesto del Solicitante'); ?>
         </div>
      </div>
   </div>
</div>



<div class="panel panel-success">
<div class="panel-heading">
    <h3 class="panel-title">Datos del usuario</h3>
</div>
  <div class="panel-body">
     <div class="row">
         <div class="col-md-2">
             <?= $form->field($model, 'usuario_id')->textInput(['onchange' => 'js:consultaWSUsu();','maxlength' => true])->label('ID del Usuario'); ?>
         </div>
         <div class="col-md-5">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true])->label('Nombre del Usuario'); ?>
         </div>
        <div class="col-md-5">
            <?= $form->field($model, 'puesto')->textInput(['maxlength' => true])->label('Puesto del Usuario'); ?>
        </div>
      </div>
      <div class="row">
         <div class="col-md-2">
            <?= $form->field($model, 'departamento')->textInput(['maxlength' => true])->label('Departamento'); ?>
         </div>
         <div class="col-md-5">
           <?= $form->field($model, 'correo')->textInput(['maxlength' => true])->label('Correo'); ?>
         </div>
     </div>
  </div>
</div>



<div class="row">
 <div class="col-md-6 sm-5">
   <spam><strong>Comentarios</strong></spam>
   <?= $form->field($model, 'comentario')->textarea(array('rows'=>7,'cols'=>4))->hint('Max 255 characters.')->label(''); ?>
 </div>
</div>


<div class="form-group">
    <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
</div>

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
