<?php

namespace app\models;

use Yii;
use dektrium\user\models\Profile;

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

    public static function getBinary($id, $maxLevels = 3)
    {
        $user = User::find()
            ->joinWith('network')
            ->where([User::tableName() . '.id' => $id])
            ->one();
        
        $network[$user->id][0][0][0] = [ 
            'id'       => $user->id,
            'email'    => $user->email,
            'name'     => $user->profile->name,
            'username' => $user->username,
        ];

        for ($level=0; $level < 4 ; $level++) {

            if($level == 0)
            {
                $counter1 = 1;
            }
            else if($level == 1)
            {
                $counter1 = 2;
            }
            else if($level == 3)
            {
                $counter1 = 8;
            }
            else
            {
                $counter1 = $level * $level;
            }

            $makegroup = -1;

            for ($group=0; $group < $counter1; $group++) { 

                $prevgroup = $group;

                if ($level == 0) {
                    $upline = $network[$user->id][0][0][0]['id'];
                    $downline['left'] = self::getDownline($network[$user->id][0][0][0]['id'], 0);
                    $downline['right'] = self::getDownline($network[$user->id][0][0][0]['id'], 1);
                }

                for ($position=0; $position < 2; $position++) {
                    $makegroup = $makegroup + 1;

                    #Start Binary Data
                    if ($level != 0) {
                      $upline = $network[$user->id][$level][$prevgroup][$position]['id'];
                      $downline['left'] = self::getDownline($network[$user->id][$level][$prevgroup][$position]['id'], 0);
                      $downline['right'] = self::getDownline($network[$user->id][$level][$prevgroup][$position]['id'], 1);
                    }

                    $network[$user->id][$level + 1][$makegroup]['0'] = [
                      'id'        => null,
                      'placement' => $upline,
                    ];
                    $network[$user->id][$level + 1][$makegroup]['1'] = [
                      'id'        => null,
                      'placement' => $upline,
                    ];

                    foreach ($downline['left'] as $data) {
                      $network[$user->id][$level + 1][$makegroup]['0'] = [
                        'id'        => $data->id,
                        'email'     => $data->email,
                        'username'  => $data->username,
                        'name'      => $data->profile->name,
                        'placement' => $data->network->placement,
                      ];
                    }
                    foreach ($downline['right'] as $data) {
                      $network[$user->id][$level + 1][$makegroup]['1'] = [
                        'id'        => $data->id,
                        'email'     => $data->email,
                        'username'  => $data->username,
                        'name'      => $data->profile->name,
                        'placement' => $data->network->placement,
                      ];
                    }

                #END FOREACH
                }
            }
        }

        return $network;
    }

    /**
     * User placement for binary and sponsor for unilevel
     * @param  integer $id user id
     * @param  string $type binary("placement") or unilevel("sponsor")
     * @return Object   app\models\UserNetwork
     */
    public static function getDownline($id, $position, $type = 'placement')
    {
        return User::find()
            ->where([$type => $id, UserNetwork::tableName() . '.position' => $position])
            ->joinWith('network')
            ->all();
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