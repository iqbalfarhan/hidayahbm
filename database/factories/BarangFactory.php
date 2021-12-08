<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Barang;
use Faker\Generator as Faker;

$factory->define(Barang::class, function (Faker $faker) {
    return [
        'nama' => $faker->unique()->domainWord(),
        'keterangan' => $faker->sentence(5),
        'satuan' => $faker->randomElement(['Kg', 'Ekor', 'Buah', 'Bungkus']),
        'sku' => $faker->unique()->numberBetween(),
        'min_stok' => $faker->numberBetween(5, 20),
    ];
});
