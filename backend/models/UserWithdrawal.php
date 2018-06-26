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
     * Fetch the widthrawal requests performed by the user
     * @param string  $type    Can be ad_clicks, binary, unilevel
     * @param [type]  $user_id User ID
     * @return  Float
     */
    public static function getPrevRequests($type = "monoline", $user_id = null)
    {
        $user_id = $user_id != null ? $user_id : Yii::$app->user->id;

        $requests = self::findAll(['user_id' => $user_id, 'type' => $type]);

        $total = 0;
        foreach ($requests as $request) {
            $total = $total + $request->value;
        }

        return $total;
    }

    public function getProfile()
    {
        return $this->hasOne(Profile::classname(), ['user_id' => 'user_id']);
    }

    public function getCoins()
    {
        return $this->hasOne(CoinsPhAddress::classname(), ['user_id' => 'user_id']);   
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
