<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Attendance;

/**
 * AttendanceSearch represents the model behind the search form of `app\models\Attendance`.
 */
class AttendanceSearch extends Attendance
{
    /**
     * {@inheritdoc}
     */
    public $studentName;

    public function rules()
    {
        return [
            [['id', 'student_id'], 'integer'],
            [['date', 'status'], 'safe'],
            [['studentName'], 'safe'],

        ];
    }

    /**
     * {@inheritdoc}
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Attendance::find();
         $query->joinWith('student'); 
        // add conditions that should always apply here
$dataProvider->sort->attributes['studentName'] = [
    'asc' => ['student.name' => SORT_ASC],
    'desc' => ['student.name' => SORT_DESC],
];

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'student_id' => $this->student_id,
            'date' => $this->date,
        ]);

        // $query->andFilterWhere(['like', 'status', $this->status]);
             $query->andFilterWhere(['like', 'student.name', $this->studentName]);
        return $dataProvider;
    }
}
