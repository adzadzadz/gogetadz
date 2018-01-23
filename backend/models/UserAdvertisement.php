<?php

namespace app\models;

use Yii;
use dektrium\user\models\User;
/**
 * This is the model class for table "{{%user_advertisement}}".
 *
 * @property int $user_id
 * @property int $ad_id
 * @property int $status
 *
 * @property Advertisement $ad
 * @property User $user
 */
class UserAdvertisement extends \yii\db\ActiveRecord
{
    public $success;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_advertisement}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'ad_id'], 'required'],
            [['user_id', 'ad_id', 'status', 'success'], 'integer'],
            [['ad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Advertisement::className(), 'targetAttribute' => ['ad_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'ad_id' => 'Ad ID',
            'status' => 'Status',
            'success' => 'Success'
        ];
    }

    public function getAllDone()
    {
        $done = UserAdvertisement::findAll(['user_id' => Yii::$app->user->id]);
        $data = [];
        foreach ($done as $each) {
            $data[$each->ad_id] = $each;
        }
        return $data;
    }

    public function setDone()
    {
        if ($this->validate()) {

            $check = UserAdvertisement::findOne(['ad_id' => $this->ad_id, 'user_id' => $this->user_id]);

            if ($check) {
                return false;
            }

            $model = new UserAdvertisement;
            $model->ad_id = $this->ad_id;
            $model->user_id = $this->user_id;
            $model->status = $this->success ? 10 : 9;

            if ($model->save()) {
                return $model;
            }
        }
        return false;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAd()
    {
        return $this->hasOne(Advertisement::className(), ['id' => 'ad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
