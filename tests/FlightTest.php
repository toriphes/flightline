<?php

use Codeception\Util\Fixtures;

class FlightTest extends \Codeception\Test\Unit
{
    protected function _before()
    {
        Fixtures::add('flights', [
            ['code_departure' => 'CTA', 'code_arrival' => 'MXP', 'price' => 220.0],
            ['code_departure' => 'FLR', 'code_arrival' => 'MXP', 'price' => 60.0],
            ['code_departure' => 'FCO', 'code_arrival' => 'TRN', 'price' => 90.0],
            ['code_departure' => 'CTA', 'code_arrival' => 'FCO', 'price' => 50.0],
            ['code_departure' => 'CTA', 'code_arrival' => 'FLR', 'price' => 80.0],
            ['code_departure' => 'CTA', 'code_arrival' => 'BLQ', 'price' => 20.0],
            ['code_departure' => 'BLQ', 'code_arrival' => 'FLR', 'price' => 10.0],
            ['code_departure' => 'BLQ', 'code_arrival' => 'MXP', 'price' => 110.0],
        ]);
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