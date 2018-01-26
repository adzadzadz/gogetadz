<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "{{%codes}}".
 *
 * @property int $id
 * @property string $type
 * @property string $code
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 */
class Codes extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%codes}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['status', 'created_at', 'updated_at', 'created_by'], 'integer'],
            [['type', 'code'], 'string', 'max' => 255],
            ['type', 'default', 'value' => 'registration'],
            ['status', 'default', 'value' => 10],
        ];
    }

    public static function generateCodes($count = 1, $length = 32)
    {
        for ($i=0; $i < $count; $i++) { 
            $codes = new Codes;
            $codes->code = Yii::$app->security->generateRandomString($length);
            $codes->save();
        }
        return true;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'code' => 'Code',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }
}
