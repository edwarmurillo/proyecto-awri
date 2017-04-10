<?php

namespace backend\controllers;

use Yii;
use backend\models\Operacion;
use backend\models\search\OperacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OperacionController implementa las acciones CRUD para el modelo Operacion.
 */
class OperacionController extends Controller
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
     * Enumera todos los modelos de Operación.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OperacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Muestra un solo modelo Operacion.
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
     *Crea un nuevo modelo Operacion.
      * Si la creación tiene éxito, el navegador será redirigido a la página de 'view'.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Operacion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Actualiza un modelo de Operación existente.
      * Si la actualización se realiza con éxito, el navegador será redirigido a la página de "view".
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Elimina un modelo de Operación existente.
      * Si la eliminación tiene éxito, el navegador será redirigido a la página 'índex'.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Encuentra el modelo Operacion basado en su valor de clave principal.
      * Si no se encuentra el modelo, se lanzará una excepción HTTP 404.
     * @param integer $id
     * @return Operacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Operacion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
