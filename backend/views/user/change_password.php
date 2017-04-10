<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Modificar Clave';
?>

 <div class="col-lg-5">
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($user, 'claveActual')->passwordInput() ?>

<?= $form->field($user, 'nuevaClave')->passwordInput() ?>

<?= $form->field($user, 'confirmarClave')->passwordInput() ?>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
        <?= Html::submitButton('Aceptar',['class' => 'btn btn-primary']) ?>
    </div>
</div>
 </div>
<?php ActiveForm::end(); ?>