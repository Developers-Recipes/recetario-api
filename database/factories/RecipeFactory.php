<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Recipe;
use App\Models\State;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Recipe::class, function (Faker $faker) {
    $forked = $faker->randomElement([true, false]);
    return [
        'user_id' => User::all()->random()->id,
        'state_id' => State::all()->random()->id,
        'forked_from' => $forked ? User::all()->random()->id : null,
        'name' => $faker->word(),
        'description' => $faker->word(),
    ];
});