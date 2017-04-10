<?php
/*Sentencias sql para obtener el total de los:
Clientes
Proveedores
ordenes de trabajo
el comando el queryScalar me convierte las consultas a string.
*/
 $cl=Yii::$app->db->createCommand('select count(*) from `clientes`')->queryScalar(); 
 $pro=Yii::$app->db->createCommand('select count(*) from `proveedores`')->queryScalar(); 
 

$this->title = 'Bienvenido';
?>

 <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Clientes</span>
              <span class="info-box-number"><?php echo $cl ?><small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

     
		<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-wrench"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ordenes de trabajo</span>
              <span class="info-box-number">90<small>%</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-truck"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Proveedores</span>
              <span class="info-box-number"><?php echo $pro ?><small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
</div>

<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Ordenes de trabajo recientes</h3>
            </div>
            <div class="box-body">
         </div>

        </div>
        </div>
       </div>


