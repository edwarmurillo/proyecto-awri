<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
	
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'correo_electronico')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'apellido')->textInput() ?>
   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
         <a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>
    </p>
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

