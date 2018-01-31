<?php 

namespace app\models;

use yii\base\Object;

class Gogetadz extends Object
{
    public $currency;

    public $adIncome;

    public $currencySymbol = [
        'USD' => '$'
    ];

    public function getCurrencySymbol()
    {
        return $this->currencySymbol[$this->currency];
    }
}