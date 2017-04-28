<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '¿Has olvidado tu contraseña?';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-request-password-reset">
   
    <p>Cambia tu contraseña en tres pasos sencillos. esto permite preservar la seguridad de tu cuenta</p>
    </br>
    <p>1. Completa tu direccion de correo electrónico a continuación.</p>
    <p>2. Te enviaremos un link provisional por correo electrónico.</p>
    <P>3. Usa el link para cambiar tu contraseña.</P>
        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form',]); ?>

                    <?= $form->field($model, 'correo_electronico')->textInput(['autofocus' => true]) ?>

                    <p>Escribe la direccion de correo que usabas para ingresar al sistema. te enviaremos
                       un link a esta direccion por correo electronico. </p>
                    <div class="form-group">
                        <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
       </div>
   
</div>
