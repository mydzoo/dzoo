<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%circle_topic}}".
 *
 * @property integer $id
 * @property integer $circle_id
 * @property integer $user_id
 * @property string $title
 * @property string $summary
 * @property string $keywords
 * @property string $description
 * @property integer $imgs
 * @property integer $views
 * @property integer $comments
 * @property integer $likes
 * @property integer $heats
 * @property integer $collects
 * @property integer $rewards
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 */
class Topic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%circle_topic}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['circle_id', 'user_id', 'imgs', 'views', 'comments', 'likes', 'heats', 'collects', 'rewards', 'created_at', 'updated_at', 'status'], 'integer'],
            [['title', 'summary', 'keywords', 'description'], 'string', 'max' => 255],
        ];
    }
    /**
     * get topic author
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']); 
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'circle_id' => 'Circle ID',
            'user_id' => '作者',
            'title' => 'Title',
            'summary' => 'Summary',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'imgs' => 'Imgs',
            'views' => 'Views',
            'comments' => 'Comments',
            'likes' => 'Likes',
            'heats' => 'Heats',
            'collects' => '收藏数',
            'rewards' => 'Rewards',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * Collect a topic
     */
    public function collect()
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $collect = new TopicCollect();
            $collect->topic_id = $this->id;

            if (!$collect->save()) {
                throw new \yii\db\Exception('Failed to insert collect.');
            }

            $transaction->commit();
            return true;
        } catch(\Exception $e) {
            $transaction->rollBack();
            throw $e;
        }
    }

    public function insertCollect($event)
    {
        Yii::$app->transaction->beginTransaction();
    }
}
