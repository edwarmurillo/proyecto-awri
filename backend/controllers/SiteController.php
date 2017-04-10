<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\FormUpload;
use yii\web\UploadedFile;
use common\models\AccessHelpers;

/**
 * Site controller
 */
class SiteController extends Controller
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
                        'actions' => ['login', 'error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
			/*
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],*/
        ];
    }

    
    
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->gohome();
    }
	
	public function actionUpload()
	{
	  
	  $model = new FormUpload;
	  $msg = null;
	  
	  if ($model->load(Yii::$app->request->post()))
	  {
	   $model->file = UploadedFile::getInstances($model, 'file');

	   if ($model->file && $model->validate()) {
		foreach ($model->file as $file) {
		 $file->saveAs('archivos/' . $file->baseName . '.' . $file->extension);
		 $msg = "<p><strong class='label label-info'>Enhorabuena, subida realizada con éxito</strong></p>";
		}
	   }
	  }
	  return $this->render("upload", ["model" => $model, "msg" => $msg]);
	}
}
