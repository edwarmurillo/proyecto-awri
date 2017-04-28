<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\RolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gestion de roles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       <?= Html::a('Nuevo Rol', '#', [
            'id' => 'activity-index-link',
            'class' => 'btn btn-success',
            'data-toggle' => 'modal',
            'data-target' => '#modal',
            'data-url' => Url::to(['create']),
            'data-pjax' => '0',
            ]); ?>

    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<?php
    
    $this->registerJs(
        "$(document).on('click', '#activity-index-link', (function() {
            $.get(
            $(this).data('url'),
            function (data) {
                $('.modal-body').html(data);
                $('#modal').modal();
            }
            );
        }));"
        ); ?>

    <?php
    Modal::begin([
        'id' => 'modal',
        'header' => '<h4 class="modal-title">Complete</h4>',
 //   'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>',
        ]);

    echo "<div class='well'></div>";

    Modal::end();
    ?>