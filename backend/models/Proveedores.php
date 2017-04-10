<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "proveedores".
 *
 * @property string $razon_social
 * @property string $nit
 * @property string $direccion
 * @property string $telefono
 * @property string $ciudad
 * @property string $nombre_contacto
 * @property string $celular
 * @property string $cargo
 * @property string $email
 * @property string $pagina_web
 */
class Proveedores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proveedores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nit'], 'required'],
            [['razon_social', 'nit', 'direccion', 'telefono', 'ciudad', 'nombre_contacto', 'celular', 'cargo', 'correo_electronico', 'pagina_web'], 'string', 'max' => 255],
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
            'pagina_web' => 'Pagina Web',
        ];
    }
}
