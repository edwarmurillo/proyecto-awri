<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Registro de usuario';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
  
              
              <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            
                <?= $form->field($model, 'nombre') ?>
                
                <?= $form->field($model, 'apellido') ?>  

                <?= $form->field($model, 'correo_electronico') ?>

                <?= $form->field($model, 'clave')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>
                </div>

            <?php ActiveForm::end(); ?>
            
            <!-- /.box-header -->
            <!-- form start -->
           
                  
    

</div>

