<?php

namespace PayFast\Currency;

use PHPUnit\Framework\TestCase as TestCaseAlias;

require_once dirname(dirname(dirname(__FILE__))) . '/src/Traits/Helpers.php';

/**
 * Class --CurrencyTest
 *
 * @package Currency
 *
 * @coversDefaultClass PayFast\Currency\Currency
 *
 * These tests are for the currency class
 *
 * This extends the base currency class with the following:
 *  - format the amount into the locale formatting
 *  - convert the amounts from the base to the target currency
 *
 */
class CurrencyTest extends TestCaseAlias
{
    use \helpers;

    private $currency;

    protected function setUp(): void
    {
        //default amount
        $amount = 12345;
        $this->currency = new Currency();
    }

    public function testTrueAssertsToTrue()
    {
        $condition = true;
        $this->assertTrue($condition);
    }

    /**
     * @test
     *
     * Ensure that we have an instance of the class amount
     *
     * @covers ::__construct
     */
    public function is_instance_of_currency_class()
    {
        $result = $this->currency instanceof BaseCurrency;
        $this->assertTrue($result);
    }

    /**
     * @test
     *
     * Ensure that the default base is set as zar
     *
     * @covers ::__construct
     */
    public function is_base_currency_zar()
    {
        $this->assertEquals('zar', $this->currency->base);
    }

    /**
     * @test
     *
     * Ensure that we can set the base currency
     *
     * @covers ::__construct
     */
    public function can_we_set_the_base_currency()
    {
        $newCurrency =  new Currency('usd');
        $this->assertEquals('usd', $newCurrency->base);
    }
}