<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['user/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Hola <?= Html::encode($user->correo_electronico) ?>,</p>

    <p>Hacer click en el siguiente enlace para restaurar su contraseña:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
    
</div>
