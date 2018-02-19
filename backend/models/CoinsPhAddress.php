<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%coins_ph_address}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $tag
 * @property string $value
 * @property int $status
 * @property int $created_at
 */
class CoinsPhAddress extends \yii\db\ActiveRecord
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
        return '{{%coins_ph_address}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'status', 'created_at'], 'integer'],
            [['tag', 'value'], 'string', 'max' => 255],
            [['tag'], 'default', 'value' => 'primary'],
            ['user_id', 'default', 'value' => Yii::$app->user->id],
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
            'tag' => 'Tag',
            'value' => 'Update Coins PH Address',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
