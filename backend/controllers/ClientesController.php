<?php

namespace backend\controllers;

use Yii;
use backend\models\Clientes;
use backend\models\search\ClientesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * ProveedoresController implementa las acciones CRUD para el modelo Proveedores.
 */
class ClientesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
{
   return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
}

    /**
     * Enumera todos los modelos Proveedores.
     * @return mixed
     */
   public function actionIndex()
    {
        $searchModel = new ClientesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Muestra un modelo Proveedores único.
     * @param integer $idproveedores
     * @param string $nit
     * @return mixed
     */
    public function actionView($id)
    {
        
        return $this->render('ver_datos_cliente', [
            'model' => $this->findModel($id),

        ]);
    }

    /**
     * Crea un nuevo modelo Proveedores.
      * Si la creación tiene éxito, el navegador será redirigido a la página de 'view'.
     * @return mixed
     */
    /*
    public function actionCreate()
    {
        $model = new Proveedores();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['ver_datos_pro', 'id' => $model->nit]);
        } else {
            return $this->render('crearPro', [
                'model' => $model,
            ]);
        }
    }*/

    public function actionCrear($submit = false)
{
    $model = new Clientes();
 
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
 
    return $this->renderAjax('crearCliente', [
        'model' => $model,
    ]);
}

    /**
     * Actualiza un modelo Proveedores existente.
      * Si la actualización se realiza con éxito, el navegador será redirigido a la página de "view".
     * @param integer $idproveedores
     * @param string $nit
     * @return mixed
     */
    /*
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['ver_datos_pro', 'id' => $model->nit]);
        } else {
            return $this->render('actualizarPro', [
                'model' => $model,
            ]);
        }
    }*/

    public function actionUpdate($id, $submit = false)
    {
        $model = $this->findModel($id);
        
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
        
        return $this->renderAjax('actualizarCliente', [
            'model' => $model,
            ]);
    }

    /**
     * Elimina un modelo Proveedores existente.
      * Si la eliminación tiene éxito, el navegador será redirigido a la página 'índex'.
     * @param integer $idproveedores
     * @param string $nit
     * @return mixed
     */
     public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Encuentra el modelo Proveedores basado en su valor de clave principal.
      * Si no se encuentra el modelo, se lanzará una excepción HTTP 404.
     * @param integer $idproveedores
     * @param string $nit
     * @return Proveedores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
   protected function findModel($id)
    {
        if (($model = Clientes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
