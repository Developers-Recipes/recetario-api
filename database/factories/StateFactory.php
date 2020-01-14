<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Recipe;
use App\Models\State;
use Faker\Generator as Faker;

$factory->define(State::class, function (Faker $faker) {
    return [
        'state' => $faker->randomElement([
            Recipe::PENDING_STATE,
            Recipe::IN_PROGRESS_STATE,
            Recipe::READY_STATE
        ]),
    ];
});
