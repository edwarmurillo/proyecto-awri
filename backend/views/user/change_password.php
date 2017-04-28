<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;


$this->title = 'Modificar Clave';
?>


<?php $form = ActiveForm::begin(); ?>

<?= $form->field($user, 'clave_actual')->passwordInput() ?>

<?= $form->field($user, 'nueva_clave')->passwordInput() ?>

<?= $form->field($user, 'confirmar_clave')->passwordInput() ?>

<div class="form-group">
    
        <?= Html::submitButton('Aceptar',['class' => 'btn btn-primary']) ?>
        <a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>
    </div>
</div>
 </div>
<?php ActiveForm::end(); ?>