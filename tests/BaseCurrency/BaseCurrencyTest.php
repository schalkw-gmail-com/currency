<?php

namespace PayFast\Currency;

use PHPUnit\Framework\TestCase as TestCaseAlias;

require_once dirname(dirname(dirname(__FILE__))) . '/src/Traits/Helpers.php';

/**
 * Class BaseCurrencyTest
 *
 * @package BaseCurrency
 *
 * @coversDefaultClass PayFast\Currency\BaseCurrency
 *
 * This the tests for the base class of currency.
 * The basic function of the class is to convert a value form cents to rands (financial format)
 *  or convert from financial format to cents
 *  - obtain the exchange rate from base to target
 *
 */
class BaseCurrencyTest extends TestCaseAlias
{
    use \helpers;

    private $baseCurrency;

    protected function setUp(): void
    {
        //default amount
        $amount = 12345;
        $this->baseCurrency = new BaseCurrency();
    }

    protected function tearDown(): void
    {
        $this->baseCurrency = null;
    }

    /**
     * @test
     *
     * Ensure that we have an instance of the base currency amount
     *
     * covers ::__construct
     */
    public function is_instance_of_base_currency_class()
    {
        $result = $this->baseCurrency instanceof BaseCurrency;
        $this->assertTrue($result);
    }

    /**
     * @test
     *
     * covers ::__set
     * covers ::__get
     *
     * Ensure that the get and set method works for the class
     */
    public function set_and_get_amount()
    {
        $randomAmount = mt_rand(0, 10000);
        $this->baseCurrency->__set('value', $randomAmount);
        $retrievedAmount = $this->baseCurrency->__get('value');
        $this->assertEquals($randomAmount, $retrievedAmount);
    }

    /**
     * @test
     *
     * covers ::toFinance
     *
     * Ensure that we can format a huge number to a financial format
     */
    public function can_we_format_a_huge_number_financially()
    {
        $this->baseCurrency->__set('value', 123456789.10);
        $financial = $this->baseCurrency->toFinance();
        $this->assertEquals('123 456 789.10', $financial);
    }

    /**
     * @test
     *
     * covers ::toFinance
     *
     * Ensure that we can format a normal number to a financial format
     */
    public function can_we_format_a_normal_number_financially()
    {
        $this->baseCurrency->__set('value', 12345.67);
        $financial = $this->baseCurrency->toFinance();
        $this->assertEquals('12 345.67', $financial);
    }

    /**
     * @test
     *
     * covers ::toFinance
     *
     * Ensure that we can format a small number to a financial format
     */
    public function can_we_format_a_small_number_financially()
    {
        $this->baseCurrency->__set('value', 123.67);
        $financial = $this->baseCurrency->toFinance();
        $this->assertEquals('123.67', $financial);
    }

    /**
     * @test
     *
     * covers ::toFinance
     *
     * Ensure that we can format a number to a financial format when passed as a parameter
     */
    public function can_we_format_a_number_financially_passed_as_parameter()
    {
        $value = 123.67;
        $financialFormat = $this->baseCurrency->toFinance($value);
        $this->assertEquals('123.67', $financialFormat);
    }

    /**
     * @test
     *
     * covers ::toCents
     *
     * Ensure that we can convert a number to cents
     */
    public function can_we_convert_a_number_to_cents()
    {
        $this->baseCurrency->__set('value', 12345.67);
        $toCents = $this->baseCurrency->toCents();
        $this->assertEquals(1234567, $toCents);
    }

    /**
     * @test
     *
     * covers ::toCents
     *
     * Ensure that we can convert a number to cents passed to the function
     */
    public function can_we_convert_a_number_to_cents_passed_to_the_function()
    {
        $value = 12345.67;
        $toCents = $this->baseCurrency->toCents($value);
        $this->assertEquals(1234567, $toCents);
    }


    /**
     * @test
     *
     * Ensure that we can set and get the base currency
     */
    public function set_and_get_base_currency(){
        $this->baseCurrency->__set('base','zar');
        $retrievedBase = $this->baseCurrency->__get('base');
        $this->assertEquals('zar',$retrievedBase);
    }

    /**
     * @test
     *
     * covers ::__set
     * covers ::__get
     *
     * Ensure that we can set and get the target currency, utilising getters and setters
     */
    public function set_and_get_target_currency(){
        $this->baseCurrency->__set('target','usd');
        $retrievedBase = $this->baseCurrency->__get('target');
        $this->assertEquals('usd',$retrievedBase);
    }

    /**
     * @test
     *
     *
     * Ensure that we can set and get the target currency, utilising getters and setters
     */
    public function set_and_get_target_currency_without_etters(){
        $this->baseCurrency->base = 'zar';
        $retrievedBase = $this->baseCurrency->base;
        $this->assertEquals('zar',$retrievedBase);
    }

    /**
     * @test
     *
     * covers ::__set
     * covers ::__get
     *
     * Ensure that the base currency is a string
     */
    public function target_currency_is_a_string(){
        $this->baseCurrency->__set('target','usd');
        $retrievedTarget = $this->baseCurrency->__get('target');
        $this->assertIsString($retrievedTarget);
    }

    /**
     * @test
     *
     * covers ::__set
     * covers ::__get
     *
     * Ensure that the base currency is a string
     */
    public function base_currency_is_a_string(){
        $this->baseCurrency->__set('base','zar');
        $retrievedBase = $this->baseCurrency->__get('base');
        $this->assertIsString($retrievedBase);
    }


}