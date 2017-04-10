<?php

namespace backend\models;

use Yii;


class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'correo_electronico', 'nombre', 'apellido'], 'required'],
            [['fecha_creacion'], 'safe'],
            [[ 'status'], 'integer'],
            [['correo_electronico', 'apellido', 'nombre'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'correo_electronico' => 'correo_electronico',
            'nombre' => 'Nombre',
            'apellido' => 'apellido',
            
        ];
    }
}
