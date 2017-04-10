<?php

use yii\helpers\Html;
\Yii::$app->language = 'es';

/* @var $this yii\web\View */
/* @var $model backend\models\Rol */

$this->title = 'Crear Rol';
$this->params['breadcrumbs'][] = ['label' => 'Rols', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-create">

    <?= $this->render('_form', [
 
'model' => $model,
 
'tipoOperaciones' => $tipoOperaciones
 
]) ?>

</div>
