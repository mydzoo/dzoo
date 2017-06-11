<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use common\models\User;

/**
 * This is the model class for table "{{%circle_topic_collect}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $topic_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 */
class TopicCollect extends \yii\db\ActiveRecord
{
    public function init()
    {
        $this->on(self::EVENT_AFTER_INSERT, [$this, 'calculateTopicLikeNumber']);
        $this->on(self::EVENT_AFTER_INSERT, [$this, 'calculateUserPoint']);
        $this->on(self::EVENT_AFTER_INSERT, [$this, 'notifyTopicAuthor']);
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%circle_topic_collect}}';
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'user_id',
                'updatedByAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'default', 'value' => 1],
            [['user_id', 'topic_id', 'status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'topic_id' => 'Topic ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    public function getTopic()
    {
        return $this->hasOne(Topic::className(), ['id' => 'topic_id']); 
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']); 
    }

    /**
     * Triggerred by TopicCollect::EVENT_AFTER_INSERT
     */
    public function calculateTopicLikeNumber($event)
    {
        $this->topic->updateAttributes([
            'collects' => $this->topic->collects + 1,
        ]);
    }

    /**
     * Triggerred by TopicCollect::EVENT_AFTER_INSERT
     */
    public function calculateUserPoint($event)
    {
        $userData = $this->user->data;

        $userData->updateAttributes([
            'credits1' => $userData->credits1 + 1,
        ]);

        // 事件绑定，当积分变动时，写入积分日志
        $userData->on(
            UserData::EVENT_CREDIT_CHANGED,
            [$userData, 'logCredit'],
            $this->topic
        );

        // 触发积分变动事件
        $userData->trigger(UserData::EVENT_CREDIT_CHANGED);
    }

    /**
     * Triggerred by TopicCollect::EVENT_AFTER_INSERT
     */
    public function notifyTopicAuthor($event)
    {
        $notice = new Notice();

        // set message receiver
        $notice->user_id = $this->topic->user_id;
        $notice->content = '收藏了你的话题';

        if (!$notice->save()) {
            throw new \yii\db\Exception('Failed to insert notice.');
        }
    }
}
