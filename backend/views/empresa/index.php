<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\EmpresaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Datos de la empresa';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-body">

            <div class="empresa-index">

                <p>
                    <?= Html::a('Nueva Empresa', '#', [
                        'id' => 'activity-index-link',
                        'class' => 'btn btn-success',
                        'data-toggle' => 'modal',
                        'data-target' => '#modal',
                        'data-url' => Url::to(['crear']),
                        'data-pjax' => '0',
                        ]); ?>
                </p>
                <p>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    </p>                                 


                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                    //  'filterModel' => $searchModel,
                        'summary'=> '',

                        'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'nombre_empresa',
                        'nit',
                        'direccion',
                        'telefono',
                        'correo_electronico',
                        'iva',

                        

                        [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{update}{delete}',
                        'header' => '<p>Acciones</p>',
                        'buttons' => [
                        'update' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                                'id' => 'activity-index-link',
                                'title' => Yii::t('app', 'Update'),
                                'data-toggle' => 'modal',
                                'data-target' => '#modal',
                                'data-url' => Url::to(['update', 'id' => $model->nit]),
                                'data-pjax' => '0',
                                ]);
                        },
                        ]
                        ],
                        ],
                        ]); ?>

                      <center>
                          <?php echo Html::img('@web/archivos/LOGO HM.jpg') ?>
                      </center>  
                    </div>

                </div>
            </div>

        </div>
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