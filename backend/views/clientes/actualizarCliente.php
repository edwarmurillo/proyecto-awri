<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Proveedores */

//$this->title = 'Update Proveedores: ' . $model->nit;
//$this->params['breadcrumbs'][] = ['label' => 'Proveedores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nit, 'url' => ['view', 'id' => $model->nit]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="proveedores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('formularioCliente', [
        'model' => $model,
    ]) ?>

</div>
