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

    public static function getBinary($id)
    {
        $baseUser = User::find()->where(['id' => $id])->joinWith('profile')->joinWith('network')->one();
        $users = [];
        $users[$baseUser->id] = [
            'base' => $baseUser,
            'dls' => self::getDownline($id, $type = 'placement')
        ];
        
        $level = [];
        $level[0][] = $baseUser;

        // Level 1
        foreach ($users[$baseUser->id]['dls'] as $user1) {
            $dls = self::getDownline($user1->id, $type = 'placement');
            $level[1][] = $user1;
            // Level 2
            foreach ($dls as $user2) {
                $dls1 = self::getDownline($user2->id, $type = 'placement');
                $level[2][] = $user2;
                // Level 3
                foreach ($dls1 as $user3) {
                    $level[3][] = $user3;
                }
            }
        }
         
        return $level;
    }

    /**
     * User placement for binary and sponsor for unilevel
     * @param  integer $id user id
     * @param  string $type binary or unilevel
     * @return Object   app\models\UserNetwork
     */
    public static function getDownline($id, $type = 'placement')
    {
        return User::find()->where([$type => $id])->joinWith('profile')->joinWith('network')->all();
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

    public function getUser()
    {
        return $this->hasOne(User::classname(), ['id' => 'user_id']);
    }
}