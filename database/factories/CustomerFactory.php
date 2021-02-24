<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'customer_id' => $faker->numberBetween(10000,30000),
        'phone' => $faker->numerify('##########'),
        'address' => $faker->address,
        'vehicle_number' => $faker->unique()->randomNumber,
        'type_of_vehicle' => $faker->randomElement($array=array('Sedan', 'Hatchback', 'Jeep', 'Wagon', 'Van', 'Truck')),
        'vehicle_class' => $faker->randomElement($array=array('LMV', 'MGV', 'HMV', 'HGMV', 'HPMV/HTV', 'Trailer')),
        'make_and_model' => $faker->randomElement($array=array('2014', '2015', '2016', '2017', '2018', '2019', '2020')),
        'present_policy_no' => $faker->randomNumber(),
        'expiry_date' => $faker->dateTimeBetween('now', '+30 days'),
        'existing_insurer' => $faker->randomElement($array=array('Star', 'LIC', 'National', 'United', 'Reliance', 'HDFC', 'ICICI')),
        'remarks' => $faker->word,
        'status' => $faker->randomElement($array=array('0', '1'))

    ];
});
