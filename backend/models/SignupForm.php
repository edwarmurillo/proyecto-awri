<?php
namespace backend\models;

use yii\base\Model;
use common\models\User;
use yii\widgets\ActiveForm;

/**
 * Signup form
 */
class SignupForm extends Model
{
   // public $username;
    public $correo_electronico;
    public $clave;
	public $nombre;
	public $apellido;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			['nombre', 'trim'],
            ['nombre', 'required'],
            ['nombre', 'string', 'max' => 255],

            ['apellido', 'trim'],
            ['apellido', 'required'],
            ['apellido', 'string', 'max' => 255],
			
            ['correo_electronico', 'trim'],
            ['correo_electronico', 'required'],
            ['correo_electronico', 'email'],
            ['correo_electronico', 'string', 'max' => 255],
            ['correo_electronico', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['clave', 'required'],
            ['clave', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
      //  $user->username = $this->username;
        $user->correo_electronico = $this->correo_electronico;
		$user->nombre = $this->nombre;
		$user->apellido = $this->apellido;
        $user->setPassword($this->clave);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
