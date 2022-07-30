<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('airports')->insert([
            [
                'name' => 'Albenga',
                'code' => 'ALL',
                'lat'  => '44.045833',
                'lng'  => '8.125556',
            ],
            [
                'name' => 'Alghero Fertilia',
                'code' => 'AHO',
                'lat'  => '40.633294',
                'lng'  => '8.289652',
            ],
            [
                'name' => 'Ancona Falconara',
                'code' => 'AOI',
                'lat'  => '43.615278',
                'lng'  => '13.3625',
            ],
            [
                'name' => 'Aosta',
                'code' => 'AOT',
                'lat'  => '45.738611',
                'lng'  => '7.3625',
            ],
            [
                'name' => 'Bari Palese Macchie',
                'code' => 'BRI',
                'lat'  => '41.138056',
                'lng'  => '16.765',
            ],
            [
                'name' => 'Bergamo Orio Al Serio',
                'code' => 'BGY',
                'lat'  => '45.668889',
                'lng'  => '9.700278',
            ],
            [
                'name' => 'Bologna Borgo Panigale',
                'code' => 'BLQ',
                'lat'  => '44.533333',
                'lng'  => '11.3',
            ],
            [
                'name' => 'Bolzano',
                'code' => 'BZO',
                'lat'  => '46.460278',
                'lng'  => '11.326389',
            ],
            [
                'name' => 'Brescia Montichiari',
                'code' => 'VBS',
                'lat'  => '45.425556',
                'lng'  => '10.326944',
            ],
            [
                'name' => 'Brindisi Casale',
                'code' => 'BDS',
                'lat'  => '40.658056',
                'lng'  => '17.946667',
            ],
            [
                'name' => 'Cagliari Elmas',
                'code' => 'CAG',
                'lat'  => '39.25',
                'lng'  => '9.05',
            ],
            [
                'name' => 'Catania Fontanarossa',
                'code' => 'CTA',
                'lat'  => '37.466781',
                'lng'  => '15.0639',
            ],
            [
                'name' => 'Comiso',
                'code' => 'CIY',
                'lat'  => '36.991667',
                'lng'  => '14.606944',
            ],
            [
                'name' => 'Crotone S. Anna',
                'code' => 'CRV',
                'lat'  => '38.996667',
                'lng'  => '17.079167',
            ],
            [
                'name' => 'Cuneo Levaldigi',
                'code' => 'CUF',
                'lat'  => '44.547019',
                'lng'  => '7.623217',
            ],
            [
                'name' => 'Firenze Peretola',
                'code' => 'FLR',
                'lat'  => '43.809722',
                'lng'  => '11.203889',
            ],
            [
                'name' => 'Foggia',
                'code' => 'FOG',
                'lat'  => '41.433889',
                'lng'  => '15.535833',
            ],
            [
                'name' => 'Forlì',
                'code' => 'FRL',
                'lat'  => '44.195',
                'lng'  => '12.069722',
            ],
            [
                'name' => 'Genova Sestri',
                'code' => 'GOA',
                'lat'  => '44.414444',
                'lng'  => '8.838611',
            ],
            [
                'name' => 'Grosseto',
                'code' => 'GRS',
                'lat'  => '42.75',
                'lng'  => '11.066667',
            ],
            [
                'name' => 'Lamezia Terme',
                'code' => 'SUF',
                'lat'  => '38.9',
                'lng'  => '16.233333',
            ],
            [
                'name' => 'Lampedusa',
                'code' => 'LMP',
                'lat'  => '35.495833',
                'lng'  => '12.611111',
            ],
            [
                'name' => 'Marina Di Campo',
                'code' => 'EBA',
                'lat'  => '42.762778',
                'lng'  => '10.240556',
            ],
            [
                'name' => 'Milano Linate',
                'code' => 'LIN',
                'lat'  => '45.449444',
                'lng'  => '9.278333',
            ],
            [
                'name' => 'Milano Malpensa',
                'code' => 'MXP',
                'lat'  => '45.63',
                'lng'  => '8.723056',
            ],
            [
                'name' => 'Napoli Capodichino',
                'code' => 'NAP',
                'lat'  => '40.883333',
                'lng'  => '14.283333',
            ],
            [
                'name' => 'Olbia',
                'code' => 'OLB',
                'lat'  => '40.898611',
                'lng'  => '9.5175',
            ],
            [
                'name' => 'Palermo Punta Raisi',
                'code' => 'PMO',
                'lat'  => '38.181389',
                'lng'  => '13.099444',
            ],
            [
                'name' => 'Parma',
                'code' => 'PMF',
                'lat'  => '44.822222',
                'lng'  => '10.295278',
            ],
            [
                'name' => 'Perugia',
                'code' => 'PEG',
                'lat'  => '43.096944',
                'lng'  => '12.511389',
            ],
            [
                'name' => 'Pescara',
                'code' => 'PSR',
                'lat'  => '42.437222',
                'lng'  => '14.187222',
            ],
            [
                'name' => 'Pisa S. Giusto',
                'code' => 'PSA',
                'lat'  => '43.682778',
                'lng'  => '10.395556',
            ],
            [
                'name' => 'Reggio Calabria',
                'code' => 'REG',
                'lat'  => '38.071944',
                'lng'  => '15.653611',
            ],
            [
                'name' => 'Rimini Miramare',
                'code' => 'RMI',
                'lat'  => '44.019444',
                'lng'  => '12.609444',
            ],
            [
                'name' => 'Roma Ciampino',
                'code' => 'CIA',
                'lat'  => '41.799444',
                'lng'  => '12.597222',
            ],
            [
                'name' => 'Roma Fiumicino',
                'code' => 'FCO',
                'lat'  => '41.800278',
                'lng'  => '12.238889',
            ],
            [
                'name' => 'Trieste Ronchi Dei Legionari',
                'code' => 'TRS',
                'lat'  => '45.8275',
                'lng'  => '13.472222',
            ],
            [
                'name' => 'Salerno Pontecagnano',
                'code' => 'QSR',
                'lat'  => '40.62',
                'lng'  => '14.9125',
            ],
            [
                'name' => 'Taranto Grottaglie',
                'code' => 'TAR',
                'lat'  => '40.516172',
                'lng'  => '17.404786',
            ],
            [
                'name' => 'Torino Caselle',
                'code' => 'TRN',
                'lat'  => '45.2025',
                'lng'  => '7.649444',
            ],
            [
                'name' => 'Trapani Birgi',
                'code' => 'TPS',
                'lat'  => '37.911944',
                'lng'  => '12.493333',
            ],
            [
                'name' => 'Treviso S. Angelo',
                'code' => 'TSF',
                'lat'  => '45.650833',
                'lng'  => '12.197778',
            ],
            [
                'name' => 'Venezia Tessera',
                'code' => 'VCE',
                'lat'  => '45.505278',
                'lng'  => '12.351944',
            ],
            [
                'name' => 'Verona Villafranca',
                'code' => 'VRN',
                'lat'  => '45.396389',
                'lng'  => '10.888056',
            ],
            [
                'name' => 'Pantelleria',
                'code' => 'PNL',
                'lat'  => '36.813767999999996',
                'lng'  => '11.962350735013088',
            ],
        ]);

        DB::table('flights')->insert([
            [
                'code_departure' => 'FLR',
                'code_arrival'   => 'MPX',
                'price'          => 60.0,
            ],

            [
                'code_departure' => 'CTA',
                'code_arrival'   => 'FCO',
                'price'          => 60.0,
            ],
            [
                'code_departure' => 'FCO',
                'code_arrival'   => 'TRN',
                'price'          => 90.0,
            ],

            [
                'code_departure' => 'CTA',
                'code_arrival'   => 'MPX',
                'price'          => 220.0,
            ],

            [
                'code_departure' => 'CTA',
                'code_arrival'   => 'FLR',
                'price'          => 80.0,
            ],

            [
                'code_departure' => 'CTA',
                'code_arrival'   => 'BLQ',
                'price'          => 20.0,
            ],

            [
                'code_departure' => 'BLQ',
                'code_arrival'   => 'FLR',
                'price'          => 10.0,
            ],
            [
                'code_departure' => 'BLQ',
                'code_arrival'   => 'MPX',
                'price'          => 110.0,
            ],
        ]);
    }
}
