<?php

namespace Flightline\Entities;

/**
 * Flight Model Class
 */
class Flight
{
    /**
     * Code departure
     *
     * @var string
     */
    public string $from;

    /**
     * Code arrival
     *
     * @var string
     */
    public string $dest;

    /**
     * Trip price
     *
     * @var float
     */
    public float $price;

    /**
     * Additional meta data
     *
     * @var array
     */
    public array $data;

    /**
     * Itinerary Constructor
     *
     * @param  string  $from
     * @param  string  $dest
     * @param  float  $price
     * @param  array  $data
     */
    public function __construct(string $from, string $dest, float $price = 0.0, array $data = [])
    {
        $this->from  = $from;
        $this->dest  = $dest;
        $this->price = $price;
        $this->data  = $data;
    }

    /**
     * Return the flight identifier
     *
     * @return string
     */
    public function id(): string
    {
        return $this->from;
    }
}