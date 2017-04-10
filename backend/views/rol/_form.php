<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
\Yii::$app->language = 'es';
/* @var $this yii\web\View */
/* @var $model backend\models\Rol */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rol-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
     <?php
    $opciones = \yii\helpers\ArrayHelper::map($tipoOperaciones, 'id', 'nombre');
    echo $form->field($model, 'operaciones')->checkboxList($opciones, ['unselect'=>NULL]);
?>
   
    <?php ActiveForm::end(); ?>
    
   

</div>
