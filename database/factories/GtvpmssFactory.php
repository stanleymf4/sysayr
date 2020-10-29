<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Gtvpmss;
use Faker\Generator as Faker;

$factory->define(Gtvpmss::class, function (Faker $faker) {
    return [
        'gtvpmss_desc' => $faker->word,
        'gtvpmss_slug' => $faker->word,
    ];
});
