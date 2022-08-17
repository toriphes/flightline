<?php

namespace Flightline;

use Flightline\Entities\Flight;
use Flightline\Entities\Itinerary;

/**
 * Flight Finder Class
 */
class Finder
{
    /**
     * Graph data structure
     *
     * @var Flight[][]
     */
    protected array $graph = [];

    /**
     * @param  Flight  $flight
     *
     * @return void
     */
    public function insert(Flight $flight): void
    {
        $this->graph[$flight->from][$flight->dest] = $flight;
    }

    /**
     * @param  string  $from  departure code
     * @param  string  $to  arrival code
     * @param  int  $stops  number of stopover
     *
     * @return Itinerary
     */
    public function search(string $from, string $to, int $stops = 0): Itinerary
    {
        $previous[$from] = 0;
        $queue[]         = $from;
        $routes          = [];

        for ($i = 0; $i <= $stops; $i++) {
            $nextQueue = [];

            // price computed during the current step
            $current = $previous;

            while ( ! empty($queue)) {
                $nodeId     = array_pop($queue);
                $neighbours = $this->getNeighbours($nodeId);

                if (empty($neighbours)) {
                    continue;
                }

                foreach ($neighbours as $neighbourId => $node) {
                    $destNode             = $this->graph[$nodeId][$neighbourId];
                    $neighbourCurrentCost = $current[$neighbourId] ?? PHP_INT_MAX;
                    $neighbourCost        = $previous[$nodeId] + $destNode->price;

                    /**
                     * Update the price to get to a neighbor when is more convenient
                     */
                    if ($neighbourCurrentCost > $neighbourCost) {
                        /**
                         * Update the price to get to the neighbor. Assuming the price to get to the node computed
                         * during the previous step plus the cost to go from the node to the neighbour
                         */
                        $current[$neighbourId] = $neighbourCost;
                        /**
                         * Node to scan in the next step
                         */
                        $nextQueue[] = $neighbourId;

                        /**
                         * Track all the possible routes
                         */
                        $routes[] = ['flight' => $destNode, 'cost' => $neighbourCost];
                    }
                }
            }

            $queue    = $nextQueue;
            $previous = $current;
        }

        $found = isset($previous[$to]) && $previous[$to] !== PHP_INT_MAX;
        $path  = [];

        if ($found) {
            $last = $to;

            while ($last !== $from) {
                $lowest = null;

                foreach ($routes as $route) {
                    if ($route['flight']->dest === $last) {
                        if ($lowest === null) {
                            $lowest = $route;
                        } elseif ($route['cost'] < $lowest['cost']) {
                            $lowest = $route;
                        }
                    }
                }

                if ($lowest) {
                    array_unshift($path, $lowest['flight']);
                    $last = $lowest['flight']->from;
                }
            }
        }

        return new Itinerary($path);
    }

    /**
     * @param  string  $id
     *
     * @return Flight[]
     */
    public function getNeighbours(string $id): array
    {
        return $this->graph[$id] ?? [];
    }
}