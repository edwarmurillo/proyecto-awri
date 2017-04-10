<?php

namespace backend\models;

use Yii;


class Clientes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nit'], 'required'],
            [['razon_social', 'nit', 'direccion', 'telefono', 'ciudad', 'nombre_contacto', 'celular', 'cargo', 'correo_electronico'], 'string', 'max' => 255],
            [['nit'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'razon_social' => 'Razon Social',
            'nit' => 'Nit',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'ciudad' => 'Ciudad',
            'nombre_contacto' => 'Nombre Contacto',
            'celular' => 'Celular',
            'cargo' => 'Cargo',
            'correo_electronico' => 'Correo Electronico',
           
        ];
    }
}
