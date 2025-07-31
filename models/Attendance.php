<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "attendance".
 *
 * @property int $id
 * @property int $student_id
 * @property string $date
 * @property string $status
 *
 * @property Students $student
 */
class Attendance extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const STATUS_PRESENT = 'Present';
    const STATUS_ABSENT = 'Absent';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'attendance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'date', 'status'], 'required'],
            [['student_id'], 'integer'],
            [['date'], 'safe'],
            [['status'], 'string'],
            ['status', 'in', 'range' => array_keys(self::optsStatus())],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::class, 'targetAttribute' => ['student_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'date' => 'Date',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::class, ['id' => 'student_id']);
    }
  

    /**
     * column status ENUM value labels
     * @return string[]
     */
    public static function optsStatus()
    {
        return [
            self::STATUS_PRESENT => 'present',
            self::STATUS_ABSENT => 'absent',
        ];
    }

    /**
     * @return string
     */
    public function displayStatus()
    {
        return self::optsStatus()[$this->status];
    }

    /**
     * @return bool
     */
    public function isStatusPresent()
    {
        return $this->status === self::STATUS_PRESENT;
    }

    public function setStatusToPresent()
    {
        $this->status = self::STATUS_PRESENT;
    }

    /**
     * @return bool
     */
    public function isStatusAbsent()
    {
        return $this->status === self::STATUS_ABSENT;
    }

    public function setStatusToAbsent()
    {
        $this->status = self::STATUS_ABSENT;
    }
    
}
