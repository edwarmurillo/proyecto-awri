<?php 
namespace backend\controllers; 
use Yii; 
use yii\web\Controller; 
use common\models\AccessHelpers; 
//Esta clase esta diseñada para hacer un control sobre las ventanas que se acceden. 
class BaseController extends Controller { 
 
    public function beforeAction($action) { 
        if (!parent::beforeAction($action)) { 
             return false; 
        } 
        $operacion = str_replace("/", "-", Yii::$app->controller->route);
 
        $permitirSiempre = ['rol-index'];//Ventanas que tienen permisos para aparecer con cualquier usuario.
 
        if (in_array($operacion, $permitirSiempre)) {
            return true;
        }
 
        if (!AccessHelpers::getAcceso($operacion)) { //En caso de que no tenga permisos mandara una ventana diciendole que no tiene permisos para acceder a esa accion.
            echo $this->render('/user/nopermitido');
            return false;
        }
 
        return true;
    }
}