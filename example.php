<?php

namespace PayFast\Currency;

include_once 'src/Classes/Amount.php';
include_once 'src/Classes/BaseCurrency.php';
include_once 'src/Classes/Currency.php';

include_once 'src/Traits/Helpers.php';

class example extends Currency
{
    use \helpers;

    public function __construct($value = null)
    {
        parent::__construct($value);
        $this->debug('hallo world, Im a currency instance');
        $this->doThings();
    }

    public function doThings(){
        $this->debug('My current value = '.$this->value);

        $this->debug('Running the AMOUNT class (every things starts here) :');
        $this->debug('I can round a value = '.$this->round(123.5665584));
        $this->debug('I can convert a value of 123.56 to cents = '.$this->toCents(123.56));
        $this->debug('And 12356 back to a proper value = '.$this->toAmount(12356));

        $this->debug('Running the BASE CURRENCY class (this extends the amount class):');
        $this->debug('My default base currency is = '.$this->base);
        $this->debug('I can format 98765 financially as well = '.$this->toFinance(98765));
    }
}

$currency = new example(1234.56);




