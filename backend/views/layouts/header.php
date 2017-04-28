<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;


                                Modal::begin([
                                   'header'=>'<h4 class="modal-title">Complete</h4>',
                                    'id' => 'modal',
                                   
                                ]);

                                echo "<div id=modalContent></div>";

                                Modal::end();
                            
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . 'Habitat Modular soft', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                              
                
                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                        <span class="hidden-xs">Alexander Pierce</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle"
                                 alt="User Image"/>

                            <p>
                            
                                Alexander Pierce - Web Developer
                                <small>Administrador</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                            

                               <?= Html::button(
                                    'Cambiar Clave',
                                    ['value'=>Url::to('index.php?r=user%2Fchange_password'),'class' =>'btn btn-default', 'id'=>'modalButton']);
                                    
                                ?>
                            </div>

                            <div class="pull-right">
                                <?= Html::a(
                                    'Salir',
                                    ['site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default ']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                
        </div>
    </nav>
</header>
