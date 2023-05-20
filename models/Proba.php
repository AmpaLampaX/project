<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proba".
 *
 * @property int $ad
 * @property int $bd
 * @property int $cd
 * @property int $md
 */
class Proba extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proba';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ad', 'bd', 'cd', 'md'], 'required'],
            [['ad', 'bd', 'cd', 'md'], 'integer'],
            [['ad'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ad' => 'Ad',
            'bd' => 'Bd',
            'cd' => 'Cd',
            'md' => 'Md',
        ];
    }
}
