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

        DB::table('user_like')->truncate();

        factory(User::class, 5)->create();
        factory(State::class, 3)->create();
        factory(Recipe::class, 5)->create();
        factory(Step::class, 25)->create();
        factory(Api::class, 1)->create();
    }
}