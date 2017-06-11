<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%user_data}}".
 *
 * @property integer $user_id
 * @property integer $letters
 * @property integer $notices
 * @property integer $topics
 * @property integer $comments
 * @property integer $follows
 * @property integer $fans
 * @property integer $credits1
 * @property integer $credits2
 * @property integer $credits3
 * @property integer $credits4
 * @property integer $credits5
 * @property integer $credits6
 * @property integer $login_count
 * @property integer $prev_login_time
 * @property integer $prev_login_ip
 * @property integer $last_login_time
 * @property integer $last_login_ip
 * @property integer $online_time
 * @property integer $created_at
 */
class UserData extends \yii\db\ActiveRecord
{
    // 用户积分发生变化事件
    const EVENT_CREDIT_CHANGED = 'credit-changed';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_data}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'letters', 'notices', 'topics', 'comments', 'follows', 'fans', 'credits1', 'credits2', 'credits3', 'credits4', 'credits5', 'credits6', 'login_count', 'prev_login_time', 'prev_login_ip', 'last_login_time', 'last_login_ip', 'online_time', 'created_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'letters' => 'Letters',
            'notices' => 'Notices',
            'topics' => 'Topics',
            'comments' => 'Comments',
            'follows' => 'Follows',
            'fans' => 'Fans',
            'credits1' => '积分',
            'credits2' => 'Credits2',
            'credits3' => 'Credits3',
            'credits4' => 'Credits4',
            'credits5' => 'Credits5',
            'credits6' => 'Credits6',
            'login_count' => 'Login Count',
            'prev_login_time' => 'Prev Login Time',
            'prev_login_ip' => 'Prev Login Ip',
            'last_login_time' => 'Last Login Time',
            'last_login_ip' => 'Last Login Ip',
            'online_time' => 'Online Time',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Triggerred by UserData::EVENT_CREDIT_CHANGED
     */
    public function logCredit($event)
    {
        $topic = $event->data;

        $log = new CreditLog();

        $log->user_id = $topic->user_id;

        $who = Yii::$app->user->identity->username;
        $log->title = $who . "收藏了{$topic->author->username}的帖子";

        if (!$log->save()) {
            throw new \yii\db\Exception('Failed to insert log.');
        }
    }
}
