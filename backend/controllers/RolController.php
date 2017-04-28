<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use backend\models\Rol;
use backend\models\Operacion;
use backend\models\search\RolSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use common\models\AccessHelpers;


/**
 * RoleController implementa las acciones CRUD para el modelo de rol.
 */
class RolController extends Controller
{
    /**
     * @inheritdoc
     */
     public function behaviors()
{
    return [
        'access' => [
            'class' => AccessControl::className(),
            'rules' => [
                 
              
                [
                    'actions' => [ ],
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
        ],
       
    ];
}
    /**
     * Lista todos los modelos de rol.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RolSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Muestra un solo modelo de rol.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Crea un nuevo modelo de rol. 
     * * De la creación es un éxito, el navegador será redirigido a la página de "view".
     * @return mixed
     */
    public function actionCreate($submit = false)
{
    $model = new Rol();
    $tipoOperaciones = Operacion::find()->all();

    if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $submit == false) {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ActiveForm::validate($model);
    }
 
    if ($model->load(Yii::$app->request->post())) {
        if ($model->save()) {
            $model->refresh();
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->redirect(['index']);
        } else {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }
        return $this->renderAjax('create', [
            'model' => $model,
            'tipoOperaciones' => $tipoOperaciones
        ]);
    
}

    /**
     * Actualiza un modelo de rol existente. 
     * * Si la actualización se realiza con éxito, el navegador será redirigido a la página de "view".
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
{
    $model = $this->findModel($id);
    $tipoOperaciones = Operacion::find()->all();
 
    $model->operaciones = \yii\helpers\ArrayHelper::getColumn(
        $model->getRolOperaciones()->asArray()->all(),
        'operacion_id'
    );
 
    if ($model->load(Yii::$app->request->post())) {
        if (!isset($_POST['Rol']['operaciones'])) {
            $model->operaciones = [];
        }
        if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
    } else {
        return $this->render('update', [
            'model' => $model,
            'tipoOperaciones' => $tipoOperaciones
        ]);
    }
}

    /**
     * Eliminar un modelo de rol existente. 
     * * Si la eliminación tiene éxito, el navegador será redirigido a la página 'índex'.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Encuentra el modelo Rol basado en su valor de clave principal.
      * Si no se encuentra el modelo, se lanzará una excepción HTTP 404.
     * @param integer $id
     * @return Rol the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rol::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
