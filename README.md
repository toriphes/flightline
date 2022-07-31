# Challenge: Flightline

Given two different airport's code find the lowest price assuming at most 2 stopovers.

The first idea was to use the [Dijkstra algorithm](https://en.wikipedia.org/wiki/Dijkstra%27s_algorithm) but due to the limitation of the N stopovers this strategy doesn't fit anymore.

Now the idea is to build an algorithm which, at every step, updates the flight price but considering the minimum price of the path with a limited number of stops.

1. Start from the first flight and update the price of the adjacent flights.
2. At each step picks all the flights updated the step before.
3. When got a cheaper route, updates the price of an adjacent flight by summing up the price of the outbound edge, plus the price it took to get to the flight in the previous step.

The developed solution allows to obtain both the lowest price for traveling from two airports and the route between them.

## Test the algorithm

The algorithm is located in [algorithm.php](algorithm.php) file.

Clone the repository do a `composer install` then run the unit tests:

```bash
composer run test
```

You can change the `fixture` in the test file to add more flight routes and make more tests

## Getting Started

To demonstrate the algorithm in a real use case and make things more exciting, I created a solution consisting of two applications.

* Backend API application built with [Laravel Framework](https://laravel.com/)
* Frontend SPA build with [ReactJS](https://reactjs.org/) and [Tailwind css](https://tailwindcss.com/)

The best way to start the solution is through the use of [docker](https://www.docker.com/) and [docker-compose](https://docs.docker.com/compose/).

```bash
docker-compose up -d
```

Then open the browser to http://127.0.0.1:3000/ . If something doesn't work try reloading the page as the docker stack may not have finished loading.

## Conclusion

Both the algorithm and the application are a proof of concept and could be greatly improved in a next iteration.