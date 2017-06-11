<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%credit_log}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $credit_type
 * @property integer $affect
 * @property string $title
 * @property string $description
 * @property integer $created_at
 */
class CreditLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%credit_log}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'updatedAtAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'credit_type', 'affect'], 'integer'],
            [['title', 'description'], 'string', 'max' => 255],
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
            'credit_type' => 'Credit Type',
            'affect' => 'Affect',
            'title' => 'Title',
            'description' => 'Description',
            'created_at' => 'Created At',
        ];
    }
}
