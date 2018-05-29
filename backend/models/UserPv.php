<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;

use Yii;

/**
 * This is the model class for table "{{%user_pv}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $value
 * @property int $status
 * @property int $created_at
 */
class UserPv extends \yii\db\ActiveRecord
{

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
        return '{{%user_pv}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'value'], 'required'],
            [['user_id', 'status', 'created_at'], 'integer'],
            [['value'], 'string', 'max' => 255],
            ['status', 'default', 'value' => 10]
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
            'value' => 'Value',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
