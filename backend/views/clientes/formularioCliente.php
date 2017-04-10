<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Proveedores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proveedores-form">
  <?php $form = ActiveForm::begin([
    /*Reglas para validar el formulario con ajax*/
    'id' => 'solicitante-form',
    'enableAjaxValidation' => true,
    'enableClientScript' => true,
    'enableClientValidation' => true,
    ]); ?> 

    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#empresa">Empresa</a></li>
      <li><a data-toggle="tab" href="#menu1">Ubicacion</a></li>
      <li><a data-toggle="tab" href="#menu2">Contacto</a></li>

    </ul>

    <div class="tab-content">
      <div id="empresa" class="tab-pane fade in active">
        <br>

        <?= $form->field($model, 'razon_social')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nit')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

        
      </div>
      <div id="menu1" class="tab-pane fade">
        <br>

        <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ciudad')->textInput(['maxlength' => true]) ?>  

      </div>

      <div id="menu2" class="tab-pane fade">
        <br>

        <?= $form->field($model, 'nombre_contacto')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'celular')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'cargo')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'correo_electronico')->textInput(['maxlength' => true]) ?>


      </div>
    </div> 

    <div class="form-group">
      <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
      <a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>
    </div>

    <?php ActiveForm::end(); ?>

    <?php

    $this->registerJs('
    // obtener la id del formulario y establecer el manejador de eventos
      $("form#solicitante-form").on("beforeSubmit", function(e) {
        var form = $(this);
        $.post(
        form.attr("action")+"&submit=true",
        form.serialize()
        )
        .done(function(result) {
          form.parent().html(result.message);
          $.pjax.reload({container:"#solicitante-grid"});
        });
        return false;
      }).on("submit", function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        return false;
      });
      ');
      ?>
    </div>





