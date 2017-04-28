<?php

namespace backend\models;

use Yii;

/**
 * Modelo tabla proveedores contiene las siguientes variables.
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
     * Esta clase se usa para definir las reglas de las entradas de texto que tendra cada de una de las variables
     */
    public function rules()
    {
        return [
            [['nit','razon_social','direccion', 'telefono', 'ciudad',], 'required'],
            [['razon_social', 'nit', 'direccion', 'ciudad', 'nombre_contacto', 'celular', 'cargo', 'correo_electronico', 'pagina_web'], 'string', 'max' => 255],
            [['correo_electronico'],'email'],
            [['nit','correo_electronico'], 'unique'],
            [['telefono'],'integer','message'=>'solo valores numericos'],
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
