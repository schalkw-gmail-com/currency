<?php

namespace PayFast\Currency;

use PHPUnit\Framework\TestCase as TestCaseAlias;

require_once dirname(dirname(dirname(__FILE__))) . '/src/Traits/Helpers.php';

/**
 * Class AmountTest
 *
 * @package Amount
 * @coversDefaultClass PayFast\Currency\Amount
 *
 * This the tests for the base class of amount.
 * The class will have a amount as float value and will be able to round and format the value as required.
 *
 */
class AmountTest extends TestCaseAlias
{

    /**
     * @codeCoverageIgnore
     */
    use \helpers;

    private $amount;

    protected function setUp(): void
    {
       $this->amount = new Amount();
    }

    protected function tearDown(): void
    {
        $this->amount = null;
    }

    /**
     * @test
     *
     * Ensure that we have an instance of the class amount
     *
     * @covers \PayFast\Currency\Amount
     * @covers ::__construct
     */
    public function is_instance_of_amount_class()
    {
        $result = $this->amount instanceof Amount;
        $this->assertTrue($result);
    }

    /**
     * @test
     *
     * Ensure that by default the value is 0
     *
     * @covers \PayFast\Currency\Amount
     * @covers ::__construct
     */
    public function is_default_value_zero()
    {
        $this->assertEquals(0, $this->amount->value);
        $this->assertIsNumeric($this->amount->value, 'this should be 0 by default');
    }



    /**
     * @test
     *
     * Ensure that we can pass values through the constructor
     *
     * @covers \PayFast\Currency\Amount
     * @covers ::__construct
     * @covers ::__toString
     */
    public function constructor_can_set_and_get_values()
    {
        $randomAmount = mt_rand(0, 10000);
        $amount = new Amount($randomAmount);
        $returnedValue = $amount->__toString();
        $this->assertEquals($randomAmount, $returnedValue);
    }


    /**
     * @test
     *
     * @covers ::__set
     * @covers ::__get
     *
     * Ensure that the get and set method works for the class
     */
    public function set_and_get_amount()
    {
        $randomAmount = mt_rand(0, 10000);
        $this->amount->__set('value', $randomAmount);
        $retrievedAmount = $this->amount->__get('value');
        $this->assertEquals($randomAmount, $retrievedAmount);
    }

    /**
     * @test
     *
     * @covers ::round
     *
     * Ensure that the rounding function rounds down to 2 decimal places
     */
    public function does_rounding_down_work_to_two_decimals()
    {
        $this->amount->__set('value', 123.4532);
        $rounded = $this->amount->round();
        $this->assertEquals(123.45, $rounded);

    }

    /**
     * @test
     *
     * @covers ::round
     *
     * Ensure that the rounding function rounds up to 2 decimal places
     */
    public function does_rounding_up_work_to_two_decimals()
    {
        $this->amount->__set('value', 123.4567);
        $rounded = $this->amount->round();
        $this->assertEquals(123.46, $rounded);
    }


    /**
     * @test
     *
     * @covers ::toCents
     *
     * Ensure that we can convert the set value to cents (returned value must be an integer)
     */

    public function can_we_convert_a_value_to_cents()
    {
        $cents = $this->amount->toCents();
        $this->assertIsInt($cents);
    }

    /**
     * @test
     *
     * @covers ::toCents
     *
     * Ensure that we can convert the a passed value to cents (returned value must be an integer)
     */

    public function can_we_convert_a_value_passed_to_cents()
    {
        $cents = $this->amount->toCents(123.45);
        $this->assertIsInt($cents);
    }

    /**
     * @test
     *
     * @covers ::toAmount
     *
     * Ensure that we can convert the a passed value to a proper amount (returned value must be an float)
     */

    public function can_we_convert_a_value_passed_to_amount()
    {
        $cents = $this->amount->toAmount(12345);
        $this->assertIsFloat($cents);
    }

    /**
     * @test
     *
     * @covers ::toAmount
     *
     * Ensure that we can convert the value to a proper amount (returned value must be an float)
     */

    public function can_we_convert_a_value_to_amount()
    {
        $cents = $this->amount->toAmount();
        $this->assertIsFloat($cents);
    }
}
