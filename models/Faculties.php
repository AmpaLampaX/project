<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faculties".
 *
 * @property int $ID
 * @property string|null $HOME_UNIVERSITY
 * @property string|null $COUNTRY
 * @property string|null $UNIVERSITY_OF_OUTGOING_MOBILITY
 * @property string|null $ERASMUS_ID_CODE
 * @property string|null $CONTACT
 * @property string|null $FIELD_OF_STUDY
 * @property string|null $BACHELOR_PROGRAM
 * @property string|null $MASTER_PROGRAM
 * @property string|null $PhD
 * @property string|null $NUMBER_OF_STUDENTS
 * @property string|null $MOBILITY_DURATION
 * @property string|null $WINTER_DEADLINE
 * @property string|null $SUMMER_DEADLINE
 */
class Faculties extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faculties';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID'], 'required'],
            [['ID'], 'integer'],
            [['HOME_UNIVERSITY'], 'string', 'max' => 8],
            [['COUNTRY'], 'string', 'max' => 14],
            [['UNIVERSITY_OF_OUTGOING_MOBILITY'], 'string', 'max' => 139],
            [['ERASMUS_ID_CODE', 'MASTER_PROGRAM'], 'string', 'max' => 36],
            [['CONTACT'], 'string', 'max' => 281],
            [['FIELD_OF_STUDY'], 'string', 'max' => 305],
            [['BACHELOR_PROGRAM'], 'string', 'max' => 37],
            [['PhD'], 'string', 'max' => 47],
            [['NUMBER_OF_STUDENTS'], 'string', 'max' => 102],
            [['MOBILITY_DURATION'], 'string', 'max' => 120],
            [['WINTER_DEADLINE'], 'string', 'max' => 183],
            [['SUMMER_DEADLINE'], 'string', 'max' => 195],
            [['ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'HOME_UNIVERSITY' => 'Home University',
            'COUNTRY' => 'Country',
            'UNIVERSITY_OF_OUTGOING_MOBILITY' => 'University Of Outgoing Mobility',
            'ERASMUS_ID_CODE' => 'Erasmus Id Code',
            'CONTACT' => 'Contact',
            'FIELD_OF_STUDY' => 'Field Of Study',
            'BACHELOR_PROGRAM' => 'Bachelor Program',
            'MASTER_PROGRAM' => 'Master Program',
            'PhD' => 'Ph D',
            'NUMBER_OF_STUDENTS' => 'Number Of Students',
            'MOBILITY_DURATION' => 'Mobility Duration',
            'WINTER_DEADLINE' => 'Winter Deadline',
            'SUMMER_DEADLINE' => 'Summer Deadline',
        ];
    }
}
