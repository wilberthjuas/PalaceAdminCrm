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


<?php $form = ActiveForm::begin(); ?>
<div class="input-sm">
<div class="panel panel-default col-md-4">


  <div class="panel-body">
    <h4>Datos de Autorizador</h4>
  <div class="form-group">
      <?= $form->field($model, 'autorizador_id')->textInput(['onchange' => 'js:consultaWSAut();','maxlength' => true,'style'=>'width:55%;'])->label('ID del Autorizador',['class'=>'col-sm-5','style'=>'padding-top:2%']); ?>
  </div>
  <div class="form-group">
    <?= $form->field($model, 'autorizador_nombre')->textInput(['maxlength' => true,'style'=>'width:55%;','readonly'=>true])->label('Nombre',['class'=>'col-sm-5','style'=>'padding-top:2%']);?>
  </div>
  <div class="form-group">
    <?= $form->field($model, 'autorizador_puesto')->textInput(['maxlength' => true,'style'=>'width:55%;','readonly'=>true])->label('Puesto del Autorizador',['class'=>'col-sm-5','style'=>'padding-top:%']) ?>

    </div>
  </div>
</div>


<div class="panel panel-default col-md-8"  style="float:right;">

  <div class="panel-body">

    <h4>Datos del usuario</h4>
         <div class="form-group">
             <?= $form->field($model, 'usuario_id')->textInput(['onchange' => 'js:consultaWSUsu();','maxlength' => true,'style'=>'width:75%;'])->label('ID del Usuario',['class'=>'col-sm-3','style'=>'padding-top:1%']); ?>
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
           <?= $form->field($model, 'correo')->textInput(['maxlength' => true,'style'=>'width:75%;'])->label('Correo',['class'=>'col-sm-3','style'=>'padding-top:1%']); ?>
         </div>
         <div class="form-group">
           <?= $form->field($model, 'comentario')->textInput(['maxlength' => true,'style'=>'width:75%;'])->label('Usuario Referencia',['class'=>'col-sm-3','style'=>'padding-top:1%']); ?>
         </div>
         <div class="form-group">
         <?= $form->field($model, 'comentario')->textarea(array('rows'=>2))->label('Comentarios'); ?>
       </div>

       <div class="form-group">
           <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
       </div>
       </div>
  </div>
<div class="panel panel-default col-md-4">



   <div class="panel-body">
      <h4>Datos del solicitante</h4>
          <div class="form-group">
              <?= $form->field($model, 'solicitante_id')->textInput(['onchange' => 'js:consultaWSSol();','maxlength' => true])->label('ID del Solicitante'); ?>
          </div>
         <div class="form-group">
              <?= $form->field($model, 'solicitante_nombre')->textInput(['maxlength' => true,'readonly'=>true])->label('Nombre del Solicitante'); ?>
         </div>
         <div class="form-group">
             <?= $form->field($model, 'solicitante_puesto')->textInput(['maxlength' => true,'readonly'=>true])->label('Puesto del Solicitante'); ?>
         </div>

   </div>
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
