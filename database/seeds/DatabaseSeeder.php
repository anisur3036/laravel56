<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User', 3)->create()->each(function($u) {
            $u->questions()->saveMany(
                factory('App\Question', rand(1, 5))->make()
            )
            ->each(function ($q) {
                $q->answers()->saveMany(
                    factory(App\Answer::class, rand(1, 10))->make()
                );
            });
        });
    }
}
