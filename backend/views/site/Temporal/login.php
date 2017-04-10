<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */


$this->title = 'Sign In';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>
<style>
.display-block{display: inline-block;float: none;vertical-align: middle;}
.box-flotante{position: absolute;top: 50%;left: 50%;-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%);}
.btn-login{background:#b0c921 ;border-color: #ffffff; color: #ffffff;margin: 10px 0px;}
.btn-login:hover{background:#ffffff ;border-color: #b0c921; color: #b0c921;-webkit-transition: all .3s linear;transition: all .3s linear;}
.title-habitat{font-size: 18px; color: #b0c921; }
a.olvidar-contrasena{font-size: 16px; color: #b0c921; }
.olvidar-contrasena:hover{font-size: 16px; color: #cccccc; }
</style>
<div class="login-box">
    <!-- /.login-logo -->
    <div class="col-md-3 col-xs-12 login-box-body box-flotante">
        <p class="login-box-msg title-habitat">Habitat Modular</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'correo_electronico', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('correo')]) ?>

        <?= $form
            ->field($model, 'clave', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('Clave')]) ?>

        <div class="row text-center">
            <div class=" display-block text-center col-xs-4">
                <?= Html::submitButton('Ingresar', ['class' => 'btn btn-login btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>

        <!-- /.social-auth-links -->
        <div class="col-xs-12 text-center">
            <a href="#" class="olvidar-contrasena">Olvidé mi contraseña</a><br>
        </div>
    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
