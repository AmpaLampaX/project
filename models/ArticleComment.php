<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Article_comment".
 *
 * @property int $id
 * @property int $Article_id
 * @property int $user_id
 * @property string $comment
 * @property string $created_at
 *
 * @property Article $Article
 * @property Register $user
 */
class ArticleComment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Article_comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Article_id', 'user_id', 'comment'], 'required'],
            [['Article_id', 'user_id'], 'integer'],
            [['comment'], 'string'],
            [['created_at'], 'safe'],
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
            'comment' => 'Comment',
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
