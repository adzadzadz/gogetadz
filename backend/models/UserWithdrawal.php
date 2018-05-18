<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%user_withdrawal}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property double $value
 * @property int $status
 * @property int $created_at
 */
class UserWithdrawal extends \yii\db\ActiveRecord
{
    const STATUS_INACTIVE = 5;
    const STATUS_PENDING = 6;
    const STATUS_SUCCESS = 10;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_withdrawal}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'value', 'status'], 'required'],
            [['user_id', 'status', 'created_at'], 'integer'],
            [['value'], 'number'],
            ['status', 'default', 'value' => 6],
            [['type'], 'string', 'max' => 255],
            ['type', 'default', 'value' => 'default']
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
            'type' => 'Type',
            'value' => 'Value',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
