<?php

namespace PayFast\Currency;

class Currency extends BaseCurrency
{
    public $target;
    public $exchangeRate;

    public function __construct($value)
    {
        parent::__construct($value);
    }
}