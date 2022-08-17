<?php

use Codeception\Util\Fixtures;

class FlightTest extends \Codeception\Test\Unit
{
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testZeroStops()
    {
        $flights = Fixtures::get('flights');
        $result  = find_cheaper_path($flights, 'CTA', 'MXP');
        $this->assertEquals(220, $result['total']);
        $this->assertCount(1, $result['itinerary']);
    }

    public function testOneStop()
    {
        $flights = Fixtures::get('flights');
        $result  = find_cheaper_path($flights, 'CTA', 'MXP', 1);
        $this->assertEquals(130, $result['total']);
        $this->assertCount(2, $result['itinerary']);
    }

    public function testTwoStop()
    {
        $flights = Fixtures::get('flights');
        $result  = find_cheaper_path($flights, 'CTA', 'MXP', 2);
        $this->assertEquals(90, $result['total']);
        $this->assertCount(3, $result['itinerary']);
    }
}