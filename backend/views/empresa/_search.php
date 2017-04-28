<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\EmpresaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresa-search">
	<div class="col-md-3">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    
    <?= Html::submitButton('buscar', ['class' => 'btn btn-primary']) ?>
    <?= $form->field($model, 'buscar') ?> 
      
</div>
    <?php ActiveForm::end(); ?>
    </div>
</div>
