<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Api;
use Faker\Generator as Faker;

$factory->define(Api::class, function (Faker $faker) {
    return [
        'version' => 1.0,
        'name' => 'V 1.0.0'

    ];
});