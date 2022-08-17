<?php

use Codeception\Util\Fixtures;
use Flightline\Finder;
use Flightline\Entities\Flight;

class FinderTest extends \Codeception\Test\Unit
{
    private Finder $finder;

    protected function _before()
    {
        $this->finder = new Finder();
        foreach (Fixtures::get('flights') as $flight) {
            $this->finder->insert(new Flight(...array_values($flight)));
        }
    }

    protected function _after()
    {
    }

    public function testNotFoundItinerary()
    {
        $itinerary = $this->finder->search('NOP', 'NOP');
        $this->assertCount(0, $itinerary);
        $this->assertEquals(0, $itinerary->getTotalPrice());
    }

    public function testZeroStops()
    {
        $itinerary = $this->finder->search('CTA', 'MXP');

        $this->assertCount(1, $itinerary);
        $this->assertEquals(220, $itinerary->getTotalPrice());
    }


    public function testOneStop()
    {
        $itinerary = $this->finder->search('CTA', 'MXP', 1);

        $this->assertCount(2, $itinerary);
        $this->assertEquals(130, $itinerary->getTotalPrice());
    }

    public function testTwoStop()
    {
        $itinerary = $this->finder->search('CTA', 'MXP', 2);

        $this->assertCount(3, $itinerary);
        $this->assertEquals(90, $itinerary->getTotalPrice());
    }

    public function testMultipleSearchOnSameDataset()
    {
        $itinerary = $this->finder->search('CTA', 'MXP', 2);
        $this->assertEquals(90, $itinerary->getTotalPrice());

        $itinerary = $this->finder->search('CTA', 'MXP', 1);
        $this->assertEquals(130, $itinerary->getTotalPrice());
    }
}