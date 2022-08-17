<?php

namespace Flightline\Entities;

use Iterator;
use Countable;

/**
 * Itinerary Class
 */
class Itinerary implements Iterator, Countable
{
    /**
     * Itinerary path
     *
     * @var Flight[]
     */
    protected array $flights = [];

    /**
     * Cursor iterator
     *
     * @var int
     */
    protected int $cursor = 0;

    public function __construct($flights)
    {
        $this->flights = $flights;
    }

    /**
     * Return number of flights in the itinerary
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->flights);
    }

    /**
     * Returns computed itinerary price
     *
     * @return float
     */
    public function getTotalPrice(): float
    {
        return array_reduce($this->flights, fn(float $carry, Flight $item) => $carry += $item->price, 0.0);
    }

    /**
     * @inheritDoc
     *
     * @return Flight
     */
    public function current(): Flight
    {
        return $this->flights[$this->cursor];
    }

    /**
     * @inheritDoc
     */
    public function next(): void
    {
        ++$this->cursor;
    }

    /**
     * @inheritDoc
     */
    public function key(): int
    {
        return $this->cursor;
    }

    /**
     * @inheritDoc
     */
    public function valid(): bool
    {
        return isset($this->flights[$this->cursor]);
    }

    /**
     * @inheritDoc
     */
    public function rewind(): void
    {
        $this->cursor = 0;
    }
}