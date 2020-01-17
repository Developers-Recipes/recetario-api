<?php

use App\Models\Api;
use App\Models\Recipe;
use App\Models\State;
use App\Models\Step;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        Recipe::truncate();
        Step::truncate();
        Api::truncate();
        State::truncate();

        factory(User::class, 10)->create();
        factory(State::class, 3)->create();
        factory(Recipe::class, 500)->create();
        factory(Step::class, 2000)->create();
        factory(Api::class, 1)->create();
    }
}