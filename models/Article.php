<?php
namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Html;

/**
 * This is the model class for table "Article".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $body
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property string|null $created_by
 * @property int $university_id
 *
 * @property Register $createdBy
 */
class Article extends \yii\db\ActiveRecord
{
    public $slugs; 

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }
    
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => BlameableBehavior::class,
                'updatedByAttribute' => false
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'body'], 'required'],
            [['body'], 'string'],
            [['created_at', 'updated_at', 'university_id'], 'integer'],
            [['title', 'slug'], 'string', 'max' => 1024],
            [['created_by'], 'string', 'max' => 20],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Register::class, 'targetAttribute' => ['created_by' => 'id']],
            [['slugs'], 'each', 'rule' => ['string']], // validation for multiple slugs
            ['slugs', 'required', 'when' => function($model) {
                return empty($model->slug);
            }, 'whenClient' => "function (attribute, value) {
                return $('#article-slug').val() === '';
            }"]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'slugs' => 'Slugs',
            'body' => 'Body',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'university_id' => 'University ID',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Register::class, ['id' => 'created_by']);
    }

    public function getEncodedBody()
    {
        return Html::encode($this->body);
    }
    
    public function getLikes()
    {
        return $this->hasMany(ArticleLike::class, ['article_id' => 'id']);
    }

    public function getLikesCount()
    {
        return $this->getLikes()->count();
    }

    public function hasUserLiked()
    {
        return ArticleLike::find()->where(['user_id' => Yii::$app->user->id, 'article_id' => $this->id])->exists();
    }

    public function getComments()
    {
        return ArticleComment::find()->where(['article_id' => $this->id])->all();
    }

    public function getCommentsCount()
    {
        return $this->hasMany(ArticleComment::class, ['article_id' => 'id'])->count();
    }
}
