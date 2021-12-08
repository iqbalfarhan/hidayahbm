<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Alat;
use Faker\Generator as Faker;

$factory->define(Alat::class, function (Faker $faker) {
    return [
        'nama' => $faker->unique()->domainWord(),
        'jumlah' => $faker->numberBetween(1, 200),
        'kode' => "HBM".$faker->numberBetween(100000000, 999999999),
    ];
});
