<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "{{%advertisement}}".
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property string $description
 * @property string $image_url
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 *
 * @property UserAdvertisement[] $userAdvertisements
 */
class Advertisement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%advertisement}}';
    }

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
    public function rules()
    {
        return [
            [['status', 'created_at', 'updated_at', 'created_by'], 'integer'],
            [['type', 'name', 'description', 'image_url', 'url'], 'string', 'max' => 255],
            ['type', 'default', 'value' => 'primary'],
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
            'type' => 'Type',
            'name' => 'Name',
            'description' => 'Description',
            'url' => 'Url',
            'image_url' => 'Image Url',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAdvertisements()
    {
        return $this->hasMany(UserAdvertisement::className(), ['ad_id' => 'id']);
    }
}
