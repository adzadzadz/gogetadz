<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\models;

use Yii;
use dektrium\user\traits\ModuleTrait;
use yii\base\Model;

/**
 * Registration form collects user input on registration process, validates it and creates new User model.
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class RegistrationForm extends Model
{
    use ModuleTrait;
    /**
     * @var string User email address
     */
    public $email;

    /**
     * @var string Username
     */
    public $username;

    /**
     * @var string Password
     */
    public $password;

    public $sponsor;
    public $placement;
    public $position;
    public $code;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $user = $this->module->modelMap['User'];

        return [
            [['sponsor', 'placement', 'position'], 'integer'],
            ['code', 'string', 'min' => 12, 'max' => 255],
            // ['code', 'exist', 'targetClass' => Codes::classname()],

            // username rules
            'usernameTrim'     => ['username', 'trim'],
            'usernameLength'   => ['username', 'string', 'min' => 3, 'max' => 255],
            'usernamePattern'  => ['username', 'match', 'pattern' => $user::$usernameRegexp],
            'usernameRequired' => ['username', 'required'],
            'usernameUnique'   => [
                'username',
                'unique',
                'targetClass' => $user,
                'message' => Yii::t('user', 'This username has already been taken')
            ],
            // email rules
            'emailTrim'     => ['email', 'trim'],
            'emailRequired' => ['email', 'required'],
            'emailPattern'  => ['email', 'email'],
            'emailUnique'   => [
                'email',
                'unique',
                'targetClass' => $user,
                'message' => Yii::t('user', 'This email address has already been taken')
            ],
            // password rules
            'passwordRequired' => ['password', 'required', 'skipOnEmpty' => $this->module->enableGeneratingPassword],
            'passwordLength'   => ['password', 'string', 'min' => 6, 'max' => 72],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email'    => Yii::t('user', 'Email'),
            'username' => Yii::t('user', 'Username'),
            'password' => Yii::t('user', 'Password'),

            'sponsor'      => \Yii::t('user', 'Direct Sponsor'),
            'placement'      => \Yii::t('user', 'Placement'),
            'position'      => \Yii::t('user', 'Position'),
            'code'      => \Yii::t('user', 'Code'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function formName()
    {
        return 'register-form';
    }

    /**
     * Registers a new user account. If registration was successful it will set flash message.
     *
     * @return bool
     */
    public function register()
    {
        if (!$this->validate()) {
            return false;
        }

        // Verifying code
        $checkCode = Codes::findOne(['code' => $this->code]);
        if ($this->username !== 'admin') {
            if (!$checkCode || $checkCode->status != 10) {
                Yii::$app->session->setFlash(
                    'danger',
                    Yii::t(
                        'user',
                        'Your code is invalid. Contact the administrators.'
                    )
                );
                return false;
            }    
        }

        // Verifying Position slot
        $checkSlot = UserNetwork::findOne(['placement' => $this->placement, 'position' => $this->position]);
        if ($checkSlot !== null) {
            Yii::$app->session->setFlash(
                'danger',
                Yii::t(
                    'user',
                    'The position you selected is already taken. Please double check your tree.'
                )
            );
            return false;
        }
        
        /** @var User $user */
        $user = Yii::createObject(User::className());
        $user->setScenario('register');
        $this->loadAttributes($user);
        
        if (!$user->register()) {
            return false;
        }

        Yii::$app->session->setFlash(
            'success',
            Yii::t(
                'user',
                'Your account has been created and a message with further instructions has been sent to your email'
            )
        );

        return true;
    }

    /**
     * Loads attributes to the user model. You should override this method if you are going to add new fields to the
     * registration form. You can read more in special guide.
     *
     * By default this method set all attributes of this model to the attributes of User model, so you should properly
     * configure safe attributes of your User model.
     *
     * @param User $user
     */
    protected function loadAttributes(User $user)
    {
        $user->setAttributes($this->attributes);
    }
}
