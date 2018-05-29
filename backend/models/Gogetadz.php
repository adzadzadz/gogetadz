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

    public $ulEarning = [
        'personal' => .10,
        1 => .05,
        2 => .05,
        3 => .05,
        4 => .04,
        5 => .04,
        6 => .04,
        7 => .03,
        8 => .03,
        9 => .03,
        10 => .03,
        11 => .03,
        12 => .03,
        13 => .03,
        14 => .03,
        15 => .03,
    ];

    public function getCurrencySymbol()
    {
        return $this->currencySymbol[$this->currency];
    }
}