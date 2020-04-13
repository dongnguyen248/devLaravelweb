<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersQuestionsAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('answers')->delete();
        DB::table('questions')->delete();
        DB::table('users')->delete();
        //in User create 5 users each user create random 1->5 question
        //each question create random 1->5 answers
        factory(App\User::class, 5)->create()
            ->each(function ($u) {
                $u->questions()
                    ->saveMany(
                        factory(App\Question::class, rand(1, 5))->make()
                    )
                    ->each(function ($q) {
                        $q->answers()->saveMany(factory(App\Answer::class, rand(1, 5))->make());
                    });
            });
    }
}