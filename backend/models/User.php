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
            [['correo_electronico', 'apellido', 'nombre'], 'string', 'max' => 255],
            [['correo_electronico'],'email'],
            
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
