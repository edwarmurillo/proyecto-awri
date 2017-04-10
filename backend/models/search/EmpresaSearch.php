<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Empresa;

/**
 * EmpresaSearch represents the model behind the search form about `backend\models\Empresa`.
 */
class EmpresaSearch extends Empresa
{
    /**
     * @inheritdoc
     */
    public $buscar;

    public function rules()
    {
        return [
            [['nombre_empresa', 'nit', 'direccion', 'telefono', 'correo_electronico','buscar'], 
             'safe'],
            [['iva'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Empresa::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->load($params) && !$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        

        $query->orFilterWhere(['like', 'nombre_empresa', $this->buscar])
            ->orFilterWhere(['like', 'nit', $this->buscar])
            ->orFilterWhere(['like', 'direccion', $this->buscar])
            ->orFilterWhere(['like', 'telefono', $this->buscar]);
            
            

        return $dataProvider;
    }
}
