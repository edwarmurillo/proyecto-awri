<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Empresa */

$this->title = 'Editar datos de  ' . $model->nombre_empresa;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nit, 'url' => ['view', 'id' => $model->nit]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="empresa-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
