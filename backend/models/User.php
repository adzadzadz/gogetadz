<?php 

namespace app\models;

use dektrium\user\models\User as BaseUser;
use dektrium\user\models\Token;
use yii\helpers\ArrayHelper;

class User extends BaseUser
{
  public $sponsor;
  public $placement;
  public $position;
  public $code;

  /** @inheritdoc */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        return ArrayHelper::merge($scenarios, [
            'register' => ['username', 'email', 'password', 'sponsor', 'placement', 'position', 'code'],
            'connect'  => ['username', 'email'],
            'create'   => ['username', 'email', 'password'],
            'update'   => ['username', 'email', 'password'],
            'settings' => ['username', 'email', 'password'],
        ]);
    }

  /** @inheritdoc */
    public function rules()
    {
        return [
            [['sponsor', 'placement', 'position'], 'integer'],
            ['code', 'string', 'min' => 12, 'max' => 255],

            // username rules
            'usernameTrim'     => ['username', 'trim'],
            'usernameRequired' => ['username', 'required', 'on' => ['register', 'create', 'connect', 'update']],
            'usernameMatch'    => ['username', 'match', 'pattern' => static::$usernameRegexp],
            'usernameLength'   => ['username', 'string', 'min' => 3, 'max' => 255],
            'usernameUnique'   => [
                'username',
                'unique',
                'message' => \Yii::t('user', 'This username has already been taken')
            ],

            // email rules
            'emailTrim'     => ['email', 'trim'],
            'emailRequired' => ['email', 'required', 'on' => ['register', 'connect', 'create', 'update']],
            'emailPattern'  => ['email', 'email'],
            'emailLength'   => ['email', 'string', 'max' => 255],
            'emailUnique'   => [
                'email',
                'unique',
                'message' => \Yii::t('user', 'This email address has already been taken')
            ],

            // password rules
            'passwordRequired' => ['password', 'required', 'on' => ['register']],
            'passwordLength'   => ['password', 'string', 'min' => 6, 'max' => 72, 'on' => ['register', 'create']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username'          => \Yii::t('user', 'Username'),
            'email'             => \Yii::t('user', 'Email'),
            'registration_ip'   => \Yii::t('user', 'Registration ip'),
            'unconfirmed_email' => \Yii::t('user', 'New email'),
            'password'          => \Yii::t('user', 'Password'),
            'created_at'        => \Yii::t('user', 'Registration time'),
            'last_login_at'     => \Yii::t('user', 'Last login'),
            'confirmed_at'      => \Yii::t('user', 'Confirmation time'),

            'sponsor'      => \Yii::t('user', 'Sponsor'),
            'placement'      => \Yii::t('user', 'Placement'),
            'position'      => \Yii::t('user', 'Position'),
            'code'      => \Yii::t('user', 'Code'),
        ];
    }

    /**
     * This method is used to register new user account. If Module::enableConfirmation is set true, this method
     * will generate new confirmation token and use mailer to send it to the user.
     *
     * @return bool
     */
    public function register()
    {
        if ($this->getIsNewRecord() == false) {
            throw new \RuntimeException('Calling "' . __CLASS__ . '::' . __METHOD__ . '" on existing user');
        }

        $transaction = $this->getDb()->beginTransaction();

        try {
            $this->confirmed_at = $this->module->enableConfirmation ? null : time();
            $this->password     = $this->module->enableGeneratingPassword ? Password::generate(8) : $this->password;

            $this->trigger(self::BEFORE_REGISTER);

            if ($this->save()) {
                $network = new UserNetwork;
                $network->user_id = $this->id;
                $network->sponsor = $this->sponsor;
                $network->placement = $this->placement;
                $network->position = $this->position;
                $network->code = $this->code;
                if ($network->save()) {
                    if ($this->username !== 'admin') {
                        $checkCode = Codes::findOne(['code' => $this->code]);
                        $checkCode->status = 0;
                        $checkCode->save();
                    }
                } else {
                    $transaction->rollBack();
                    return false;
                }
             } else {
                $transaction->rollBack();
                return false;
            }

            if ($this->module->enableConfirmation) {
                /** @var Token $token */
                $token = \Yii::createObject(['class' => Token::className(), 'type' => Token::TYPE_CONFIRMATION]);
                $token->link('user', $this);
            }

            $this->mailer->sendWelcomeMessage($this, isset($token) ? $token : null);
            $this->trigger(self::AFTER_REGISTER);

            $transaction->commit();

            return true;
        } catch (\Exception $e) {
            $transaction->rollBack();
            \Yii::warning($e->getMessage());
            throw $e;
        }
    }

    public function getNetwork()
    {
        return $this->hasOne(UserNetwork::classname(), ['user_id' => 'id']);
    }

    public function getProfile()
    {
        return $this->hasOne(Profile::classname(), ['user_id' => 'id']);
    }

}