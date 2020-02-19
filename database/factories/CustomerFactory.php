<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'id'                => $faker->uuid,
        'customer_name'     => $faker->name,
        'contact_name'      => $faker->firstName,
        'address'           => $faker->address,
        'city'              => $faker->city,
        'postal_code'       => $faker->postcode,
        'country'           => $faker->country
    ];
});
