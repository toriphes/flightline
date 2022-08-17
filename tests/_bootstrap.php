<?php

use Codeception\Util\Fixtures;

require __DIR__.'/../vendor/autoload.php';

Fixtures::add('flights', require  codecept_data_dir('data/flights_data.php'));

require_once 'algorithm.php';

