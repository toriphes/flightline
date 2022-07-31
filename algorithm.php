<?php

/**
 * Find the path and the cheapest flight
 *
 * @param  array  $flights
 * @param  string  $start  departure airport code
 * @param  string  $dest  arrival airport code
 * @param  number  $stops  number of stops required
 *
 * @return array {
 *  total: number
 *  departure: string
 *  arrival: string
 *  stops: number
 *  itinerary: array
 * }
 */
function find_cheaper_path($flights, $start, $dest, $stops = 0)
{
    // Graph data structure
    $graph = [];
    // This queue will contain nodes which got updated and need to be checked during the next step
    $queue = [];
    // Contains costs computed during the previous step
    $prev_costs = [];
    // All computed nodes
    $stack = [];

    /**
     * Using HashMap facilitates the search of the neighbors
     * graph[departure][arrival]=price_from_departure_to_arrival
     */
    foreach ($flights as $flight) {
        $graph[$flight['code_departure']][$flight['code_arrival']] = ['price' => (double) $flight['price']];
        $prev_costs[$flight['code_departure']]                     = PHP_INT_MAX;
    }

    /**
     * Start node has no price
     */
    $prev_costs[$start] = 0;
    $queue[]            = $start;

    for ($i = 1; $i <= $stops + 1; ++$i) {
        $next_queue = [];
        /**
         * Prices computed during the current step.
         */
        $current_costs = $prev_costs;

        while ( ! empty($queue)) {
            $node = array_pop($queue);
            if ( ! isset($graph[$node])) {
                continue;
            }

            foreach ($graph[$node] as $neighbour => $cost) {
                $neighbour_current_cost = $current_costs[$neighbour] ?? PHP_INT_MAX;
                $neighbour_cost         = $prev_costs[$node] + $graph[$node][$neighbour]['price'];

                /**
                 * Update the price to get to a neighbor when is more convenient
                 */
                if ($neighbour_current_cost > $neighbour_cost) {
                    /**
                     * Update the price to get to the neighbor. Assuming the price to get to the node computed
                     * during the previous step plus the cost to go from the node to the neighbour
                     */
                    $current_costs[$neighbour] = $neighbour_cost;
                    /**
                     * Node to scan in the next step
                     */
                    $next_queue[] = $neighbour;

                    /**
                     * Track the scanning path
                     */
                    $stack[] = [
                        'from'  => $node, 'to' => $neighbour, 'weight' => $neighbour_current_cost,
                        "price" => $graph[$node][$neighbour]['price'],
                    ];
                }
            }
        }

        /**
         * Preparing data for the next step
         */
        $queue      = $next_queue;
        $prev_costs = $current_costs;
    }

    $last          = $dest;
    $path          = [];
    $foundCheapest = isset($prev_costs[$dest]) && $prev_costs[$dest] !== PHP_INT_MAX;

    /**
     * Build the path from the destination to the start airport following the lowest price.
     * This can be improved
     */
    if ($foundCheapest) {
        while ($last !== $start) {
            $lowest = null;

            foreach ($stack as $node) {
                if ($node['to'] === $last) {
                    if ($lowest === null) {
                        $lowest = $node;
                    } elseif ($node['weight'] < $lowest['weight']) {
                        $lowest = $node;
                    }
                }
            }

            if ($lowest) {
                unset($lowest['weight']);
                array_unshift($path, $lowest);
                $last = $lowest['from'];
            }
        }
    }

    return [
        'total'     => $foundCheapest ? $prev_costs[$dest] : -1,
        'departure' => $start,
        'arrival'   => $dest,
        'stops'     => count($path) - 1,
        'itinerary' => $path,
    ];
}