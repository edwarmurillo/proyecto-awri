<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\EmpresaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresa-search">
	<div class="col-md-12">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'buscar') ?> 
    <?= Html::submitButton('buscar', ['class' => 'btn btn-primary']) ?>
    

    <?php ActiveForm::end(); ?>
    </div>
</div>
