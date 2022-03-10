<?php

use PHPUnit\Framework\TestCase;

/**
 * Class EmptyTest
 *
 * This is just the first test to ensure that:
 *  - the code is setup correctly
 *  - tests can be runs
 */

class EmptyTest extends TestCase
{
    public function testTrueAssertsToTrue()
    {
        $condition = true;
        $this->assertTrue($condition);
    }
}
