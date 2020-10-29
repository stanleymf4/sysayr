<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Gsbuser;
use Faker\Generator as Faker;

$factory->define(Gsbuser::class, function (Faker $faker) {
    return [
        'gsbuser_login' => $faker->userName,
        'gsbuser_password' => $faker->password(),
        'gsbuser_name' => $faker->name,
    ];
});
