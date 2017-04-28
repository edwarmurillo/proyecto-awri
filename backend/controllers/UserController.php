<?php

namespace backend\controllers;

use Yii;
use backend\models\User;
use backend\models\search\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\SignupForm;
use yii\helpers\Html;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use yii\web\Response;
use yii\widgets\ActiveForm;
use backend\models\PasswordResetRequestForm;
use backend\models\ResetPasswordForm;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
  
		$searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$dataProvider->pagination->pageSize=3;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	/**
	
		
		*/
    /**
     * Displays a single User model.
     * @param string $id
     * @return mixed
     */
	 
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    
	 
     public function actionSignup($submit = false)
{
    $model = new SignupForm();
 
    if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $submit == false) {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ActiveForm::validate($model);
    }
 
    if ($model->load(Yii::$app->request->post())) {
        if ($user = $model->signup()) {
            
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->redirect(['index']);
        } else {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }
 
    return $this->renderAjax('signup', [
        'model' => $model,
    ]);
}
	

   
	 
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
        
        return $this->renderAjax('update', [
            'model' => $model,
            ]);
    }

	

    
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /*   
	public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                   
                    return $this->refresh();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }*/
	//Metodo que llama la vista para realizar el cambio de contraseña
	public function actionChange_password()
    {
        $user =  Yii::$app->user->identity;
        $loadedPost = $user->load(yii::$app->request->post());
        
        if($loadedPost && $user->validate()){
            
            $user->password = $user->nueva_clave;
            $user->save(false);
            yii::$app->session->setFlash('success','has cambiado tu Clave');
            return $this->redirect(['site/index']);
        }
        return $this->renderAjax("change_password", [// create view
        'user' =>$user,
        
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
     
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {             
                Yii::$app->session->setFlash('success', 'Revisa tu correo y sigue las instrucciones.');
                //return $this->goHome();
            } else {         
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }
        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
           // Yii::$app->session->setFlash('success', 'Nueva clave guardada');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
	
	
}
