<?php 

namespace app\models;

use yii\base\BaseObject;

class Gogetadz extends BaseObject
{
    public $currency;

    public $registrationEarnings;

    public $adIncome;

    public $currencySymbol = [
        'USD' => '$'
    ];

    public function getCurrencySymbol()
    {
        return $this->currencySymbol[$this->currency];
    }
}