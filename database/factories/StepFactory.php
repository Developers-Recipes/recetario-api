<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Recipe;
use App\Models\Step;
use Faker\Generator as Faker;

$factory->define(Step::class, function (Faker $faker) {
    return [
        'recipe_id' => Recipe::all()->random()->id,
        'number_step' => $faker->randomElement([1, 2, 3, 4, 5]),
        'name' => $faker->word(),
        'description' => $faker->text(),
        'links_references' => $faker->paragraph(),
        'completed' => $faker->randomElement([
            Step::INCOMPLETED_STEP,
            Step::COMPLETED_STEP
        ])
    ];
});