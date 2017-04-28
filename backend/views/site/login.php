<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;

Modal::begin([
            'header'=>'<h4 class="modal-title">Complete</h4>',
            'id' => 'modal',                        
            ]);
            echo "<div id=modalContent></div>";
Modal::end();

$this->title = 'Login';

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
    .position-relative{position: relative;}
    .display-block{display: inline-block;float: none;vertical-align: middle;}
    .box-flotante{position: absolute;top: 50%;left: 50%;-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%);}
    .btn-login{padding:0;font-size: 18px;/*border-radius: 5px !important;background:#00a65a ;border-color: #ffffff;*/ color: #00a65a;background: transparent;}
    .btn-login:before{opacity: 0;content: "";position: absolute;bottom: 0;left: 0;height: 1px; width: 0;background-color: #00a65a;-webkit-transition:all .3s linear;transition:all .3s linear;}
    .btn-login:hover:before{opacity: 1;content: "";position: absolute;bottom: 0;left: 0;height: 1px; width: 100%;background-color: #00a65a;-webkit-transition:all .3s linear;transition:all .3s linear;}
    .btn-login:hover,.btn-login:active,.btn-login:focus{color: #00a65a;-webkit-transition: all .3s linear;transition: all .3s linear;}
    .title-habitat{padding:0;font-size: 20px; color: #ffffff; }
    a.olvidar-contrasena{/*background:#00a65a ;*/color: #00a65a !important;margin-top: 10px;/*border: 1px solid #00a65a;border-radius: 5px !important;padding: 5px;*/font-size: 18px; color: #00a65a; }
    .olvidar-contrasena:before{opacity: 0;content: "";position: absolute;bottom: 0;left: 0;height: 1px; width: 0;background-color: #00a65a;-webkit-transition:all .3s linear;transition:all .3s linear;}
    .olvidar-contrasena:hover:before{opacity: 1;content: "";position: absolute;bottom: 0;left: 0;height: 1px; width: 100%;background-color: #00a65a;-webkit-transition:all .3s linear;transition:all .3s linear;}
    .caja-logueo{border: 1px solid #d2d2d2;}
    .caja-bot{padding: 5px 0px;}
    .form-control{font-size: 17px;}
    .form-control:focus{border-color: #00a65a;}
    .top-box{background-color: #00a65a;}
    .top-box {background-color: #00a65a;position: absolute;top: -50px;left: 50%;-webkit-transform: translate(-50%);transform: translate(-50%);width: 100%;border: 1px solid #00a65a;padding: 10px;}
    </style>
    
<div class="login-box-body">
    <!-- /.login-logo -->
    <meta content-type="text/html; charset=utf-8">
    <div class="col-md-3 col-xs-12 caja-logueo login-box-body box-flotante">
        <div class="top-box text-center">
            <p class="login-box-msg display-block title-habitat">Inicio de sesion</p>
        </div>
        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'correo_electronico', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Correo electronico')]) ?>

        <?= $form
            ->field($model, 'clave', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('Clave')]) ?>

        <div class="row text-center">
            <div class=" display-block text-center col-xs-4">
                <div class="position-relative display-block">
                    <?= Html::submitButton('Entrar', ['class' => 'btn btn-login  btn-block btn-flat', 'name' => 'login-button']) ?>
                </div>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>

        <!-- /.social-auth-links -->
        <div class="col-xs-12  text-center">
            <div class="caja-bot display-block position-relative">

                <a href="http://backend.habitat.com/index.php?r=user%2Frequest-password-reset" class="olvidar-contrasena" >Olvidé mi contraseña</a><br>
            </div>

        </div>
       
    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->

