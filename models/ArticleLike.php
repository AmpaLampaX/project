<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Article_like".
 *
 * @property int $id
 * @property int $Article_id
 * @property int $user_id
 * @property string $created_at
 *
 * @property Article $Article
 * @property Register $user
 */
class ArticleLike extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Article_like';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Article_id', 'user_id'], 'required'],
            [['Article_id', 'user_id'], 'integer'],
            [['created_at'], 'safe'],
            [['Article_id', 'user_id'], 'unique', 'targetAttribute' => ['Article_id', 'user_id']],
            [['Article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::class, 'targetAttribute' => ['Article_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Register::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Article_id' => 'Article ID',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Article]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Article::class, ['id' => 'Article_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Register::class, ['id' => 'user_id']);
    }
}
