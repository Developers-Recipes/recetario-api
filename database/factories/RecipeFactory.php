<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Recipe;
use App\Models\State;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Recipe::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'state_id' => State::all()->random()->id,
        'forked_from' => User::all()->random()->id,
        'name' => $faker->word(),
        'description' => $faker->text(),
        'likes' => $faker->numberBetween(1, 200),
    ];
});
