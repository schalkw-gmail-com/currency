<?php

namespace PayFast\Currency;

class BaseCurrency extends Amount
{
    public $base;

    public function __construct($value = '')
    {
        parent::__construct();
        $this->base = $value;
    }

    public function toFinance($value = null)
    {
        $valueToFormat = $this->value;
        if (!is_null($value)) {
            $valueToFormat = $value;
        }
        return number_format($valueToFormat, 2, ".", " ");
    }
}