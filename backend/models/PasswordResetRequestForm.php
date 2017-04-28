<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $correo_electronico;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['correo_electronico', 'trim'],
            ['correo_electronico', 'required'],
            ['correo_electronico', 'email'],
            ['correo_electronico', 'exist',
                'targetClass' => '\common\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'No hay usuario registrado con esta dirección de correo electrónico.'
            ],
        ];
    }

   
    public function sendEmail()
    {
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'correo_electronico' => $this->correo_electronico,
        ]);

        if (!$user) {
            return false;
        }
        
        if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
            if (!$user->save()) {
                return false;
            }
        }

        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
                ['user' => $user]
            )
            ->setFrom([$this->correo_electronico =>'software ordenes de trabajo'])
            ->setTo($this->correo_electronico)
            ->setSubject('Recuperacion de contraseña')
            ->send();
    }
}
