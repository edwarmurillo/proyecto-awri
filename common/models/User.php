<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\db\Expression;
use backend\models\Rol;


class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
	
	public $clave_actual;
    public $nueva_clave;
    public $confirmar_clave;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['fecha_creacion'],
                  
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        //pendiente modificar las reglas  para el cambio de contraseña.
        
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            /*
            [['nueva_clave','clave_actual','confirmar_clave'],'required'],
            [['clave_actual'],'validateCurrentPassword'],
            [['nueva_clave','confirmar_clave'],'string','min'=>6],
            [['nueva_clave','confirmar_clave'],'filter','filter' => 'trim'],
            [['confirmar_clave'],'compare','compareAttribute' => 'nueva_clave', 'message' => 'la clave no coincide'],*/
			
        ];
		
		
    }
	
    public function validateCurrentPassword()
    {
    if (!$this->verifyPassword($this->clave_actual)){
        $this->addError("clave_actual","Clave Actual incorrecta"); 
        }      
    }

    public function verifyPassword($clave)
    {
        $dbpassword = static::findOne(['correo_electronico'=> yii::$app->user->identity->correo_electronico, 'status'=>self::STATUS_ACTIVE])->password_hash;
        return yii::$app->security->validatePassword($clave, $dbpassword);
    }
	
	
	
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    
    public static function findByCorreo($correo_electronico)
    {
        return static::findOne(['correo_electronico' => $correo_electronico, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($clave)
    {
        return Yii::$app->security->validatePassword($clave, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($clave)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($clave);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function getRol()
    {
            return $this->hasOne(Rol::className(), ['id' => 'rol_id']);
    }

    public static function roleInArray($arr_role)
    {
    return in_array(Yii::$app->user->identity->role, $arr_role);
    }
    public static function isActive()
    {
    return Yii::$app->user->identity->status == self::STATUS_ACTIVE;
    }
}
