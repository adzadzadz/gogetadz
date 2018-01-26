<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user_network}}".
 *
 * @property int $user_id
 * @property int $sponsor
 * @property int $placement
 * @property int $position
 * @property string $code
 */
class UserNetwork extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_network}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'sponsor', 'placement', 'position', 'code'], 'required'],
            [['user_id', 'sponsor', 'placement', 'position'], 'integer'],
            [['code'], 'string', 'max' => 255],
            [['user_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'sponsor' => 'Sponsor',
            'placement' => 'Placement',
            'position' => 'Position',
            'code' => 'Code',
            'codeStatus' => 'Code Status'
        ];
    }
}
