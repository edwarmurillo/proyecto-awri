<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Proveedores */

$this->title = $model->nit;
$this->params['breadcrumbs'][] = ['label' => 'Proveedores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="proveedores-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->nit], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->nit], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
 
    <?= DetailView::widget([
      
        'model' => $model,
        'attributes' => [
            'razon_social',
            'nit',
            'direccion',
            'telefono',
            'ciudad',
            'nombre_contacto',
            'celular',
            'cargo',
            'correo_electronico',
            
        ],
    ]) ?>

</div>
