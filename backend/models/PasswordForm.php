<?php

namespace backend\models;
    
    use Yii;
    use yii\base\Model;
    use app\models\Login;
    
    
    class PasswordForm extends Model{
        public $oldpass;
        public $newpass;
        public $repeatnewpass;
        
        public function rules(){
            return [
                [['oldpass','newpass','repeatnewpass'],'required'],
                ['oldpass','findPasswords'],
                ['repeatnewpass','compare','compareAttribute'=>'newpass'],
            ];
        }
        
         public function findPasswords($attribute, $params){
            $user = Login::find()->where([
                'correo_electronico'=>Yii::$app->user->identity->correo_electronico
            ])->one();
            $password = $user->password;
            if($password!=$this->oldpass)
                $this->addError($attribute,'Contraseña vieja incorrecta');
        }
        
        public function attributeLabels(){
            return [
                'oldpass'=>'Clave Actual',
                'newpass'=>'Nueva Clave',
                'repeatnewpass'=>'Confirmar Clave',
            ];
        }
    }





