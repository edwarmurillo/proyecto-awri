<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "empresa".
 *
 * @property string $nombre_empresa
 * @property string $nit
 * @property string $direccion
 * @property string $telefono
 * @property string $correo
 * @property string $iva(%)
 * @property string $simbolo_moneda
 * @property string $logo_url
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			
            [['nit', 'iva'], 'required'],
            [['iva'], 'integer'],
            [['nombre_empresa', 'nit', 'direccion', 'telefono', 'correo_electronico'], 'string', 'max' => 255],
            [['nit'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nombre_empresa' => 'Nombre Empresa',
            'nit' => 'Nit',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'correo_electronico' => 'Correo Electronico',
            'iva' => 'Iva',
            
            
        ];
    }
	
	
}
