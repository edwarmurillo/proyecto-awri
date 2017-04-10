<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
\Yii::$app->language = 'es';
/* @var $this yii\web\View */
/* @var $model backend\models\Rol */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Rols', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-view">

    
    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
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
            'id',
            'nombre',
        ],
    ]) ?>
    <h2>Acciones Permitidas</h2>
 
<?php
 
foreach ($model->operacionesPermitidasList as $operacionPermitida) {
    echo $operacionPermitida['nombre'] . "                    ";
}
 
?>
</div>
