<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{


    public static function findCheaperRoute($start, $dest, $stops = 0)
    {
        $graph      = [];
        $queue      = [];
        $prev_costs = [];
        $stack      = [];

        foreach (self::all() as $flight) {
            $graph[$flight['code_departure']][$flight['code_arrival']] = ['price' => (double) $flight['price'], 'id' => $flight['id']];
            $prev_costs[$flight['code_departure']]                     = PHP_INT_MAX;
        }

        $prev_costs[$start] = 0;
        $queue[]            = $start;

        for ($i = 1; $i <= $stops + 1; ++$i) {
            $next_queue    = [];
            $current_costs = $prev_costs;

            while ( ! empty($queue)) {
                $node = array_pop($queue);
                if ( ! isset($graph[$node])) {
                    continue;
                }

                foreach ($graph[$node] as $neighbour => $cost) {
                    $neighbour_current_cost = $current_costs[$neighbour] ?? PHP_INT_MAX;
                    $neighbour_cost         = $prev_costs[$node] + $graph[$node][$neighbour]['price'];

                    if ($neighbour_current_cost > $neighbour_cost) {
                        $current_costs[$neighbour] = $neighbour_cost;
                        $next_queue[]              = $neighbour;

                        $stack[] = [
                            'from'  => $node, 'to' => $neighbour, 'weight' => $neighbour_current_cost,
                            "price" => $graph[$node][$neighbour]['price'],
                        ];
                    }
                }
            }

            $queue      = $next_queue;
            $prev_costs = $current_costs;
        }

        $last          = $dest;
        $path          = [];
        $foundCheapest = isset($prev_costs[$dest]) && $prev_costs[$dest] !== PHP_INT_MAX;

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
}
