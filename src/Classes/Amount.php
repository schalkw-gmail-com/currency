<?php

namespace PayFast\Currency;

// @codeCoverageIgnoreStart
include_once 'src/Traits/Helpers.php';
// @codeCoverageIgnoreEnd

class Amount
{
    use \helpers;

    public $value;

    public function __construct($value = 0)
    {
        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function round()
    {
        return round($this->value, 2);
    }

    public function toCents($value = null): int
    {
        $valueToConvert = $this->value;
        if (!is_null($value)) {
            $valueToConvert = $value;
        }

        $convertedValue = (int)round($valueToConvert * 100, 0);

        return $convertedValue;
    }

    public function toAmount($value = null): float
    {
        $valueToConvert = $this->value;
        if (!is_null($value)) {
            $valueToConvert = $value;
        }

        $convertedValue = round($valueToConvert / 100, 2);
        return floatval($convertedValue);
    }
}