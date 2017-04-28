<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;



$this->title = 'Gestion de usuarios';
$this->params['breadcrumbs'][] = "Gestion de usuarios";
?>

<div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
        
      </div>
      <div class="box-body">

        <div class="user-index">
           <p>
                <?= Html::a('Nuevo Usuario', '#', [
                    'id' => 'activity-index-link',
                    'class' => 'btn btn-success',
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'data-url' => Url::to(['signup']),
                    'data-pjax' => '0',
                ]); ?>
            </p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'summary' => '',
                    'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                                'nombre',
                                'apellido',
                                'correo_electronico',
                                'fecha_creacion',

                                ['class' => 'yii\grid\ActionColumn',
                                'template' => '{update}{delete}',
                                'header' => '<p>Acciones</p>',
                                'buttons' => [
                                'update' => function ($url, $model, $key) {
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                                        'id' => 'activity-index-link',
                                        'title' => Yii::t('app', 'Update'),
                                        'data-toggle' => 'modal',
                                        'data-target' => '#modal',
                                        'data-url' => Url::to(['update', 'id' => $model->id]),
                                        'data-pjax' => '0',
                                         
                                        ]);
                                     },
                                ]
                            ],
                        ],
                    ]); 
                ?>

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
